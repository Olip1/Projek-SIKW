<?php

namespace App\Http\Controllers;

use App\Models\EducationalVideo;
use Illuminate\Http\Request;

class AdminEducationalVideoController extends Controller
{
    //
    public function index()
    {
        $videos = EducationalVideo::latest()->get();
        return view('admin.edukasi.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.edukasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'youtube_url' => 'required|url',
        ]);

        $thumb = $request->file('thumbnail')->store('videos', 'public');

        EducationalVideo::create([
            'title' => $request->title,
            'thumbnail' => $thumb,
            'youtube_url' => $request->youtube_url,
            'description' => $request->description,
            'is_active' => $request->is_active
        ]);

        return redirect()->route('admin.edukasi.index');
    }

    public function edit($id)
    {
        $video = EducationalVideo::findOrFail($id);
        return view('admin.edukasi.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = EducationalVideo::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            $thumb = $request->file('thumbnail')->store('videos', 'public');
            $video->thumbnail = $thumb;
        }

        $video->update($request->only('title', 'youtube_url', 'description', 'is_active'));

        return redirect()->route('admin.edukasi.index');
    }

    public function destroy($id)
    {
        EducationalVideo::destroy($id);
        return back();
    }
}
