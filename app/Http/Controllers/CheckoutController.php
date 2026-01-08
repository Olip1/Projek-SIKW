<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // Ambil keranjang milik user yang login
        $keranjang = Keranjang::with('product')
            ->where('id', Auth::id())
            ->get();

        // Jika keranjang kosong
        if ($keranjang->isEmpty()) {
            return redirect()->route('keranjang')
                ->with('error', 'Keranjang masih kosong');
        }
        // HITUNG TOTAL
        $total = $keranjang->sum(function ($item) {
            return $item->product->harga * $item->qty;
        });

        return view('checkout.index', compact('keranjang', 'total'));
    }

    // proses simpan pesanan
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required'
        ]);

        $items = Keranjang::where('id', Auth::id())
            ->with('product')
            ->get();

        if ($items->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong');
        }

        $total = $items->sum(fn($i) => $i->qty * $i->product->price);

        $order = Order::create([
            'id' => Auth::id(),
            'total' => $total,
            'payment_method' => $request->payment_method,
            'status' => 'pending'
        ]);

        foreach ($items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'qty' => $item->qty,
                'price' => $item->product->price
            ]);
        }

        // ✅ INI YANG BIKIN KERANJANG KOSONG OTOMATIS
        Keranjang::where('id', Auth::id())->delete();

        return redirect()->route('checkout')->with('success', 'Checkout berhasil');
    }
}
