<?php

namespace App\Livewire\Pegawai;

use App\Models\Pegawai;
use Livewire\Component;

class Table extends Component
{

    public $pegawais;


    public function render()
    {
        $data['pegawais'] = Pegawai::all();
        return view('livewire.pegawai.table', $data);
    }
}
