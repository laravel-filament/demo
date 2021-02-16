<?php

namespace App\Filament\Resources\OrderResource\Actions;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Actions\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static $resource = OrderResource::class;
}
