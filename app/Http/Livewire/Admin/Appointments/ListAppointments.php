<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\Component;

class ListAppointments extends Component
{
    public function render()
    {
        return view('livewire.admin.appointments.list-appointments', [
            'appointments' => Appointment::latest()->paginate()
        ]);
    }
}
