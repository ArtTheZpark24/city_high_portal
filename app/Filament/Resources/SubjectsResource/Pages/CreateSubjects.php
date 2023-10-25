<?php

namespace App\Filament\Resources\SubjectsResource\Pages;

use App\Filament\Resources\SubjectsResource;
use App\Models\Subjects;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubjects extends CreateRecord
{
    protected static string $resource = SubjectsResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Subject created';
    }
}
