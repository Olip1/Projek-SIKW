<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('products.detail', compact('product'));
    }
}
