<?php

namespace App\Filament\Resources\ProductResource\Actions;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Actions\ListRecords;

class ListProducts extends ListRecords
{
    protected static $resource = ProductResource::class;

    protected static $title = 'Products';
}
