<?php

namespace App\Filament\Resources\PedidoResource\Pages;

use App\Filament\Resources\PedidoResource;
use App\Filament\Resources\PedidoResource\Widgets\PedidoStats;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListPedidos extends ListRecords
{
    protected static string $resource = PedidoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),

        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            PedidoStats::class
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Todo'),
            'Nuevo' => Tab::make()
                ->query(fn($query) => $query->where('estado', 'Nuevo')),
            'Procesando' => Tab::make()
                ->query(fn($query) => $query->where('estado', 'Procesando')),
            'Enviado' => Tab::make()
                ->query(fn($query) => $query->where('estado', 'Enviado')),
            'Entregado' => Tab::make()
                ->query(fn($query) => $query->where('estado', 'Entregado')),
            'Cancelado' => Tab::make()
                ->query(fn($query) => $query->where('estado', 'Cancelado')),

        ];
    }
}
