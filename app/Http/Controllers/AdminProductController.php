<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // tampilkan semua produk
    public function index()
    {
        $products = Product::all();
        return view('admin.produk.index', compact('products'));
    }

    // tampilkan form tambah produk
    public function create()
    {
        return view('admin.produk.create');
    }

    // simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'thumbnail' => 'required|image',
        ]);

        $file = $request->file('thumbnail');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('products'), $filename);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'thumbnail' => $filename,
        ]);

        return redirect()->route('admin.products.index');
    }

    // tampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.produk.edit', compact('product'));
    }

    // update produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ];

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('products'), $filename);
            $data['thumbnail'] = $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index');
    }

    // hapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
