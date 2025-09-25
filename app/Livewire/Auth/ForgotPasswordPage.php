<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Password - MyCart')]
class ForgotPasswordPage extends Component
{
    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
