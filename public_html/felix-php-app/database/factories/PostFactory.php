<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Taxonomy;
use App\Models\Tag;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
        $title = [];
        $content = [];
        $description=[];

        foreach ($locales as $localeKey => $fakerLocale) {
            $faker = \Faker\Factory::create($fakerLocale);
            $title[$localeKey] = $faker->sentence();
            $description[$localeKey] = $faker->paragraph(2);
            $content[$localeKey] = $faker->paragraph(20);
        }

        return [
            'type' => 'post',
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'status' => 'published',
            'comment_status' => 'closed',
            'author_id' => 1,
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Post $post) {
            // Attach a random category
            $randomCategory = Taxonomy::where('term_id', 1)->inRandomOrder()->first();
            if ($randomCategory) {
                $post->categories()->attach($randomCategory->id);
            }

            // Attach random tags
            $randomTags = Tag::inRandomOrder()->limit(rand(1, 3))->get(); // 1 ila 5 rastgele etiket
            if ($randomTags->isNotEmpty()) {
                $post->tags()->attach($randomTags->pluck('id')->toArray());
            }

            $locales = config('app.locales', [
                'de' => 'de_DE',
                'en' => 'en_US',
                'fr' => 'fr_FR',
                'tr' => 'tr_TR'
            ]);

            $url = [];

            foreach ($locales as $localeKey => $fakerLocale) {
                $url[$localeKey] = Str::slug($post->getTranslation('title', $localeKey));
            }

            $name = $this->faker->words(3, true);
            $post->web_links()->create([
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
