<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Support\Facades\Cache;

class SiteManager
{
  private const CACHE_PREFIX = 'site:domain:v2:';

  private const CACHE_TTL = 300; // 5 minutes

  public function findByDomain(string $domain): ?Site
  {
    // Cache raw attributes, not the model: the cache refuses to unserialize objects
    $attributes = Cache::remember(
      self::CACHE_PREFIX . $domain,
      self::CACHE_TTL,
      fn() => Site::where('domain', $domain)->first()?->getAttributes()
    );

    return is_array($attributes) ? (new Site)->newFromBuilder($attributes) : null;
  }

  public function current(): ?Site
  {
    return app()->bound('current.site') ? app('current.site') : null;
  }

  public function forgetDomainCache(string $domain): void
  {
    Cache::forget(self::CACHE_PREFIX . $domain);
  }

  public function allThemes(): array
  {
    return app(ThemeLoader::class)->all();
  }
}
