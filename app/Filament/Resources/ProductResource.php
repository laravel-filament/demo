<?php

namespace App\Filament\Resources;

use App\Filament\Roles;
use App\Models;
use Filament\Forms\Fields;
use Filament\Resource;
use Filament\Tables\Columns;

class ProductResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static $model = Models\Product::class;

    public static function authorization()
    {
        return [
            //
        ];
    }

    public static function columns()
    {
        return [
            Columns\Text::make('name')->searchable()->sortable(),
            Columns\Text::make('price')->searchable()->sortable(),
        ];
    }

    public static function fields()
    {
        return [
            Fields\Fieldset::make()->fields([
                Fields\Text::make('record.name')
                    ->placeholder('Name')
                    ->autofocus()
                    ->required(),
                Fields\Text::make('record.price')
                    ->placeholder('Price')
                    ->type('number')
                    ->min(0)
                    ->required(),
            ]),
            Fields\RichEditor::make('record.description')
                ->placeholder('Description')
                ->attachmentDirectory('product-attachments'),
            Fields\Tags::make('record.tags')
                ->placeholder('Tags'),
            Fields\Fieldset::make()->fields([
                Fields\File::make('record.image')->image(),
            ]),
        ];
    }

    public static function routes()
    {
        return [
            ProductResource\ListProducts::route('/', 'index'),
            ProductResource\CreateProduct::route('/create', 'create'),
            ProductResource\EditProduct::route('/{record}/edit', 'edit'),
        ];
    }
}
