<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Home - EAP Store')]

class HomePage extends Component
{


    public function render()
    {
        $marcas = Marca::where('estado', 1)->get();
        //dd($marcas);
        $categorias = Categoria::where('estado', 1)->get();

        return view(
            'livewire.home-page',
            [
                'marcas' => $marcas,
                'categorias' => $categorias,
            ]
        );
    }
}
