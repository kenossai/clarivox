<?php

namespace App\Services;

use App\Models\Site;
use Illuminate\Support\Facades\Cache;

class SiteManager
{
  private const CACHE_PREFIX = 'site:domain:';

  private const CACHE_TTL = 300; // 5 minutes

  public function findByDomain(string $domain): ?Site
  {
    return Cache::remember(
      self::CACHE_PREFIX . $domain,
      self::CACHE_TTL,
      fn() => Site::where('domain', $domain)->first()
    );
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
