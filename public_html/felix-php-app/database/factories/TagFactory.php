<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $locales = config('app.locales', [
            'de' => 'de_DE',
            'en' => 'en_US',
            'fr' => 'fr_FR',
            'tr' => 'tr_TR'
        ]);
        $name = [];
        $slug = [];

        foreach ($locales as $localeKey => $fakerLocale) {
            $faker = \Faker\Factory::create($fakerLocale);
            $name[$localeKey] = $faker->word;
            $slug[$localeKey] = $faker->slug;
        }

        return [
            'name' => $name, // JSON verisi olarak
            'slug' => $slug, // JSON verisi olarak
        ];
    }
}
