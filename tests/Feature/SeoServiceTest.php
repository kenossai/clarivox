<?php

namespace Tests\Feature;

use App\Services\SeoService;
use Tests\TestCase;

class SeoServiceTest extends TestCase
{
    public function test_image_outputs_open_graph_and_twitter_preview_tags(): void
    {
        $html = app(SeoService::class)
            ->image('https://clarivoxnews.com/storage/articles/example.jpg')
            ->render();

        $this->assertStringContainsString('<meta property="og:image" content="https://clarivoxnews.com/storage/articles/example.jpg">', $html);
        $this->assertStringContainsString('<meta property="og:image:secure_url" content="https://clarivoxnews.com/storage/articles/example.jpg">', $html);
        $this->assertStringContainsString('<meta property="og:image:width" content="1200">', $html);
        $this->assertStringContainsString('<meta property="og:image:height" content="630">', $html);
        $this->assertStringContainsString('<meta name="twitter:image" content="https://clarivoxnews.com/storage/articles/example.jpg">', $html);
    }
}
