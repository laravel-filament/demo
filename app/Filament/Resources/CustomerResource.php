<?php

namespace App\Filament\Resources;

use App\Filament\Roles;
use App\Models;
use Filament\Columns;
use Filament\Fields;
use Filament\Resource;

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
            //
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
