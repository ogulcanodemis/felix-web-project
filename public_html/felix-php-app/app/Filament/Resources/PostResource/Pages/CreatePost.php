<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use App\Models\WebLink;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function afterCreate(): void
    {
        $formData = $this->data;
        $record = $this->record;

        WebLink::updateOrCreate(
            [
                'web_linkable_id' => $record->id,
                'web_linkable_type' => Post::class,
            ],
            [
                'url' => $formData['slug'],
                'target' => '_self',
                'visible' => 'visible',
                'rating' => -1,
                'type' => 'base'
            ]
        );
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['author_id'] = auth()->id();
        $data['type'] = 'post';

        return $data;
    }
}
