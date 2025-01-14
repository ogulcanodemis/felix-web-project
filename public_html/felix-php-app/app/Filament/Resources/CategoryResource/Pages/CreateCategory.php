<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Post;
use App\Models\Taxonomy;
use App\Models\WebLink;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function afterCreate(): void
    {
        $formData = $this->data;
        $record = $this->record;

        WebLink::updateOrCreate(
            [
                'web_linkable_id' => $record->id,
                'web_linkable_type' => Taxonomy::class,
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
        $data['term_id'] = 1;

        return $data;
    }
}
