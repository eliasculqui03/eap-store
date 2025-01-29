<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PedidoResource\Pages;
use App\Filament\Resources\PedidoResource\RelationManagers;
use App\Models\Pedido;
use App\Models\Producto;

use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Number;

class PedidoResource extends Resource
{
    protected static ?string $model = Pedido::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()
                    ->schema([
                        Section::make('Informaciónn del pedido')
                            ->schema([
                                Forms\Components\Select::make('user_id')
                                    ->searchable()
                                    ->preload()
                                    ->label('Cliente')
                                    ->relationship('user', 'name')
                                    ->required(),

                                Forms\Components\Select::make('metodo_pago')
                                    ->label('Método de pago')
                                    ->options([
                                        'Yape' => 'Yape',
                                        'COD' => 'Pago contra reembolso'
                                    ]),

                                Forms\Components\Select::make('estado_pago')
                                    ->options([
                                        'Pendiente' => 'Pendiente',
                                        'Pagado' => 'Pagado',
                                        'Fallido' => 'Fallido'
                                    ])
                                    ->required()
                                    ->default('Pendiente'),
                                Forms\Components\ToggleButtons::make('estado')
                                    ->inline()
                                    ->options([
                                        'Nuevo' => 'Nuevo',
                                        'Procesando' => 'Procesando',
                                        'Enviado' => 'Enviado',
                                        'Entregado' => 'Entregado',
                                        'Cancelado' => 'Cancelado'
                                    ])
                                    ->default('Nuevo')
                                    ->required()
                                    ->colors([
                                        'Nuevo' => 'info',
                                        'Procesando' => 'warning',
                                        'Enviado' => 'info',
                                        'Entregado' => 'success',
                                        'Cancelado' => 'danger'
                                    ])
                                    ->icons([
                                        'Nuevo' => 'heroicon-m-sparkles',
                                        'Procesando' => 'heroicon-m-arrow-path',
                                        'Enviado' => 'heroicon-m-truck',
                                        'Entregado' => 'heroicon-m-check-badge',
                                        'Cancelado' => 'heroicon-m-x-circle'
                                    ]),

                                Forms\Components\Select::make('moneda')
                                    ->options([
                                        'PEN' => 'PEN (Nuevos soles)',
                                        'USD' => 'USD (Dolares estadounidense)',
                                        'EUR' => 'EUR (Euros)'
                                    ])
                                    ->default('PEN'),

                                Forms\Components\Select::make('metodo_envio')
                                    ->required()
                                    ->options([
                                        'Delivery' => 'Delivery'

                                    ])
                                    ->default('Delivery'),

                                Forms\Components\Textarea::make('notas')
                                    ->columnSpanFull(),

                            ])->columns(2),

                        Section::make('Pedido de productos')
                            ->schema([
                                Repeater::make('pedidoItems')
                                    ->label('Productos')
                                    ->relationship()
                                    ->schema([
                                        Select::make('producto_id')
                                            ->relationship('producto', 'nombre')
                                            ->searchable()
                                            ->preload()
                                            ->distinct()
                                            ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                            ->columnSpan(4)
                                            ->reactive()
                                            ->afterStateUpdated(fn($state, Set $set) => $set('precio_unitario', Producto::find($state)?->precio ?? 0))
                                            ->afterStateUpdated(fn($state, Set $set) => $set('sub_total', Producto::find($state)?->precio ?? 0)),
                                        TextInput::make('cantidad')
                                            ->numeric()
                                            ->required()
                                            ->default(1)
                                            ->minValue(1)
                                            ->columnSpan(2)
                                            ->reactive()
                                            ->afterStateUpdated(fn($state, Set $set, Get $get) => $set('sub_total', $state * $get('precio_unitario'))),
                                        TextInput::make('precio_unitario')
                                            ->prefix('S/.')
                                            ->numeric()
                                            ->required()
                                            ->disabled()
                                            ->dehydrated()
                                            ->columnSpan(3),
                                        TextInput::make('sub_total')
                                            ->numeric()
                                            ->dehydrated()
                                            ->required()
                                            ->columnSpan(3),


                                    ])->columns(12),

                                Placeholder::make('total')
                                    ->content(function (Get $get, Set $set) {
                                        $total = 0;
                                        if (!$repeaters = $get('pedidoItems')) {
                                            return $total;
                                        }

                                        foreach ($repeaters as $key => $repeater) {
                                            $total += $get("pedidoItems.{$key}.sub_total");
                                        }
                                        $set('total', $total);
                                        return Number::currency($total, 'S/.');
                                    }),

                                Hidden::make('total')
                                    ->default(0)
                            ])

                    ])->columnSpanFull(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Cliente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                    ->money('PEN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('metodo_pago')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estado_pago')
                    ->badge()
                    ->searchable(),

                Tables\Columns\TextColumn::make('importe_envio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('metodo_envio')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('estado')
                    ->options([
                        'Nuevo' => 'Nuevo',
                        'Procesando' => 'Procesando',
                        'Enviado' => 'Enviado',
                        'Entregado' => 'Entregado',
                        'Cancelado' => 'Cancelado'
                    ])
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPedidos::route('/'),
            'create' => Pages\CreatePedido::route('/create'),
            'view' => Pages\ViewPedido::route('/{record}'),
            'edit' => Pages\EditPedido::route('/{record}/edit'),
        ];
    }
}
