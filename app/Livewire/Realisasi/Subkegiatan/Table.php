<?php

namespace App\Livewire\Realisasi\Subkegiatan;

use App\Models\Kegiatan;
use App\Models\RealisasiSubkegiatan;
use App\Models\Subkegiatan;
use Livewire\Component;

class Table extends Component
{
    public $kegiatan;

    public function mount($kegiatan){
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        $data['kegiatan'] = Kegiatan::where('uuid', $this->kegiatan->uuid)->first();
        $data['subkegiatans'] = Subkegiatan::where('kegiatan_id', $this->kegiatan->id)->get();
        $data['subkegiatan_realisasis'] = RealisasiSubkegiatan::all();
        return view('livewire.realisasi.subkegiatan.table', $data);
    }


}
