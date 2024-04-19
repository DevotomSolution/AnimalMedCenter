<?php

namespace App\Filament\Resources\AppoimentResource\Pages;

use App\Filament\Resources\AppoimentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppoiment extends EditRecord
{
    protected static string $resource = AppoimentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
