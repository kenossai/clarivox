<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Service;
use App\Models\Site;
use App\Models\Tag;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Roles ────────────────────────────────────────────────────────
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin']);
        Role::firstOrCreate(['name' => 'editor']);
        Role::firstOrCreate(['name' => 'author']);

        // ── Admin User ───────────────────────────────────────────────────
        $admin = User::firstOrCreate(
            ['email' => 'admin@clarivox.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password'), 'email_verified_at' => now()]
        );
        $admin->assignRole($superAdmin);

        // ── Sites ─────────────────────────────────────────────────────────
        $creativeSite = Site::firstOrCreate(
            ['domain' => 'clarivoxcreatives.com'],
            [
                'name' => 'Clarivox Creatives',
                'type' => 'creative',
                'theme' => 'creative',
                'status' => 'active',
                'settings' => ['tagline' => 'We craft digital experiences that inspire.', 'meta_description' => 'A digital creative agency.'],
            ]
        );

        $newsSite = Site::firstOrCreate(
            ['domain' => 'clarivoxnews.com'],
            [
                'name' => 'Clarivox News',
                'type' => 'news',
                'theme' => 'news',
                'status' => 'active',
                'settings' => ['tagline' => 'Breaking News & Analysis', 'meta_description' => 'Latest news and in-depth reporting.'],
            ]
        );

        // ── Creative Content ──────────────────────────────────────────────

        Page::firstOrCreate(['slug' => 'about'], [
            'site_id' => $creativeSite->id,
            'title' => 'About Us',
            'content' => '<h2>Who We Are</h2><p>Clarivox Creatives is a digital creative agency.</p>',
            'template' => 'about',
            'status' => 'published',
        ]);

        foreach (
            [
                ['title' => 'Brand Identity', 'slug' => 'brand-identity', 'excerpt' => 'We craft distinctive brand identities.', 'icon' => '🎨'],
                ['title' => 'Web Design', 'slug' => 'web-design', 'excerpt' => 'Beautiful, conversion-focused websites.', 'icon' => '💻'],
                ['title' => 'Digital Marketing', 'slug' => 'digital-marketing', 'excerpt' => 'Data-driven campaigns.', 'icon' => '📈'],
            ] as $i => $s
        ) {
            Service::firstOrCreate(['slug' => $s['slug']], array_merge($s, ['site_id' => $creativeSite->id, 'status' => 'published', 'sort_order' => $i]));
        }

        foreach (
            [
                ['name' => 'Alex Johnson', 'position' => 'Creative Director', 'bio' => 'Alex brings 12 years of creative direction.'],
                ['name' => 'Maria Chen', 'position' => 'Lead Designer', 'bio' => 'Maria turns complex ideas into clean design.'],
            ] as $i => $t
        ) {
            TeamMember::firstOrCreate(['name' => $t['name']], array_merge($t, ['site_id' => $creativeSite->id, 'status' => 'published', 'sort_order' => $i]));
        }

        foreach (
            [
                ['author_name' => 'Sarah K.', 'author_company' => 'TechStart Inc.', 'content' => 'Clarivox transformed our brand. Conversion rate doubled.', 'rating' => 5],
                ['author_name' => 'Mark D.', 'author_company' => 'GreenLeaf Ltd.', 'content' => 'Exceptional creativity and professionalism.', 'rating' => 5],
            ] as $i => $t
        ) {
            Testimonial::firstOrCreate(['author_name' => $t['author_name']], array_merge($t, ['site_id' => $creativeSite->id, 'status' => 'published', 'sort_order' => $i]));
        }

        foreach (
            [
                ['question' => 'How long does a project take?', 'answer' => 'Branding projects take 4–6 weeks. Web design 6–12 weeks.'],
                ['question' => 'Do you work with startups?', 'answer' => 'Absolutely! We love working with early-stage companies.'],
            ] as $i => $f
        ) {
            Faq::firstOrCreate(['question' => $f['question']], array_merge($f, ['site_id' => $creativeSite->id, 'status' => 'published', 'sort_order' => $i]));
        }

        // ── News Content ───────────────────────────────────────────────────

        $catModels = [];
        foreach (['Technology', 'Business', 'Politics', 'Sports', 'Entertainment'] as $i => $name) {
            $catModels[$name] = Category::firstOrCreate(
                ['slug' => \Str::slug($name), 'site_id' => $newsSite->id],
                ['site_id' => $newsSite->id, 'name' => $name, 'status' => 'published', 'sort_order' => $i]
            );
        }

        $tagModels = [];
        foreach (['AI', 'Startups', 'Climate', 'Economy', 'Health', 'Innovation'] as $name) {
            $tagModels[$name] = Tag::firstOrCreate(
                ['slug' => \Str::slug($name), 'site_id' => $newsSite->id],
                ['site_id' => $newsSite->id, 'name' => $name]
            );
        }

        $newsAuthor = Author::firstOrCreate(
            ['slug' => 'editorial-team', 'site_id' => $newsSite->id],
            ['site_id' => $newsSite->id, 'name' => 'Editorial Team', 'bio' => 'The Clarivox News editorial team.', 'email' => 'editorial@clarivoxnews.com', 'status' => 'active']
        );

        foreach (
            [
                ['title' => 'The Rise of AI-Powered Creative Tools', 'category' => 'Technology', 'tags' => ['AI', 'Innovation'], 'excerpt' => 'AI is revolutionizing how creative professionals work.'],
                ['title' => 'Global Markets Steady Amid Economic Uncertainty', 'category' => 'Business', 'tags' => ['Economy'], 'excerpt' => 'Investors remain cautiously optimistic as rate hikes pause.'],
                ['title' => 'Climate Summit Reaches Historic Agreement', 'category' => 'Politics', 'tags' => ['Climate'], 'excerpt' => '197 nations sign landmark accord pledging halved emissions by 2035.'],
            ] as $data
        ) {
            $article = Article::firstOrCreate(
                ['slug' => \Str::slug($data['title'])],
                [
                    'site_id' => $newsSite->id,
                    'category_id' => $catModels[$data['category']]->id,
                    'author_id' => $newsAuthor->id,
                    'title' => $data['title'],
                    'excerpt' => $data['excerpt'],
                    'content' => '<p>' . $data['excerpt'] . '</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>',
                    'status' => 'published',
                    'featured' => true,
                    'allow_comments' => true,
                    'published_at' => now()->subDays(rand(1, 30)),
                ]
            );
            foreach ($data['tags'] as $tagName) {
                if (isset($tagModels[$tagName])) {
                    $article->tags()->syncWithoutDetaching([$tagModels[$tagName]->id]);
                }
            }
        }

        $this->command->info('✅ Seeded! Login: admin@clarivox.com / password');
    }
}
