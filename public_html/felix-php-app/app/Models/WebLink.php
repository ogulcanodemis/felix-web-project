<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Traits\HasTranslations;

class WebLink extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'name',
        'image',
        'target',
        'description',
        'visible',
        'rating',
        'rel',
        'notes',
        'rss',
        'type',
        'web_linkable_type',
        'web_linkable_id',
    ];

    protected $guarded = ['id'];

    public $translatable = ['url'];

    public function web_linkable(): MorphTo
    {
        return $this->morphTo();
    }
}
