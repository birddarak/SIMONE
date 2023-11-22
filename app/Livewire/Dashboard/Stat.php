<?php

namespace App\Livewire\Dashboard;

use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\RealisasiSubkegiatan;
use App\Models\RincianBelanja;
use App\Models\Subkegiatan;
use Livewire\Component;

class Stat extends Component
{

    // Model Filter
    public  $tahun_anggaran = '2023', $apbd = 'murni', $chartData;

    public function render()
    {
        // $this->graph();
        return $this->index();
    }

    public function index()
    {
        // Get Program, Kegiatan, Sub Kegiatan
        $data['programs'] = Program::where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd)->get();
        $data['kegiatans'] = Kegiatan::whereHas('program', function ($query) {
            return $query->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd);
        })->get();
        $data['subkegiatans'] = Subkegiatan::whereHas('kegiatan.program', function ($query) {
            return $query->where('tahun_anggaran', $this->tahun_anggaran)->where('apbd', $this->apbd);
        })->get();

        // Jumlah Program, Kegiatan, Sub Kegiatan
        $data['total_program'] = $data['programs']->count();
        $data['total_kegiatan'] = $data['kegiatans']->count();
        $data['total_subkegiatan'] = $data['subkegiatans']->count();

        // Total Pagu Seluruh Sub Kegiatan & Total Pagu Realisasi Sub Kegiatan
        $data['total_pagu'] = $data['subkegiatans']->sum('pagu');
        $data['pagu_terserap'] = 0;
        foreach ($data['subkegiatans'] as $subkegiatan) {
            $data['pagu_terserap'] += $subkegiatan->realisasi_subkegiatan->sum('pagu');
        }

        // graph
        $bulan = [];

        $data['ta'] = $this->tahun_anggaran;
        $data['apbd'] = $this->apbd;

        for ($i = 1; $i <= 12; $i++) {
            $rincian =  RincianBelanja::whereHas('realisasi_subkegiatan.subkegiatan.kegiatan.program', function ($query) use ($data) {
                return $query->where('tahun_anggaran', request()->input('tahun'))->where('apbd', request()->input('apbd'));
            })
                ->whereMonth('tanggal', $i)->sum('pagu');
            $bulan[] = $rincian;
        }
        $this->chartData = json_encode($bulan);

        return view('livewire.dashboard.stat', $data);
    }
}
