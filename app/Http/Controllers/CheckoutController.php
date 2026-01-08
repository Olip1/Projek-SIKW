<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($keranjang->isEmpty()) {
            return redirect()
                ->route('keranjang.index')
                ->with('error', 'Keranjang masih kosong');
        }

        $total = $keranjang->sum(function ($item) {
            return $item->product->price * $item->qty;
        });

        return view('checkout.index', compact('keranjang', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required'
        ]);

        $items = Keranjang::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($items->isEmpty()) {
            return back()->with('error', 'Keranjang kosong');
        }

        $total = $items->sum(function ($item) {
            return $item->qty * $item->product->price;
        });

        $order = Order::create([
            'user_id' => Auth::id(),
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

        Keranjang::where('user_id', Auth::id())->delete();

        return redirect()
            ->route('checkout.index')
            ->with('success', 'Checkout berhasil');
    }
}
