<?php

namespace App\Filament\Resources\OrderResource\Forms\RelationManagers;

use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Forms\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static $relationship = 'products';

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('name')
                    ->searchable()
                    ->sortable()
                    ->primary(),
                Columns\Text::make('price')
                    ->searchable()
                    ->sortable()
                    ->currency(),
            ]);
    }
}
