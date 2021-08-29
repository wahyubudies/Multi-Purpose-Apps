<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListUsers extends Component
{
    public $state = [];
    public $user;
    public $editModal = false;
    public $userBeingRemoved = null;
    
    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users', ['users' => $users]);
    }
    public function addNewUser()
    {
        $this->state = [];
        $this->editModal = false;
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
        
        $this->dispatchBrowserEvent('hide-form', ['message' => 'Data added successfully!']);
    }
    public function editUser(User $user)
    {        
        $this->editModal = true;
        $this->state = $user->toArray();
        $this->user = $user;
        $this->dispatchBrowserEvent('show-form');
    }
    public function updateUser()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'sometimes|confirmed'
        ])->validate();
        
        if(!empty($validated['password'])) $validated['password'] = bcrypt($validated['password']);
        $this->user->update($validated);

        $this->dispatchBrowserEvent('hide-form', ['message' => 'Data updated successfully!']);
    }
    public function confirmUserRemoval($userId)
    {
        $this->userBeingRemoved = $userId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteUser()
    {
        $user = User::findOrFail($this->userBeingRemoved);
        $user->delete();

        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Data deleted successfully!']);
    }
}
