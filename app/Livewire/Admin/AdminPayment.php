<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AdminPayment extends Component
{
    public $name, $phone;
    public $successMessage;

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        AdminPayment::create([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        $this->successMessage = 'Admin payment account added!';
        $this->reset(['name', 'phone']);
    }

    public function render()
    {
        return view('livewire.admin-payment', [
            'payments' => AdminPayment::all()
        ])->layout('layouts.app');
    }
}
