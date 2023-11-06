<?php

namespace App\Livewire\DPA;

use App\Models\Pegawai;
use Livewire\Component;

class Form extends Component
{
    public function render()
    {
        $data['pegawais'] = Pegawai::all();
        return view('livewire.d-p-a.form', $data);
    }
}
