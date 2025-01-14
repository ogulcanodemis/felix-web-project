<?php

namespace App\Traits;

use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait HasSettingsTranslations
{
    use BaseHasTranslations;

    public function toArray(): array
    {
        $attributes = get_object_vars($this);

        $translatables = [];
        foreach ($this->getTranslatableAttributes() as $key) {
            if (array_key_exists($key, $attributes)) {
                $translatables[$key] = $this->getTranslation($key, app()->getLocale());
            }
        }

        return array_merge($attributes, $translatables);
    }

    protected function getTranslatableAttributes(): array
    {
        return property_exists($this, 'translatable') ? $this->translatable : [];
    }
}
