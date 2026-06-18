<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Site;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $newsSite = Site::where('type', 'news')->first();

        if (! $newsSite) {
            $this->command->error('News site not found.');
            return;
        }

        $author = Author::where('site_id', $newsSite->id)->first();

        $categories = Category::where('site_id', $newsSite->id)->get();

        $tags = Tag::where('site_id', $newsSite->id)->get();

        Article::factory()
            ->count(50)
            ->create([
                'site_id' => $newsSite->id,
                'author_id' => $author?->id,
            ])
            ->each(function ($article) use ($categories, $tags) {

                $article->update([
                    'category_id' => $categories->random()->id,
                ]);

                if ($tags->count()) {
                    $article->tags()->attach(
                        $tags->random(rand(1, min(3, $tags->count())))
                            ->pluck('id')
                            ->toArray()
                    );
                }
            });
    }
}
