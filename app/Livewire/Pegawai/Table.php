<?php

namespace App\Livewire\Pegawai;

use App\Models\Pegawai;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $data['pegawais'] = Pegawai::orderBy('id', 'DESC')->get();
        return view('livewire.pegawai.table', $data);
    }
}
