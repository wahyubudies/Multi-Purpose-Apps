<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListUsers extends Component
{
    public $state = [];
    
    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users', ['users' => $users]);
    }
    public function addNewUser()
    {
        $this->dispatchBrowserEvent('show-form');
    }
    public function createUser()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ])->validate();

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        
        $this->dispatchBrowserEvent('hide-form');
    }
}
