<?php

namespace App\Livewire\Realisasi\Program;

use App\Models\Pegawai;
use App\Models\Program;
use Livewire\Component;

class Table extends Component
{

    // Model Filter
    public $tahun_anggaran = '2023', $apbd = 'murni';

    // Model Form
    public $kode, $program, $pegawai_id;

    public function render()
    {
        return $this->index();
    }

    public function index()
    {
        if (auth()->user()->rule == 'kabid') {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('pegawai_id', auth()->user()->pegawai->id)
                ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
                ->get();
            $data['pegawais'] = Pegawai::where('id', auth()->user()->pegawai->id)->get();
        } else {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
                ->get();
            $data['pegawais'] = Pegawai::all();
        }

        return view('livewire.realisasi.program.table', $data);
    }
}
