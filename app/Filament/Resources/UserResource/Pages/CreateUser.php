<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function afterSave(): void
    {
        if (empty($this->record->email_verified_at) && $this->data['verified'] == true) {
            $this->record->verifyEmail();
        } elseif (!empty($this->record->email_verified_at) && $this->data['verified'] == false) {
            $this->record->unVerifyEmail();
        }

        if (!empty($this->record->avatar))
        {
            $path = public_path($this->record->avatar);
            $image= Image::make($path);

            if ($image->height() > 150 || $image->width() > 150)
            {
                $image->resize(150, 150)->save($path);
            }

            $image->destroy();
        }
    }
}
