<?php

namespace App\Livewire;

use App\Models\Direccion;
use App\Models\Pedido;
use App\Models\PedidoItem;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Mi pedido')]
class MyOrderDetailPage extends Component
{

    public $pedido_id;


    public function mount($pedido_id)
    {
        $this->pedido_id = $pedido_id;
    }

    public function render()
    {
        $pedido_items = PedidoItem::with('producto')->where('pedido_id', $this->pedido_id)->get();
        $direccion = Direccion::where('pedido_id', $this->pedido_id)->first();
        $pedido = Pedido::where('id', $this->pedido_id)->first();

        return view(
            'livewire.my-order-detail-page',
            [
                'pedido_items' => $pedido_items,
                'direccion' => $direccion,
                'pedido' => $pedido,
            ]
        );
    }
}
