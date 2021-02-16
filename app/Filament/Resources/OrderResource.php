<?php

namespace App\Filament\Resources;

use App\Filament\Roles;
use App\Models;
use Filament\Forms\Fields;
use Filament\Resource;
use Filament\Tables\Columns;

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
            Columns\Text::make('customer.name')->searchable()->sortable(),
        ];
    }

    public static function fields()
    {
        return [
            Fields\RichEditor::make('record.notes')
                ->placeholder('Notes'),
        ];
    }

    public static function routes()
    {
        return [
            OrderResource\ListOrders::route('/', 'index'),
            OrderResource\CreateOrder::route('/create', 'create'),
            OrderResource\EditOrder::route('/{record}/edit', 'edit'),
        ];
    }
}
