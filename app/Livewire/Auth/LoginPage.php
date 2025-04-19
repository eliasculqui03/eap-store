<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Acceso')]
class LoginPage extends Component
{

    public $email, $contrasenia;

    public function login()
    {
        $messages = [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.exists' => 'Este correo electrónico no está registrado en nuestro sistema.',
            'contrasenia.required' => 'La contraseña es obligatoria.',
            'contrasenia.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contrasenia.max' => 'La contraseña no puede tener más de 255 caracteres.',
        ];

        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'contrasenia' => 'required|min:8|max:255'
        ], $messages);


        if (auth()->attempt(['email' => $this->email, 'password' => $this->contrasenia])) {
            session()->flash('success', 'Bienvenido de nuevo!');
            return redirect()->intended();
        } else {
            session()->flash('error', 'Contraseña incorrecta.');
        }
    }



    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
