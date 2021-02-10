<?php

namespace App\Filament\Resources\CustomerResource;

use App\Filament\Resources\CustomerResource;
use Filament\Actions\ListResourceRecords;

class ListCustomers extends ListResourceRecords
{
    protected static $resource = CustomerResource::class;
}
