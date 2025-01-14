<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Post;
use App\Models\WebLink;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function afterSave(): void
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
    protected function mutateFormDataBeforeUpdate(array $data): array
    {
        $data['author_id'] = auth()->id();
        $data['type'] = 'page';

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
