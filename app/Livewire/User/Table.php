<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $data['users'] = User::where('rule', '!=', 'admin')->orderBy("id", 'DESC')->get();
        return view('livewire.user.table', $data);
    }
}
