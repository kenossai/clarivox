<?php

namespace Tests\Feature;

use Tests\TestCase;

class GoogleAdSenseTest extends TestCase
{
  public function test_google_adsense_script_renders_when_client_id_is_configured(): void
  {
    config(['services.google_adsense.client_id' => 'ca-pub-1234567890123456']);

    $html = view('components.google-adsense')->render();

    $this->assertStringContainsString('https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1234567890123456', $html);
    $this->assertStringContainsString('crossorigin="anonymous"', $html);
  }

  public function test_google_adsense_script_is_not_rendered_without_client_id(): void
  {
    config(['services.google_adsense.client_id' => null]);

    $html = view('components.google-adsense')->render();

    $this->assertStringNotContainsString('pagead2.googlesyndication.com', $html);
  }

  public function test_adsense_ad_unit_renders_when_client_and_slot_are_configured(): void
  {
    config([
      'services.google_adsense.client_id' => 'ca-pub-1234567890123456',
      'services.google_adsense.article_top_slot' => '9876543210',
    ]);

    $html = view('components.adsense-ad', ['adSlot' => 'article_top_slot'])->render();

    $this->assertStringContainsString('class="adsbygoogle"', $html);
    $this->assertStringContainsString('data-ad-client="ca-pub-1234567890123456"', $html);
    $this->assertStringContainsString('data-ad-slot="9876543210"', $html);
    $this->assertStringContainsString('(adsbygoogle = window.adsbygoogle || []).push({});', $html);
  }

  public function test_adsense_ad_unit_is_not_rendered_without_slot(): void
  {
    config([
      'services.google_adsense.client_id' => 'ca-pub-1234567890123456',
      'services.google_adsense.article_top_slot' => null,
    ]);

    $html = view('components.adsense-ad', ['adSlot' => 'article_top_slot'])->render();

    $this->assertStringNotContainsString('class="adsbygoogle"', $html);
  }
}
