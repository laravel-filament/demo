<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
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
Components\Grid::make([
    Components\BelongsToSelect::make('customer_id')
        ->relationship('customer', 'name')
        ->placeholder('Select a customer')
        ->required(),
    Components\DateTimePicker::make('deliver_at')
        ->withoutSeconds(),
]),
Components\FileUpload::make('invoice'),
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
                Columns\Text::make('deliver_at')
                    ->sortable()
                    ->dateTime(),
            ]);
    }

    public static function relations()
    {
        return [
            RelationManagers\ProductsRelationManager::class,
        ];
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
