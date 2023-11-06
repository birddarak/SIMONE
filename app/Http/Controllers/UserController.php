<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password1' => 'required',
            'password2' => 'required'
        ]);

        $user = $request->all();
        if ($user['password1'] !== $user['password2']) {
            return;
        }
        $user['uuid'] = str()->uuid();
        $user['password'] = Hash::make($user['password1'], [
            'rounds' => 12
        ]);
        $user['email_verified_at'] = now();
        $user['rule'] = 'pegawai';
        $user['remember_token'] = str()->random(10);

        User::create($user);

        return redirect()->back()->with('success', 'User Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('panel.pages.user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User Berhasil di Hapus');
    }
}
