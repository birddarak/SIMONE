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
        $data['programs'] = Program::orderBy('kode', 'ASC')->where('apbd', $this->apbd)->where('tahun_anggaran', $this->tahun_anggaran)->get();
        return view('livewire.laporan.table', $data);
    }
}
