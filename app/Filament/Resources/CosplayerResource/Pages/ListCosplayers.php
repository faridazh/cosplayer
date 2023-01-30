<?php

namespace App\Filament\Resources\CosplayerResource\Pages;

use App\Filament\Resources\CosplayerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCosplayers extends ListRecords
{
    protected static string $resource = CosplayerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
