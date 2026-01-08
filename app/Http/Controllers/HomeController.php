<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();
        $banners = Banner::where('is_active', 1)->get();

        return view('home', compact('products', 'banners'));
    }
}
