<?php

namespace App\Filament\Resources\CustomerResource\Actions;

use App\Filament\Resources\CustomerResource;
use Filament\Resources\Actions\EditRecord;

class EditCustomer extends EditRecord
{
    protected static $resource = CustomerResource::class;
}
