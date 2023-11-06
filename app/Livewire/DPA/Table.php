<?php

namespace App\Livewire\DPA;

use App\Models\Pegawai;
use App\Models\Program;
use Livewire\Component;

class Table extends Component
{
    // Model Filter
    public  $tahun_anggaran = '2023', $apbd = 'murni';

    // Model Form
    public $kode, $program, $pegawai_id;

    public function render()
    {
        $data['programs'] = Program::orderBy('id', 'DESC')
            ->where('tahun_anggaran', date('Y'))
            ->get();
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.table', $data);
    }


    public function simpan()
    {
        $this->validate([
            'tahun_anggaran' => 'required|string',
            'apbd' => 'required|string|in:murni,perubahan',
            'kode' => 'required|string',
        ]);
        dd('ok');
    }
}
