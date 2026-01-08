<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;
use Psy\Util\Str;

class AdminArticleController extends Controller
{
    //
    public function index()
    {
        $articles = article::latest()->get();
        return view('admin.artikel.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'content' => 'required'
        ]);

        $thumb = $request->file('thumbnail')->store('articles', 'public');

        article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'thumbnail' => $thumb,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('admin.artikel.index');
    }

    public function edit($id)
    {
        $article = article::findOrFail($id);
        return view('admin.artikel.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = article::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail')->store('articles', 'public');
            $article->thumbnail = $thumb;
        }

        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('admin.artikel.index');
    }

    public function destroy($id)
    {
        article::destroy($id);
        return back();
    }
}
