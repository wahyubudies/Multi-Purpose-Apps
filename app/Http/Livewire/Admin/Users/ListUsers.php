<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;

class ListUsers extends Component
{
    public $state = [];
    
    public function render()
    {
        return view('livewire.admin.users.list-users');
    }
    public function addNewUser()
    {
        $this->dispatchBrowserEvent('show-form');
    }
    public function createUser()
    {
        dd($this->state);
    }
}
