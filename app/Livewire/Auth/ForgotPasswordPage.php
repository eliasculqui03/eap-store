<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Has olvidado tu contraseña')]
class ForgotPasswordPage extends Component
{

    public $email;

    public function guardar()
    {
        $messages = [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.exists' => 'Este correo electrónico no está registrado en nuestro sistema.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
        ];

        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
        ], $messages);

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status == Password::RESET_LINK_SENT) {
            session()->flash('success', 'Se ha enviado un enlace de restablecimiento de contraseña a su correo electrónico.');
            $this->email = '';
        } else {
            session()->flash('error', trans($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
