<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ProductResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

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
                Components\TextInput::make('name')
                    ->placeholder('Name')
                    ->autofocus()
                    ->required(),
                Components\TagsInput::make('tags')
                    ->placeholder('Tags'),
            ]),
            Components\RichEditor::make('description')
                ->placeholder('Description')
                ->attachmentDirectory('product-attachments'),
            Components\FileUpload::make('image')->image(),
        ]);
}

public static function table(Table $table)
{
    return $table
        ->columns([
            Columns\Text::make('name')
                ->searchable()
                ->sortable()
                ->primary(),
        ]);
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
