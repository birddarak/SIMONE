<?php

namespace App\Livewire\Realisasi\Kegiatan;

use App\Models\Kegiatan;
use Livewire\Component;

class Table extends Component
{
    public $program;

    public function mount($program){
        $this->program = $program;
    }

    public function render()
    {
        $data['kegiatans'] = Kegiatan::orderBy('kode', 'ASC')->where('program_id', $this->program->id)->get();
        return view('livewire.realisasi.kegiatan.table', $data);
    }
}
