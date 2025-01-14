<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactRequestMessage extends Model
{
    protected $fillable = [
        'contact_request_id',
        'message',
        'recipient_id',
    ];

    public function contactRequest(): BelongsTo
    {
        return $this->belongsTo(ContactRequest::class,'contact_request_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
}
