<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Registrar')]
class RegisterPage extends Component
{

    public $nombre, $email, $contrasenia;

    public function registrar()
    {
        $messages = [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'contrasenia.required' => 'La contraseña es obligatoria.',
            'contrasenia.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contrasenia.max' => 'La contraseña no puede tener más de 255 caracteres.',
        ];

        $this->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'contrasenia' => 'required|min:8|max:255',
        ], $messages);


        $user = User::create([
            'name' => $this->nombre,
            'email' => $this->email,
            'password' => Hash::make($this->contrasenia),
        ]);

        auth()->login($user);

        return redirect()->intended();
    }

    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
