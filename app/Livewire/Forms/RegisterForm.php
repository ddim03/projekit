<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required|string|min:3|max:255')]
    public $name;

    #[Validate('required|unique:users,username|string|min:3|max:255')]
    public $username;

    #[Validate('required|email|unique:users,email')]
    public $email;

    #[Validate('required|string|min:8|confirmed')]
    public $password;

    public $password_confirmation;

    public function store()
    {
        $this->validate();

        return User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);
    }
}
