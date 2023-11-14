<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.pages.pegawai.index');
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
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:pegawais,nip',
            'jabatan' => 'required'
        ]);
        
        $user = User::create([
            'uuid' => str()->uuid(),
            'username' => $request->nama,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make('password', [
                'rounds' => 12
            ]),
            'rule' => 'pegawai',
            'remember_token' => str()->random(10)
        ]);

        $pegawai = $request->all();
        $pegawai['uuid'] = str()->uuid();
        $pegawai['user_id'] = $user->id;

        Pegawai::create($pegawai);

        return redirect()->back()->with('success', 'Pegawai Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->back()->with('success', 'Pegawai Berhasil di Hapus');
    }
}
