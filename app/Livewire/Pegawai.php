<?php

namespace App\Livewire;

use Livewire\Component;

class Pegawai extends Component
{

    public $pegawais;

    public function mount($pegawais){
        $this->pegawais = $pegawais;
    }

    public function render()
    {
        return view('panel.pages.pegawai.show');
    }
}
