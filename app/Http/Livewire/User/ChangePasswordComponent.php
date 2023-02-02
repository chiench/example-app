<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class ChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('livewire.user.change-password-component')->layout('layouts.base');
    }
}
