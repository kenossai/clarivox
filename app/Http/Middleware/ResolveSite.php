<?php

namespace App\Http\Middleware;

use App\Models\Site;
use App\Services\SiteManager;
use App\Services\ThemeLoader;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ResolveSite
{
  public function __construct(
    private readonly ThemeLoader $themeLoader,
    private readonly SiteManager $siteManager,
  ) {}

  public function handle(Request $request, Closure $next): Response
  {
    // Strip www prefix for consistent matching
    $domain = preg_replace('/^www\./', '', $request->getHost());

    $site = $this->siteManager->findByDomain($domain);

    if ($site?->status === 'inactive') {
      $site = null;
    }

    if (! $site && app()->environment('local')) {
      // Fall back to first active site in local dev (localhost)
      $site = Site::where('status', 'active')->first();
    }

    abort_unless($site, 404);

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

    return $next($request);
  }
}
