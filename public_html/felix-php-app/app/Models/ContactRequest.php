<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ContactRequest extends Model
{
    protected $fillable = [
        'subject',
        'name',
        'email',
        'phone'
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(ContactRequestMessage::class, 'contact_request_id');
    }

    protected function replyStatus(): Attribute
    {
        return Attribute::make(
            get: fn($value) => !is_null($this->messages()->latest()->first()?->recipient_id),
        );
    }
}
