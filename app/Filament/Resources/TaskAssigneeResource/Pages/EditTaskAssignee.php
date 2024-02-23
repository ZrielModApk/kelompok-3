<?php

namespace App\Filament\Resources\TaskAssigneeResource\Pages;

use App\Filament\Resources\TaskAssigneeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTaskAssignee extends EditRecord
{
    protected static string $resource = TaskAssigneeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
