<?php

namespace App\Livewire\Realisasi\Kegiatan;

use App\Models\Kegiatan;
use App\Models\Program;
use Livewire\Component;

class Table extends Component
{
    public $program;

    public function mount($program){
        $this->program = $program;
    }

    public function render()
    {
        $data['program'] = Program::where('uuid', $this->program->uuid)->first();
        $data['kegiatans'] = Kegiatan::where('program_id', $this->program->id)->get();
        return view('livewire.realisasi.kegiatan.table', $data);
    }
}
