<?php

namespace App\Livewire;

use App\Models\Pedido;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title("Aprobado")]
class SuccessPage extends Component
{


    public function render()
    {
        $ultimo_pedido = Pedido::with('direccion')->where('user_id', auth()->user()->id)->latest()->first();

        return view('livewire.success-page', [
            'pedido' => $ultimo_pedido,
        ]);
    }
}
