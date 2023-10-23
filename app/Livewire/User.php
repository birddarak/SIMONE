<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component
{
    public $users;

    public function mount($users)
    {
        $this->users = $users;
    }


    public function render()
    {
        return view('panel.pages.user.show');
    }
}
