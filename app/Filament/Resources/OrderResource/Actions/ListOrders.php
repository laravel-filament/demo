<?php

namespace App\Filament\Resources\OrderResource\Actions;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Actions\ListRecords;

class ListOrders extends ListRecords
{
    protected static $resource = OrderResource::class;

    protected static $title = 'Orders';
}
