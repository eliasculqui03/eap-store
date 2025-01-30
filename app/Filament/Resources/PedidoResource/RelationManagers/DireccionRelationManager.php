<?php

namespace App\Filament\Resources\PedidoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DireccionRelationManager extends RelationManager
{
    protected static string $relationship = 'direccion';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('apellidos')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('telefono')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('departamento')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('provincia')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('distrito')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ciudad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codigo_postal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextArea::make('direccion_calle')
                    ->required()
                    ->columnSpanFull(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('direccion_calle')
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->getStateUsing(fn($record) => $record->nombreCompleto())
                    ->searchable(['nombre', 'apellidos']), // si quieres que sea buscable
                Tables\Columns\TextColumn::make('telefono'),
                Tables\Columns\TextColumn::make('departamento'),
                Tables\Columns\TextColumn::make('provincia'),
                Tables\Columns\TextColumn::make('distrito'),
                Tables\Columns\TextColumn::make('ciudad'),
                Tables\Columns\TextColumn::make('codigo_postal'),
                Tables\Columns\TextColumn::make('direccion_calle'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
