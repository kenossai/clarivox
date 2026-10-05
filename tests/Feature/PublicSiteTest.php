<?php

namespace Tests\Feature;

use App\Mail\ContactFormMail;
use App\Models\Article;
use App\Models\NewsletterSubscriber;
use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PublicSiteTest extends TestCase
{
  use RefreshDatabase;

  private function newsSite(): Site
  {
    return Site::create(['name' => 'Clarivox News', 'domain' => 'clarivoxnews.com', 'type' => 'news', 'theme' => 'news']);
  }

  private function creativeSite(): Site
  {
    return Site::create(['name' => 'Clarivox Creatives', 'domain' => 'clarivoxcreatives.com', 'type' => 'creative', 'theme' => 'creative']);
  }

  public function test_sitemap_is_valid_xml(): void
  {
    $site = $this->newsSite();
    Article::factory()->create(['site_id' => $site->id, 'status' => 'published', 'published_at' => now()->subDay()]);

    $response = $this->get('http://clarivoxnews.com/sitemap.xml');

    $response->assertOk();
    $xml = simplexml_load_string($response->getContent());
    $this->assertNotFalse($xml);
    $this->assertCount(2, $xml->url);
  }

  public function test_contact_form_sends_email(): void
  {
    Mail::fake();
    $this->creativeSite();
    config(['cms.contact_email' => 'team@clarivox.test']);

    $this->post('http://clarivoxcreatives.com/contact', [
      'name' => 'Ada',
      'email' => 'ada@example.com',
      'phone' => '0800',
      'message' => 'Hello there',
    ])->assertSessionHas('success');

    Mail::assertSent(ContactFormMail::class, fn(ContactFormMail $mail) => $mail->hasTo('team@clarivox.test')
      && $mail->hasReplyTo('ada@example.com')
      && $mail->data['message'] === 'Hello there');
  }

  public function test_contact_page_renders_working_form(): void
  {
    $this->creativeSite();

    $this->get('http://clarivoxcreatives.com/contact')
      ->assertOk()
      ->assertSee('action="http://clarivoxcreatives.com/contact"', false)
      ->assertSee('name="website"', false);
  }

  public function test_honeypot_rejects_bot_submissions(): void
  {
    Mail::fake();
    $this->newsSite();

    $this->post('http://clarivoxnews.com/newsletter/subscribe', [
      'email' => 'bot@example.com',
      'website' => 'http://spam.example',
    ])->assertSessionHasErrors('website');

    $this->assertSame(0, NewsletterSubscriber::count());
  }

  public function test_public_forms_are_rate_limited(): void
  {
    $this->newsSite();

    for ($i = 0; $i < 5; $i++) {
      $this->post('http://clarivoxnews.com/newsletter/subscribe', ['email' => "user{$i}@example.com"])->assertRedirect();
    }

    $this->post('http://clarivoxnews.com/newsletter/subscribe', ['email' => 'user6@example.com'])->assertStatus(429);
  }

  public function test_unknown_or_inactive_site_returns_404(): void
  {
    Site::create(['name' => 'Clarivox News', 'domain' => 'clarivoxnews.com', 'type' => 'news', 'theme' => 'news', 'status' => 'inactive']);

    $this->get('http://clarivoxnews.com/search')->assertNotFound();
  }

  public function test_site_resolves_from_a_serializing_cache_store(): void
  {
    // Production stores serialize values and refuse to unserialize objects
    config(['cache.default' => 'file', 'cache.stores.file.path' => storage_path('framework/testing/cache')]);
    \Illuminate\Support\Facades\Cache::flush();
    $this->newsSite();

    $this->get('http://clarivoxnews.com/sitemap.xml')->assertOk();
    $this->get('http://clarivoxnews.com/sitemap.xml')->assertOk();

    \Illuminate\Support\Facades\Cache::flush();
  }

  public function test_site_cache_is_cleared_when_site_changes(): void
  {
    $site = $this->newsSite();
    $this->get('http://clarivoxnews.com/sitemap.xml')->assertOk();

    $site->update(['status' => 'maintenance']);

    $this->get('http://clarivoxnews.com/sitemap.xml')->assertStatus(503);
  }
}
