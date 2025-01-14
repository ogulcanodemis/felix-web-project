<?php

namespace App\Filament\Resources\ContactRequestResource\Pages;

use App\Filament\Resources\ContactRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditContactRequest extends EditRecord
{
    protected static string $resource = ContactRequestResource::class;


    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['contact_request_id'] = $this->record->id;
        $data['message'] = $data['content'];
        $data['recipient_id'] = auth()->id();
        $record->messages()->create($data);

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
