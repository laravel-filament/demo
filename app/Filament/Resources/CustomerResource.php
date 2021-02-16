<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Actions;
use App\Filament\Roles;
use App\Models;
use Filament\Resource;
use Filament\Resources\Columns;
use Filament\Resources\Fields;

class CustomerResource extends Resource
{
    public static $icon = 'heroicon-o-user-group';

    public static $model = Models\Customer::class;

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

    public static function columns()
    {
        return [
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
                ->url(fn($customer) => "mailto:$customer->email"),
            Columns\Text::make('phone')
                ->searchable()
                ->url(fn($customer) => "tel:$customer->tel"),
            Columns\Text::make('birthday')
                ->sortable()
                ->date(),
        ];
    }

    public static function fields()
    {
        return [
            Fields\Fieldset::make()->fields([
                Fields\Select::make('title')
                    ->placeholder('Title')
                    ->options(static::$titleOptions),
                Fields\Text::make('name')
                    ->placeholder('Name')
                    ->autofocus()
                    ->required(),
                Fields\Text::make('email')
                    ->label('Email address')
                    ->placeholder('Email address')
                    ->email()
                    ->required()
                    ->only(CustomerResource\CreateUser::class, fn ($field) => $field->unique(Models\Customer::class, 'email'))
                    ->only(CustomerResource\EditUser::class, fn ($field) => $field->unique(Models\Customer::class, 'email', true)),
                Fields\Text::make('phone')
                    ->label('Phone number')
                    ->placeholder('Phone number')
                    ->tel(),
                Fields\Date::make('birthday')
                    ->placeholder('Birthday'),
            ]),
        ];
    }

    public static function routes()
    {
        return [
            Actions\ListCustomers::route('/', 'index'),
            Actions\CreateCustomer::route('/create', 'create'),
            Actions\EditCustomer::route('/{record}/edit', 'edit'),
        ];
    }
}
