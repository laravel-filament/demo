<?php

namespace App\Filament\Resources\ProductResource\Actions;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Actions\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static $resource = ProductResource::class;
}
