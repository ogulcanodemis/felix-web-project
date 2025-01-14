<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\Tag as SpatieTag;

class Tag extends SpatieTag
{
    public function toArray()
    {
        $attributes = $this->attributesToArray();

        $translatables = array_filter($this->getTranslatableAttributes(), function ($key) use ($attributes) {
            return array_key_exists($key, $attributes);
        });

        foreach ($translatables as $field) {
            $attributes[$field] = $this->getTranslation($field, \App::getLocale());
        }

        return array_merge($attributes, $this->relationsToArray());
    }
}
