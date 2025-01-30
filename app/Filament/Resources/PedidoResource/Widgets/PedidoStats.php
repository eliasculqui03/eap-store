<?php

namespace App\Filament\Resources\PedidoResource\Widgets;

use App\Models\Pedido;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class PedidoStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Nuevos Pedidos', Pedido::query()->where('estado', 'Nuevo')->count()),
            Stat::make('Pedidos procesando', Pedido::query()->where('estado', 'Procesando')->count()),
            Stat::make('Pedidos entregados', Pedido::query()->where('estado', 'Entregado')->count()),
            Stat::make('Promedio de precios', Number::currency(Pedido::query()->avg('total')), ''),
        ];
    }
}
