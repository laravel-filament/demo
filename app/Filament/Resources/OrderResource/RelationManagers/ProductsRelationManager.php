<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Resources\Columns;
use Filament\Resources\Filter;
use Filament\Resources\RelationManager;

class ProductsRelationManager extends RelationManager
{
    protected static $relationship = 'products';

    public function columns()
    {
        return [
            Columns\Text::make('name')
                ->searchable()
                ->sortable()
                ->primary(),
            Columns\Text::make('price')
                ->searchable()
                ->sortable()
                ->currency(),
        ];
    }

    public function filters()
    {
        return [
            Filter::make('expensive', fn ($query) => $query->where('price', '>', '100')),
        ];
    }
}
