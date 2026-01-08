<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.dashboard', [
            'users' => User::where('role', 'pembeli')->get()
        ]);
    }

    public function disable($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();

        return back();
    }
    public function show()
    {
        $users = User::where('role', 'pembeli')
            ->where('is_active', true)
            ->get();

        return view('admin.users.index', compact('users'));
    }

    public function nonaktif($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();

        return back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
