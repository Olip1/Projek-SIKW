<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'alamat' => 'nullable',
            'password' => 'nullable|min:6',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();

        $user->name = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('profile_photos'), $filename);
            $user->photo = $filename;
        }

        $user->save();

        return back()->with('success', 'Profile berhasil diperbarui!');
    }
}
