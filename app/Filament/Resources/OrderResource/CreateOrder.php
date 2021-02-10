<?php

namespace App\Filament\Resources\OrderResource;

use App\Filament\Resources\OrderResource;
use Filament\Actions\CreateResourceRecord;

class CreateOrder extends CreateResourceRecord
{
    protected static $resource = OrderResource::class;
}
