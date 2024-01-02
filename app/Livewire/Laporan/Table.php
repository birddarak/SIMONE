<?php

namespace App\Livewire\Laporan;

use App\Models\Program;
use Livewire\Component;

class Table extends Component
{
    public $tahun_anggaran, $apbd = 'murni';

    public function mount() {
        $this->tahun_anggaran = date("Y");
    }

    public function render()
    {
        return $this->index();
    }
    
    public function index(){
        if (auth()->user()->rule == 'kabid') {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('pegawai_id', auth()->user()->pegawai->id)
                ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
                ->get();
        } else {
            $data['programs'] = Program::orderBy('kode', 'ASC')
                ->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)
                ->get();
        }

        return view('livewire.laporan.table', $data);
    }
}
