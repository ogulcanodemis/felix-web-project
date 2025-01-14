<?php

namespace App\Models;

use App\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NavigationItem extends Model
{
    use HasTranslations;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

    protected $fillable = [
        'navigation_id',
        'type',
        'icon',
        'link_title',
        'link_url',
        'link_target_on_site',
        'target',
        'sort',
        'parent_id'
    ];

    public $translatable = ['link_title', 'link_url'];

    protected $appends = ['item_title'];

    public function navigation(): BelongsTo
    {
        return $this->belongsTo(Navigation::class);
    }

    public function getItemTitleAttribute()
    {
        return $this->getTranslation('link_title', app()->getLocale());
    }

    public function navigation_item_children(): HasMany
    {
        return $this->hasMany(NavigationItem::class, 'parent_id')->with('children')->orderBy('sort');
    }

    public function navigation_item_parent(): BelongsTo
    {
        return $this->belongsTo(NavigationItem::class, 'parent_id')->with('parent');
    }

    public function on_site_link():belongsTo
    {
        return $this->belongsTo(WebLink::class, 'link_target_on_site');
    }
}
