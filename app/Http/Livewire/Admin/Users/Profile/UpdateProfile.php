<?php

namespace App\Http\Livewire\Admin\Users\Profile;

use App\Models\User;
use Livewire\Component;

class UpdateProfile extends Component
{
    public $user;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $changePassword;


    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user->id],
            'password' => ['string', 'min:8', 'confirmed', 'nullable']
        ]);

        $this->user->update($data);

        session()->flash('success', 'Profile updated.');
    }

    public function addChangePasswordInput()
    {
        $this->changePassword = $this->changePassword ? false : true;
    }

    public function render()
    {
        return view('livewire.admin.users.profile.update-profile');
    }
}
