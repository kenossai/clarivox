<?php

namespace App\Http\Middleware;

use App\Models\Site;
use App\Services\ThemeLoader;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ResolveSite
{
  public function __construct(private readonly ThemeLoader $themeLoader) {}

  public function handle(Request $request, Closure $next): Response
  {
    $host = $request->getHost();

    // Strip www prefix for consistent matching
    $domain = preg_replace('/^www\./', '', $host);

    $site = Site::where('domain', $domain)
      ->where('status', '!=', 'inactive')
      ->first();

    if (! $site) {
      // Fall back to first active site (useful in local dev with localhost)
      $site = Site::where('status', 'active')->first();
    }

    if ($site) {
      // Bind current site into the service container
      app()->instance('current.site', $site);

      // Share site with all views
      View::share('currentSite', $site);

      // Activate the theme for this site
      $this->themeLoader->activate($site->theme);

      // Handle maintenance mode per-site
      if ($site->status === 'maintenance') {
        return response()->view('errors.maintenance', ['site' => $site], 503);
      }
    }

    return $next($request);
  }
}
