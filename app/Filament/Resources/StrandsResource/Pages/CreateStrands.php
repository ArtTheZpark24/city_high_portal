<?php

namespace App\Filament\Resources\StrandsResource\Pages;

use App\Filament\Resources\StrandsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStrands extends CreateRecord
{
    protected static string $resource = StrandsResource::class;
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'strands created';
    }
}
