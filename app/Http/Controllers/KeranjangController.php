<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $keranjang->sum(function ($item) {
            return $item->product->price * $item->qty;
        });

        return view('keranjang.index', compact('keranjang', 'total'));
    }

    // TAMBAH PRODUK KE KERANJANG
    public function tambah($productId)
    {
        $item = Keranjang::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->increment('qty');
        } else {
            Keranjang::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'qty' => 1
            ]);
        }

        return back();
    }



    // KURANGI QTY
    public function kurangQty($id)
    {
        $item = Keranjang::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($item->qty > 1) {
            $item->decrement('qty');
        }

        return back();
    }


    // UPDATE QTY MANUAL
    public function tambahQty($id)
    {
        $item = Keranjang::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $item->increment('qty');

        return back();
    }




    // HAPUS ITEM
    public function hapus($id)
    {
        Keranjang::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back();
    }
}
