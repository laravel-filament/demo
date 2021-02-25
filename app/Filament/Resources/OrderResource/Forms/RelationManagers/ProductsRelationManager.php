<?php

namespace App\Filament\Resources\OrderResource\Forms\RelationManagers;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    public static $relationship = 'products';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\Fieldset::make()->schema([
                    Components\TextInput::make('name')
                        ->placeholder('Name')
                        ->autofocus()
                        ->required(),
                    Components\TextInput::make('price')
                        ->placeholder('Price')
                        ->type('number')
                        ->min(0)
                        ->required(),
                ]),
                Components\RichEditor::make('description')
                    ->placeholder('Description')
                    ->attachmentDirectory('product-attachments'),
                Components\TagsInput::make('tags')
                    ->placeholder('Tags'),
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
                Columns\Text::make('price')
                    ->searchable()
                    ->sortable()
                    ->currency(),
            ]);
    }
}
