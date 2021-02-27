<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Filament\Roles;
use App\Models\Customer;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class CustomerResource extends Resource
{
    public static $icon = 'heroicon-o-user-group';

    public static $titleOptions = [
        'mr' => 'Mr.',
        'mrs' => 'Mrs.',
        'master' => 'Master',
        'miss' => 'Miss',
        'ms' => 'Ms.',
        'dr' => 'Doctor',
        'professor' => 'Professor',
    ];

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
                Components\Select::make('title')
                    ->placeholder('Select a title')
                    ->options(static::$titleOptions),
                Components\TextInput::make('name')
                    ->placeholder('Name')
                    ->autofocus()
                    ->required(),
                Components\TextInput::make('email')
                    ->label('Email address')
                    ->placeholder('Email address')
                    ->email()
                    ->required()
                    ->unique(Customer::class, 'email', true),
                Components\TextInput::make('phone')
                    ->label('Phone number')
                    ->placeholder('Phone number')
                    ->tel(),
                Components\DatePicker::make('birthday')
                    ->placeholder('Birthday'),
            ])
            ->columns(2);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('title')
                    ->sortable()
                    ->options(static::$titleOptions),
                Columns\Text::make('name')
                    ->searchable()
                    ->sortable()
                    ->primary(),
                Columns\Text::make('email')
                    ->searchable()
                    ->sortable()
                    ->url(fn ($customer) => "mailto:$customer->email"),
                Columns\Text::make('phone')
                    ->searchable()
                    ->url(fn ($customer) => "tel:$customer->tel"),
                Columns\Text::make('birthday')
                    ->sortable()
                    ->date(),
            ]);
    }

    public static function routes()
    {
        return [
            Pages\ListCustomers::routeTo('/', 'index'),
            Pages\CreateCustomer::routeTo('/create', 'create'),
            Pages\EditCustomer::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
