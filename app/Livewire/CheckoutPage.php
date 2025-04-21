<?php

namespace App\Livewire;

use App\Helpers\CartMangement;
use App\Mail\PedidoRealizado;
use App\Models\Direccion;
use App\Models\Pedido;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Verificación')]
class CheckoutPage extends Component
{

    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $ciudad;
    public $distrito;
    public $provincia;
    public $departamento;
    public $codigo_postal;
    public $metodo_pago;


    public function mount()
    {
        $cart_items = CartMangement::getCartItemsFromCookie();
        if (count($cart_items) == 0) {
            return redirect()->route('products');
        }
    }

    public function realizarPedido()
    {


        $messages = [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',

            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.max' => 'El apellido no puede tener más de 100 caracteres.',
            'apellido.min' => 'El apellido debe tener al menos 3 caracteres.',

            'telefono.required' => 'El número de teléfono es obligatorio.',
            'telefono.min' => 'El teléfono debe tener al menos 8 dígitos.',

            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',

            'ciudad.required' => 'La ciudad es obligatoria.',
            'ciudad.max' => 'La ciudad no puede tener más de 255 caracteres.',

            'distrito.required' => 'El distrito es obligatorio.',
            'distrito.max' => 'El distrito no puede tener más de 255 caracteres.',

            'provincia.required' => 'La provincia es obligatoria.',
            'provincia.max' => 'La provincia no puede tener más de 255 caracteres.',

            'departamento.required' => 'La región es obligatoria.',
            'departamento.max' => 'La región no puede tener más de 255 caracteres.',

            'codigo_postal.required' => 'El código postal es obligatorio.',

            'metodo_pago.required' => 'Debe seleccionar un método de pago.',
            'metodo_pago.in' => 'El método de pago seleccionado no es válido.',
        ];

        $this->validate([
            'nombre' => 'required|max:255|min:3',
            'apellido' => 'required|max:100|min:3',
            'telefono' => 'required|min:8',
            'direccion' => 'required|max:255',
            'ciudad' => 'required|max:255',
            'distrito' => 'required|max:255',
            'provincia' => 'required|max:255',
            'departamento' => 'required|max:255',
            'codigo_postal' => 'required',
            'metodo_pago' => 'required|in:COD,Yape',
        ], $messages);

        $cart_items = CartMangement::getCartItemsFromCookie();
        $total_general = CartMangement::calculateGrandTotal($cart_items);

        foreach ($cart_items as $item) {

            $linea_items[] = [
                'dato_precio' => [
                    'moneda' => 'PEN',
                    'precio_unitario' => $item['unit_amount'] * 100,
                    'dato_producto' => [
                        'nombre' => $item['name'],

                    ]
                ],
                'cantidad' => $item['quantity'],
            ];
        }

        $pedido = new Pedido();
        $pedido->user_id = auth()->user()->id;
        $pedido->total = CartMangement::calculateGrandTotal($cart_items);
        $pedido->metodo_pago = $this->metodo_pago;
        $pedido->estado_pago = 'Pendiente';
        $pedido->estado = 'Nuevo';
        $pedido->moneda = 'PEN';
        $pedido->importe_envio = 0;
        $pedido->metodo_envio = 'Delivery';
        $pedido->notas = 'Peido realizo por ' . auth()->user()->name;

        $direccion = new Direccion();
        $direccion->nombre = $this->nombre;
        $direccion->apellidos = $this->apellido;
        $direccion->telefono = $this->telefono;
        $direccion->direccion_calle = $this->direccion;
        $direccion->ciudad = $this->ciudad;
        $direccion->distrito = $this->distrito;
        $direccion->provincia = $this->provincia;
        $direccion->departamento = $this->departamento;
        $direccion->codigo_postal = $this->codigo_postal;


        if ($this->metodo_pago == 'Yape') {
            // $pedido->estado_pago = 'Pagado';
            // $pedido->estado = 'Enviado';
        } else {

            $ruta_url = route('success');
        }

        $pedido->save();
        $direccion->pedido_id = $pedido->id;
        $direccion->save();

        $itemsParaCrear = [];

        foreach ($cart_items as $item) {
            $itemsParaCrear[] = [
                'pedido_id' => $pedido->id,
                'producto_id' => $item['product_id'],
                'cantidad' => $item['quantity'],
                'precio_unitario' => $item['unit_amount'],
                'subtotal' => $item['total_amount'],
            ];
        }


        $pedido->pedidoItems()->createMany($itemsParaCrear);

        CartMangement::clearCartItems();

        Mail::to(request()->user())->send(new PedidoRealizado($pedido));
        return redirect($ruta_url);
    }

    public function render()
    {
        $cart_items = CartMangement::getCartItemsFromCookie();
        $total_general = CartMangement::calculateGrandTotal($cart_items);

        return view(
            'livewire.checkout-page',
            [
                'cart_items' => $cart_items,
                'total_general' => $total_general
            ]
        );
    }
}
