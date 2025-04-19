<?php

namespace App\Livewire;

use App\Helpers\CartMangement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Carrrito - EAP Store')]
class CartPage extends Component
{

    public $carrito_items = [];

    public $total_general;

    public function mount()
    {
        $this->carrito_items = CartMangement::getCartItemsFromCookie();
        $this->total_general = CartMangement::calculateGrandTotal($this->carrito_items);
    }

    public function eliminarItem($itemId)
    {
        $this->carrito_items = CartMangement::removeCartItem($itemId);
        $this->total_general = CartMangement::calculateGrandTotal($this->carrito_items);
        $this->dispatch('actualizar-num-carrito', num_carrito: count($this->carrito_items))->to(Navbar::class);
    }

    public function incrementarItem($itemId)
    {
        $this->carrito_items = CartMangement::incrementQuantityToCartItem($itemId);
        $this->total_general = CartMangement::calculateGrandTotal($this->carrito_items);
    }
    public function decrementarItem($itemId)
    {
        $this->carrito_items = CartMangement::decrementQuantityToCartItem($itemId);
        $this->total_general = CartMangement::calculateGrandTotal($this->carrito_items);
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
