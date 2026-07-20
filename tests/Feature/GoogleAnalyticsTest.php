<?php

namespace Tests\Feature;

use Tests\TestCase;

class GoogleAnalyticsTest extends TestCase
{
  public function test_google_analytics_tag_renders_when_measurement_id_is_configured(): void
  {
    config(['services.google_analytics.measurement_id' => 'G-TEST12345']);

    $html = view('components.google-analytics')->render();

    $this->assertStringContainsString('https://www.googletagmanager.com/gtag/js?id=G-TEST12345', $html);
    $this->assertStringContainsString("gtag('config', \"G-TEST12345\");", $html);
  }

  public function test_google_analytics_tag_is_not_rendered_without_measurement_id(): void
  {
    config(['services.google_analytics.measurement_id' => null]);

    $html = view('components.google-analytics')->render();

    $this->assertStringNotContainsString('googletagmanager.com/gtag/js', $html);
    $this->assertStringNotContainsString("gtag('config'", $html);
  }
}
