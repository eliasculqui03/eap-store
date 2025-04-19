<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Str;

#[Title('Restablecer contraseña')]
class ResetPasswordPage extends Component
{
    public $token;

    #[Url]
    public $email;
    public $contrasenia;
    public $contrasenia_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function guardar()
    {
        $messages = [
            'token.required' => 'El token de restablecimiento es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico es inválido.',
            'contrasenia.required' => 'La nueva contraseña es obligatoria.',
            'contrasenia.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contrasenia.confirmed' => 'La confirmación de la contraseña no coincide.',
        ];

        $this->validate([
            'token' => 'required',
            'email' => 'required|email',
            'contrasenia' => 'required|min:8|confirmed',
        ], $messages);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->contrasenia,
                'token' => $this->token,
                'password_confirmation' => $this->contrasenia_confirmation,
            ],
            function (User $user, string $password) {
                $password = $this->contrasenia;

                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login') : session()->flash('error', 'Error al restablecer la contraseña. Por favor, verifica el token o el correo electrónico.');
    }






    public function render()
    {
        return view('livewire.auth.reset-password-page');
    }
}
