<?php

namespace App\Filament\Resources\StrandsResource\Pages;

use App\Filament\Resources\StrandsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStrands extends EditRecord
{
    protected static string $resource = StrandsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
