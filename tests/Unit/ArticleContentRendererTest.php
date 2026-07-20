<?php

namespace Tests\Unit;

use App\Support\ArticleContentRenderer;
use PHPUnit\Framework\TestCase;

class ArticleContentRendererTest extends TestCase
{
  public function test_it_converts_standalone_x_post_urls_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>https://x.com/funebiprogress/status/1814400000000000000?s=46</p>');

    $this->assertStringContainsString('<blockquote class="twitter-tweet social-embed" data-dnt="true">', $html);
    $this->assertStringContainsString('<a href="https://twitter.com/funebiprogress/status/1814400000000000000">https://twitter.com/funebiprogress/status/1814400000000000000</a>', $html);
  }

  public function test_it_converts_standalone_rich_editor_links_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p><a href="https://twitter.com/funebiprogress/statuses/1814400000000000000">https://twitter.com/funebiprogress/statuses/1814400000000000000</a></p>');

    $this->assertStringContainsString('<blockquote class="twitter-tweet social-embed" data-dnt="true">', $html);
    $this->assertStringContainsString('<a href="https://twitter.com/funebiprogress/status/1814400000000000000">https://twitter.com/funebiprogress/status/1814400000000000000</a>', $html);
  }

  public function test_it_converts_youtube_links_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>https://www.youtube.com/watch?v=dQw4w9WgXcQ</p>');

    $this->assertStringContainsString('class="social-embed social-embed--iframe"', $html);
    $this->assertStringContainsString('src="https://www.youtube-nocookie.com/embed/dQw4w9WgXcQ"', $html);
  }

  public function test_it_converts_vimeo_links_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>https://vimeo.com/123456789</p>');

    $this->assertStringContainsString('src="https://player.vimeo.com/video/123456789"', $html);
  }

  public function test_it_converts_instagram_links_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>https://www.instagram.com/reel/C7exampleId/?igsh=abc</p>');

    $this->assertStringContainsString('class="instagram-media social-embed"', $html);
    $this->assertStringContainsString('data-instgrm-permalink="https://www.instagram.com/reel/C7exampleId/"', $html);
  }

  public function test_it_converts_tiktok_links_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>https://www.tiktok.com/@example/video/7350000000000000000?lang=en</p>');

    $this->assertStringContainsString('class="tiktok-embed social-embed"', $html);
    $this->assertStringContainsString('data-video-id="7350000000000000000"', $html);
  }

  public function test_it_converts_facebook_post_links_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>https://www.facebook.com/example/posts/1234567890</p>');

    $this->assertStringContainsString('facebook.com/plugins/post.php?href=', $html);
    $this->assertStringContainsString('title="Facebook post"', $html);
  }

  public function test_it_converts_threads_links_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>https://www.threads.net/@example/post/C7exampleId?xmt=AQGz</p>');

    $this->assertStringContainsString('class="threads-post social-embed"', $html);
    $this->assertStringContainsString('data-text-post-permalink="https://www.threads.net/@example/post/C7exampleId"', $html);
  }

  public function test_it_converts_linkedin_activity_links_to_embeds(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>https://www.linkedin.com/feed/update/urn:li:activity:7350000000000000000/</p>');

    $this->assertStringContainsString('src="https://www.linkedin.com/embed/feed/update/urn:li:activity:7350000000000000000"', $html);
  }

  public function test_it_keeps_inline_x_links_as_normal_article_links(): void
  {
    $html = (new ArticleContentRenderer())->render('<p>See this <a href="https://x.com/funebiprogress/status/1814400000000000000">post</a> for more.</p>');

    $this->assertStringNotContainsString('twitter-tweet', $html);
    $this->assertStringContainsString('See this <a href="https://x.com/funebiprogress/status/1814400000000000000">post</a> for more.', $html);
  }
}
