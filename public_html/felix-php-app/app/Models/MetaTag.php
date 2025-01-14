<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MetaTag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meta_tagable_type',
        'meta_tagble_id',
        'key',
        'value',
    ];

    public function metatagable(): MorphTo
    {
        return $this->morphTo();
    }

    public function weblinks(): MorphMany
    {
        return $this->morphMany(WebLink::class, 'weblinkable');
    }
}
