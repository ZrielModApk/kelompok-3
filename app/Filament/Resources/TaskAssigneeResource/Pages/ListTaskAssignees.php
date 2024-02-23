<?php

namespace App\Filament\Resources\TaskAssigneeResource\Pages;

use App\Filament\Resources\TaskAssigneeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaskAssignees extends ListRecords
{
    protected static string $resource = TaskAssigneeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
