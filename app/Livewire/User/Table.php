<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $data['users'] = User::orderBy("id", 'DESC')->get();
        return view('livewire.user.table', $data);
    }
}
