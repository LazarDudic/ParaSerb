<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $phoneNumber;
    public $message;
    public function sendEmail()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phoneNumber' => ['nullable', 'regex:/^[0-9-+\/()]{5,20}$/'],
            'message'  => ['required', 'min:10']
        ]);

        Mail::send(new ContactMail($data));
        session()->flash('success', 'Poruka je poslata.');
        $this->resetValues();
    }

    private function resetValues()
    {
        $this->name = '';
        $this->email = '';
        $this->phoneNumber = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
