<?php

namespace App\Filament\Resources\OrderResource;

use App\Filament\Resources\OrderResource;
use Filament\Actions\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static $resource = OrderResource::class;
}
