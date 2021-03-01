<?php

namespace App\Filament\Resources\OrderResource\Forms\RelationManagers;

use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    public static $relationship = 'products';

    public static $title = 'Related Products';

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
}
