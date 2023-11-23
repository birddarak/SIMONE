<?php

namespace App\Livewire\Realisasi\RincianBelanja;

use Livewire\Component;
use App\Models\RealisasiSubkegiatan;
use App\Models\RincianBelanja;

class Table extends Component
{
    public function render()
    {
        $data['subkegiatan_realisasis'] = RealisasiSubkegiatan::where('kegiatan_id', $this->kegiatan->id)->get();
        $data['rincian_belanjas'] = RincianBelanja::all();
        return view('livewire.realisasi.rincian-belanja.table', $data);
    }
}
