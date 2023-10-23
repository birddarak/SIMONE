<?php

namespace App\Livewire\DPA;

use App\Models\Program;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $data['programs'] = Program::orderBy('id', 'DESC')
            ->where('tahun_anggaran', date('Y'))
            ->get();
        return view('livewire.d-p-a.table', $data);
    }
}
