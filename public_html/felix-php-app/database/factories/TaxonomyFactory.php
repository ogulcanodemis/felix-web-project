<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Taxonomy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taxonomy>
 */
class TaxonomyFactory extends Factory
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
        $description = [];


        foreach ($locales as $localeKey => $fakerLocale) {
            $faker = \Faker\Factory::create($fakerLocale);
            $name[$localeKey] = $faker->word;
            $description[$localeKey] = $faker->optional()->paragraph;
        }

        return [
            'term_id' => 1,
            'name' => $name,
            'description' => $description,
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Taxonomy $taxonomy) {

            $locales = config('app.locales', [
                'de' => 'de_DE',
                'en' => 'en_US',
                'fr' => 'fr_FR',
                'tr' => 'tr_TR'
            ]);

            $localeCategoryTranslations = [
                'de' => 'kategorie',
                'en' => 'category',
                'fr' => 'catégorie',
                'tr' => 'kategori'
            ];

            $url = [];

            foreach ($locales as $localeKey => $fakerLocale) {
                $url[$localeKey] = Str::slug($localeCategoryTranslations[$localeKey]) . '/' . Str::slug($taxonomy->getTranslation('name', $localeKey));
            }

            $name = $this->faker->words(3, true);
            $taxonomy->web_links()->create([
                'url' => $url,
                'name' => $name,
                'rating' => -1,
                'target' => '_self',
                'visible' => 'visible',
                'type'=> 'base'
            ]);
        });
    }
}
