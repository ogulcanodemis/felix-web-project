<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Taxonomy extends Model
{
    use HasFactory,HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'term_id',
        'name',
        'description',
        'taxonomy_group',
        'order'
    ];

    protected $guarded = ['id'];

    protected $appends = ['slug'];

    public $translatable = ['name', 'description' ];

    public function parent_taxonomy(): BelongsTo
    {
        return $this->belongsTo(Taxonomy::class,'parent_id','id');
    }

    public function child_taxonomies(): HasMany
    {
        return $this->hasMany(Taxonomy::class, 'parent_id','id');
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function posts():MorphToMany
    {
        return $this->morphedByMany(Post::class,'taxonomyable');
    }

    public function web_links(): MorphMany
    {
        return $this->morphMany(WebLink::class, 'web_linkable');
    }

    public function base_link() :HasOne
    {
        return $this->hasOne(WebLink::class, 'web_linkable_id')
            ->where('web_linkable_type', self::class)
            ->where('type', 'base');
    }

    public function getSlugAttribute()
    {
        return $this->base_link?->getTranslations('url')?? [];
    }

}
