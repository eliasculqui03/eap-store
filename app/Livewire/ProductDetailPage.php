<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Producto de prodducto')]
class ProductDetailPage extends Component
{

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        return view(
            'livewire.product-detail-page',
            [
                'producto' => Producto::where('slug', $this->slug)->firstOrFail(),
            ]
        );
    }
}
