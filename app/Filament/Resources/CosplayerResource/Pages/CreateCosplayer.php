<?php

namespace App\Filament\Resources\CosplayerResource\Pages;

use App\Filament\Resources\CosplayerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Intervention\Image\Facades\Image;

class CreateCosplayer extends CreateRecord
{
    protected static string $resource = CosplayerResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        if (!empty($this->record->avatar))
        {
            $avatarPath = public_path($this->record->avatar);
            $avatarImg= Image::make($avatarPath);

            $avatarImg->resize(250, 250)->save($avatarPath);

            $avatarImg->destroy();
        }

        if (!empty($this->record->cover))
        {
            $coverPath = public_path($this->record->cover);
            $coverImg= Image::make($coverPath);

            $coverImg->resize(1000, 300)->save($coverPath);

            $coverImg->destroy();
        }
    }
}
