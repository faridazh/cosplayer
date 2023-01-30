<?php

namespace App\Filament\Resources\CosplayerResource\Pages;

use App\Filament\Resources\CosplayerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EditCosplayer extends EditRecord
{
    protected static string $resource = CosplayerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\RestoreAction::make(),
            Actions\ForceDeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function beforeSave(): void
    {
        if (!empty($this->record->avatar))
        {
            if (!empty(array_values($this->data['avatar'])) && $this->record->avatar != array_values($this->data['avatar'])[0])
            {
                File::delete(public_path($this->record->avatar));
            }
            elseif (empty(array_values($this->data['avatar'])))
            {
                File::delete(public_path($this->record->avatar));
            }
        }

        if (!empty($this->record->cover))
        {
            if (!empty(array_values($this->data['cover'])) && $this->record->cover != array_values($this->data['cover'])[0])
            {
                File::delete(public_path($this->record->cover));
            }
            elseif (empty(array_values($this->data['cover'])))
            {
                File::delete(public_path($this->record->cover));
            }
        }
    }

    protected function afterSave(): void
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
