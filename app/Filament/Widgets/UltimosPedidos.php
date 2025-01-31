<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PedidoResource;
use App\Models\Pedido;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UltimosPedidos extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(PedidoResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->label('Pedido ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Cliente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->money('PEN'),

                Tables\Columns\TextColumn::make('estado')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {

                        'Nuevo' => 'info',
                        'Procesando' => 'warning',
                        'Enviado' => 'info',
                        'Entregado' => 'success',
                        'Cancelado' => 'danger'
                    })
                    ->icon(fn(string $state): string => match ($state) {

                        'Nuevo' => 'heroicon-m-sparkles',
                        'Procesando' => 'heroicon-m-arrow-path',
                        'Enviado' => 'heroicon-m-truck',
                        'Entregado' => 'heroicon-m-check-badge',
                        'Cancelado' => 'heroicon-m-x-circle'
                    }),

                Tables\Columns\TextColumn::make('metodo_pago')
                    ->label('Metodo de pago')
                    ->searchable(),

                Tables\Columns\TextColumn::make('estado_pago')
                    // ->label('Metodo de pago')
                    ->searchable()
                    ->badge(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha '),
            ])
            ->actions([
                Action::make('Ver Pedido')
                    ->url(fn(Pedido $record): string => PedidoResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-m-eye'),
            ]);
    }
}
