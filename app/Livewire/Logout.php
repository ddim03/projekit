<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.logout');
    }

    public function logout()
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }
        Auth::logout();
        return $this->redirect('/', true);
    }
}
