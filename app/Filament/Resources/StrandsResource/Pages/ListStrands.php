<?php

namespace App\Filament\Resources\StrandsResource\Pages;

use App\Filament\Resources\StrandsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStrands extends ListRecords
{
    protected static string $resource = StrandsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
