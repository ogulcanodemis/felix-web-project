<?php

namespace App\Models;

use App\Enums\PostStatus;
use App\Enums\PostTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Traits\HasTranslations;

class Post extends Model implements HasMedia
{
    use HasFactory, HasTags, InteractsWithMedia, HasTranslations;

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'parent_id',
        'name',
        'title',
        'description',
        'content',
        'status',
        'comment_status',
        'author_id',
    ];

    protected $guarded = ['id'];

    protected $appends = ['slug'];

    public $translatable = ['title', 'description', 'content'];

    protected $casts = [
        'status' => PostStatus::class,
        'type' => PostTypes::class,
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function meta_tags(): MorphMany
    {
        return $this->morphMany(MetaTag::class, 'meta_tagable');
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Taxonomy::class, 'taxonomyable');
    }

    public function tags(): MorphToMany
    {
        return $this
            ->morphToMany(self::getTagClassName(), 'taggable', 'taggables', null, 'tag_id')
            ->orderBy('order_column');
    }

    public function web_links(): MorphMany
    {
        return $this->morphMany(WebLink::class, 'web_linkable');
    }

    public function base_link(): HasOne
    {
        return $this->hasOne(WebLink::class, 'web_linkable_id')
            ->where('web_linkable_type', self::class)
            ->where('type', 'base');
    }

    public function getSlugAttribute()
    {
        return $this->base_link?->getTranslations('url') ?? [];
    }

    public static function __set_state($array)
    {
        return new static($array);
    }
}
