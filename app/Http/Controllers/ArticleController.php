<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = article::where('is_active', 1)->latest()->get();
        return view('article', compact('articles'));
    }

    public function show($slug)
    {
        $article = article::where('slug', $slug)->firstOrFail();
        return view('articleshow', compact('article'));
    }
}
