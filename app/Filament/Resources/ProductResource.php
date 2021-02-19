<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Roles;
use Filament\Resource;
use Filament\Resources\Columns;
use Filament\Resources\Fields;
use Filament\Resources\Filter;

class ProductResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function authorization()
    {
        return [
            //
        ];
    }

    public static function columns()
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

    public static function fields()
    {
        return [
            Fields\Fieldset::make()->fields([
                Fields\Text::make('name')
                    ->placeholder('Name')
                    ->autofocus()
                    ->required(),
                Fields\Text::make('price')
                    ->placeholder('Price')
                    ->type('number')
                    ->min(0)
                    ->required(),
            ]),
            Fields\RichEditor::make('description')
                ->placeholder('Description')
                ->attachmentDirectory('product-attachments'),
            Fields\Tags::make('tags')
                ->placeholder('Tags'),
            Fields\Fieldset::make()->fields([
                Fields\File::make('image')->image(),
            ]),
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
            Pages\ListProducts::routeTo('/', 'index'),
            Pages\CreateProduct::routeTo('/create', 'create'),
            Pages\EditProduct::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
