<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Cosplayer;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Intervention\Image\Facades\Image;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function afterCreate(): void
    {
        if (!empty($this->record->cover))
        {
            $coverPath = public_path($this->record->cover);
            $coverImg= Image::make($coverPath);

            $coverImg->resize(500, 250)->save($coverPath);

            $coverImg->destroy();
        }
        Cosplayer::find($this->record->cosplayer_id)->countPosts();
    }
}
