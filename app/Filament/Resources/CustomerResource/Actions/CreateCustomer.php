<?php

namespace App\Filament\Resources\CustomerResource\Actions;

use App\Filament\Resources\CustomerResource;
use Filament\Resources\Actions\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static $resource = CustomerResource::class;
}
