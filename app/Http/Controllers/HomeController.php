<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        return view('home', compact('products'));
    }
}
