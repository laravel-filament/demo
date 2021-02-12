<?php

namespace App\Filament\Resources\ProductResource;

use App\Filament\Resources\ProductResource;
use Filament\Actions\ListRecords;

class ListProducts extends ListRecords
{
    protected static $resource = ProductResource::class;
}
