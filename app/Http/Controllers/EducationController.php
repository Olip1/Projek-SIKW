<?php

namespace App\Http\Controllers;

use App\Models\EducationalVideo;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    //
    public function index()
    {
        $videos = EducationalVideo::where('is_active', 1)->latest()->get();
        return view('kontenedukasi', compact('videos'));
    }
}
