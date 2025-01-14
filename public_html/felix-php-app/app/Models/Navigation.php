<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Navigation extends Model
{
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

    protected $fillable = [
        'call_name',
        'name',
        'system'
    ];

    public function navigation_items():HasMany
    {
        return $this->hasMany(NavigationItem::class)->whereNull('parent_id')->with('children')->orderBy('sort');
    }
}
