<?php

namespace App\Livewire\Dashboard;

use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\Subkegiatan;
use Livewire\Component;

class Stat extends Component
{

    // Model Filter
    public  $tahun_anggaran = '2023', $apbd = 'murni';

    public function render()
    {
        return $this->index();
    }

    public function index()
    {
        $data['programs'] = Program::where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd);
        $data['progs'] = Program::where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)->get();
        $kegiatans = Kegiatan::whereHas('program', function ($query) {
            return $query->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd);
        });
        $subkegiatans = Subkegiatan::whereHas('kegiatan.program', function ($query) {
            return $query->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd);
        });

        $data['total_program'] = $data['programs']->count();
        $data['total_kegiatan'] = $kegiatans->count();
        $data['total_subkegiatan'] = $subkegiatans->count();

        $data['total_pagu'] = $subkegiatans->sum('pagu_awal');

        return view('livewire.dashboard.stat', $data);
    }
}
