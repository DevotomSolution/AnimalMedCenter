<?php

namespace App\Filament\Resources\AppoimentResource\Pages;

use App\Filament\Resources\AppoimentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppoiments extends ListRecords
{
    protected static string $resource = AppoimentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
