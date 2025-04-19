<?php

namespace App\Livewire;

use App\Helpers\CartMangement;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Verificación')]
class CheckoutPage extends Component
{


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
