<?php

namespace App\Filament\Resources\CustomerResource\Actions;

use App\Filament\Resources\CustomerResource;
use Filament\Resources\Actions\ListRecords;

class ListCustomers extends ListRecords
{
    protected static $resource = CustomerResource::class;
}
