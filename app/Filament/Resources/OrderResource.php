<?php

namespace App\Filament\Resources;

use App\Filament\Roles;
use App\Models;
use Filament\Columns;
use Filament\Fields;
use Filament\Resource;

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
            //
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
