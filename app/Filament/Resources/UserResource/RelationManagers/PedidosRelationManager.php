<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\PedidoResource;
use App\Models\Pedido;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PedidosRelationManager extends RelationManager
{
    protected static string $relationship = 'pedidos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('id')
                //     ->required()
                //     ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Pedido ID')
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
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('estado_pago')
                    // ->label('Metodo de pago')
                    ->searchable()
                    ->badge()

                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha de creación')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Fecha de edición')
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\Action::make('Ver Pedido')
                    ->url(fn(Pedido $record): string => PedidoResource::getUrl('view', ['record' => $record]))
                    ->color('info')
                    ->icon('heroicon-m-eye'),

                //Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
