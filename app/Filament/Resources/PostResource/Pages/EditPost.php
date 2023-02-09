<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Cosplayer;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(function ($record) {
                Cosplayer::find($record->cosplayer_id)->countPosts();
            }),
            Actions\RestoreAction::make()->after(function ($record) {
                Cosplayer::find($record->cosplayer_id)->countPosts();
            }),
            Actions\ForceDeleteAction::make()->after(function ($record) {
                if (!empty($record->cover))
                {
                    $coverPath = public_path($record->cover);
                    File::delete($coverPath);
                }
                Cosplayer::find($record->cosplayer_id)->countPosts();
            }),
        ];
    }

    protected function beforeSave(): void
    {
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
        if (!empty($this->record->cover))
        {
            $coverPath = public_path($this->record->cover);
            $coverImg= Image::make($coverPath);

            $coverImg->resize(500, 250)->save($coverPath);

            $coverImg->destroy();
        }
    }
}
