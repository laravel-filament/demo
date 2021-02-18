<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Roles;
use App\Models;
use Filament\Resource;
use Filament\Resources\Columns;
use Filament\Resources\Fields;
use Filament\Resources\Filter;

class OrderResource extends Resource
{
    public static $icon = 'heroicon-o-currency-dollar';

    public static $model = Models\Order::class;

    public static function authorization()
    {
        return [
            //
        ];
    }

    public static function columns()
    {
        return [
            Columns\Text::make('customer.name')
                ->searchable()
                ->sortable()
                ->primary(),
            Columns\Text::make('created_at')->sortable(),
        ];
    }

    public static function fields()
    {
        return [
            Fields\RichEditor::make('notes')
                ->placeholder('Notes'),
        ];
    }

    public static function filters()
    {
        return [
            //
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
