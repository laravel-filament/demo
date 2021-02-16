<?php

namespace App\Filament\Resources\OrderResource\Actions;

use App\Filament\Resources\OrderResource;
use Filament\Resources\Actions\EditRecord;

class EditOrder extends EditRecord
{
    protected static $resource = OrderResource::class;
}
