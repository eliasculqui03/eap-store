<?php

namespace App\Livewire;

use App\Models\Pedido;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Mis pedidos')]
class MyOrdersPage extends Component
{
    use WithPagination;

    public function render()
    {
        $mis_pedidos = Pedido::where('user_id', auth()->id())->latest()->paginate(4);


        return view(
            'livewire.my-orders-page',
            [
                'pedidos' => $mis_pedidos,
            ]
        );
    }
}
