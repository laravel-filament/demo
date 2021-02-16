<?php

namespace App\Filament\Resources\ProductResource\Actions;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Actions\EditRecord;

class EditProduct extends EditRecord
{
    protected static $resource = ProductResource::class;
}
