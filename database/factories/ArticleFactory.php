<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = fake()->unique()->sentence(rand(5, 10));

        return [
            'site_id' => Site::inRandomOrder()->first()?->id,
            'category_id' => Category::inRandomOrder()->first()?->id,
            'author_id' => User::inRandomOrder()->first()?->id,

            'title' => $title,
            'slug' => Str::slug($title),

            'excerpt' => fake()->paragraph(),

            'content' => collect(range(1, rand(6, 15)))
                ->map(fn() => '<p>' . fake()->paragraph(rand(4, 8)) . '</p>')
                ->implode(''),

            'featured_image' => fake()->imageUrl(1200, 675, 'news'),

            'status' => fake()->randomElement([
                'draft',
                'published',
                'scheduled',
            ]),

            'featured' => fake()->boolean(20),
            'allow_comments' => fake()->boolean(90),

            'views_count' => fake()->numberBetween(0, 25000),

            'published_at' => fake()->dateTimeBetween('-12 months', 'now'),

            'meta_title' => fake()->sentence(8),

            'meta_description' => fake()->paragraph(),

            'og_image' => fake()->imageUrl(1200, 630, 'news'),
        ];
    }
}
