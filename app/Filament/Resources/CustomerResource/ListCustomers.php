<?php

namespace App\Filament\Resources\CustomerResource;

use App\Filament\Resources\CustomerResource;
use Filament\Actions\ListRecords;

class ListCustomers extends ListRecords
{
    protected static $resource = CustomerResource::class;
}
