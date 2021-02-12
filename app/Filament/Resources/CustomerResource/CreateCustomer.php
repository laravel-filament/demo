<?php

namespace App\Filament\Resources\CustomerResource;

use App\Filament\Resources\CustomerResource;
use Filament\Actions\CreateRecord;

class CreateCustomer extends CreateRecord
{
    protected static $resource = CustomerResource::class;
}
