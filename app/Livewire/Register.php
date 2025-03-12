<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisterForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    #[Layout('layouts.guest')]

    public RegisterForm $form;

    public function save()
    {
        $user = $this->form->store();
        Auth::attempt(['email' => $user->email, 'password' => $this->form->password]);
        return $this->redirect('/', true);
    }

    public function render()
    {
        return view('livewire.register')->title('Sign Up');
    }
}
