<?php

namespace App\Providers;

use App\Services\SeoService;
use App\Services\SiteManager;
use App\Services\ThemeLoader;
use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
  public function register(): void
  {
    // Register ThemeLoader as singleton
    $this->app->singleton(ThemeLoader::class);

    // Register SiteManager as singleton
    $this->app->singleton(SiteManager::class);

    // Register SeoService as a scoped instance (per-request)
    $this->app->scoped(SeoService::class);
  }

  public function boot(): void
  {
    // Register theme view namespaces so we can use creative:: and news:: in routes
    $this->loadViewsFrom(base_path('themes/creative'), 'creative');
    $this->loadViewsFrom(base_path('themes/news'), 'news');

    // Publish CMS config
    $this->publishes([
      __DIR__ . '/../../config/cms.php' => config_path('cms.php'),
    ], 'cms-config');
  }
}
