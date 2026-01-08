<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
{
    $keranjang = Keranjang::with('product')
        ->where('id', Auth::id())
        ->get();

    return view('keranjang.index', compact('keranjang'));
}


       // TAMBAH QTY

public function tambah($productId)
{
    $item = Keranjang::where('id', Auth::id())
        ->where('product_id', $productId)
        ->first();

    if ($item) {
        $item->qty += 1;
        $item->save();
    } else {
        Keranjang::create([
            'id' => Auth::id(),   
            'product_id' => $productId,
            'qty' => 1
        ]);
    }

    return back();
}


    // KURANG QTY
    public function kurang($id)
    {
        $item = Keranjang::findOrFail($id);

        if ($item->qty > 1) {
            $item->qty -= 1;
            $item->save();
        } else {
            // kalau qty 1, hapus item
            $item->delete();
        }

        return back();
    }

    public function update(Request $request, $id)
    {
        $item = Keranjang::findOrFail($id);

        $qty = min(1, (int) $request->qty); // minimal 1

        $item->update([
            'qty' => $qty
        ]);

        if ($qty < 1) {
            $item->delete();
        } else {
            $item->qty = $qty;
            $item->save();
        }
        $item->subtotal = $item->qty * $item->product->price;

    }

    public function hapus($id)
    {
        Keranjang::findOrFail($id)->delete();
        return back();
    }

    
}
