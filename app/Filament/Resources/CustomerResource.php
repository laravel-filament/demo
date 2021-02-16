<?php

namespace App\Filament\Resources;

use App\Filament\Roles;
use App\Models;
use Filament\Forms\Fields;
use Filament\Resource;
use Filament\Tables\Columns;

class CustomerResource extends Resource
{
    public static $icon = 'heroicon-o-user-group';

    public static $model = Models\Customer::class;

    public static function authorization()
    {
        return [
            //
        ];
    }

    public static function columns()
    {
        return [
            Columns\Text::make('title')->sortable(),
            Columns\Text::make('name')->searchable()->sortable(),
            Columns\Text::make('email')
                ->searchable()
                ->sortable()
                ->link(fn($customer) => "mailto:$customer->email"),
            Columns\Text::make('phone')
                ->searchable()
                ->url(fn($customer) => "mailto:$customer->tel"),
            Columns\Text::make('birthday')->sortable(),
        ];
    }

    public static function fields()
    {
        return [
            Fields\Fieldset::make()->fields([
                Fields\Select::make('record.title')
                    ->placeholder('Title')
                    ->options([
                        'mr' => 'Mr',
                        'mrs' => 'Mrs',
                        'master' => 'Master',
                        'miss' => 'Miss',
                        'ms' => 'Ms',
                        'dr' => 'Dr',
                        'professor' => 'Professor',
                    ]),
                Fields\Text::make('record.name')
                    ->placeholder('Name')
                    ->autofocus()
                    ->required(),
                Fields\Text::make('record.email')
                    ->label('Email address')
                    ->placeholder('Email address')
                    ->email()
                    ->required()
                    ->only(CustomerResource\CreateUser::class, fn ($field) => $field->unique(Models\Customer::class, 'email'))
                    ->only(CustomerResource\EditUser::class, fn ($field) => $field->unique(Models\Customer::class, 'email', true)),
                Fields\Text::make('record.phone')
                    ->label('Phone number')
                    ->placeholder('Phone number')
                    ->tel(),
                Fields\Date::make('record.birthday')
                    ->placeholder('Birthday'),
            ]),
        ];
    }

    public static function routes()
    {
        return [
            CustomerResource\ListCustomers::route('/', 'index'),
            CustomerResource\CreateCustomer::route('/create', 'create'),
            CustomerResource\EditCustomer::route('/{record}/edit', 'edit'),
        ];
    }
}
