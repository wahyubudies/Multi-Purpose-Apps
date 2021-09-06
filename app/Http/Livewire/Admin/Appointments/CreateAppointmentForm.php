<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateAppointmentForm extends Component
{
    public $state = [
        'status' => 'SCHEDULED'
    ];

    public function render()
    {
        $clients = Client::all();
        return view('livewire.admin.appointments.create-appointment-form', [
            'clients' => $clients
        ]);
    }
    public function createAppointment()
    {
        //validate
        Validator::make(
            $this->state, 
            [
                'client_id' => 'required',
                'time' => 'required',
                'date' => 'required',
                'note' => 'nullable',
                'status' => 'required|in:SCHEDULED,CLOSED'
            ], 
            [
                'client_id.required' => 'The client field is required.'
            ])->validate();
    
        Appointment::create($this->state);
        $this->dispatchBrowserEvent('alert', ['message' => 'Data addedd successfully!']);
    }
}
