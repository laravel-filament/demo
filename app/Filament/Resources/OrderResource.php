<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\Forms\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class OrderResource extends Resource
{
    public static $icon = 'heroicon-o-currency-dollar';

    public static function authorization()
    {
        return [
            //
        ];
    }

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\Fieldset::make()->schema([
                    Components\Select::make('customer_id')
                        ->relation('customer.name')
                        ->placeholder('Select a customer')
                        ->required(),
                ]),
                Components\RelationManager::make('products')
                    ->manager(RelationManagers\ProductsRelationManager::class),
                Components\RichEditor::make('notes')
                    ->placeholder('Notes'),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('customer.name')
                    ->searchable()
                    ->sortable()
                    ->primary(),
                Columns\Text::make('created_at')
                    ->sortable()
                    ->dateTime(),
            ]);
    }

    public static function routes()
    {
        return [
            Pages\ListOrders::routeTo('/', 'index'),
            Pages\CreateOrder::routeTo('/create', 'create'),
            Pages\EditOrder::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
