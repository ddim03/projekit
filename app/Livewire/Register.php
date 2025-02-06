<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    #[Layout('layouts.auth')]
    public $name, $username, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function registerUser()
    {
        
        // dd($this->validate());
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.register')->title('Sign Up');
    }
}