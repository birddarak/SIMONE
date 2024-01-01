<?php

namespace App\Livewire\Pegawai;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Table extends Component
{
    public $nama, $nip, $jabatan;

    public $username, $email, $rule;

    public function render()
    {
        $data['pegawais'] = Pegawai::orderBy('id', 'DESC')->get();
        $data['users'] = User::all();
        return view('livewire.pegawai.table', $data);
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string',
            'nip' => 'required|string|unique:pegawais,nip',
            'jabatan' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'rule' => 'required|string|in:kepala dinas,kabid,admin,non-admin'
        ]);

        $user = User::create([
            'uuid' => str()->uuid(),
            'username' => $this->username,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' => Hash::make('password', [
                'rounds' => 12
            ]),
            'rule' => $this->rule,
            'remember_token' => str()->random(10)
        ]);

        Pegawai::create([
            'uuid' => str()->uuid(),
            'user_id' => $user->id,
            'nama' => $this->nama,
            'nip' => $this->nip,
            'jabatan' => $this->jabatan
        ]);

        $this->dispatch('alert', html: 'Berhasil menambahkan Data Pegawai & User');
        $this->reset(['nama', 'nip', 'jabatan', 'username', 'email', 'rule']);
    }

    // Pegawai

    public function updatePegawai($uuid, $field, $value)
    {
        $data = Pegawai::where('uuid', $uuid)->first();
        $data->update([
            $field => $value
        ]);
        $this->dispatch('alert', html: 'Berhasil memperbaharui Data Pegawai');
    }

    // User

    public function updateUser($uuid, $field, $value)
    {
        User::where('uuid', $uuid)->update([
            $field => $value
        ]);
        $this->dispatch('alert', html: 'Berhasil memperbaharui Data User');
    }

    public function destroy($uuid)
    {
        $pegawai = Pegawai::where('uuid', $uuid)->first();
        $user = User::find($pegawai->user_id);
        $user->delete();
        $pegawai->delete();
        $this->dispatch('alert', html: 'Berhasil menghapus Data Pegawai & User');
    }
}
