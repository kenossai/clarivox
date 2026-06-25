<?php

namespace App\Http\Controllers\Creative;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use App\Services\SeoService;
use Illuminate\View\View;

class PortfolioController extends Controller
{
  public function index(SeoService $seo): View
  {
    $site = app('current.site');

    $seo->fromSite($site)->title('Portfolio', ' | ', $site->name)->canonical(url('/portfolio'));

    $projects = PortfolioProject::where('site_id', $site->id)
      ->where('status', 'published')
      ->orderBy('sort_order')
      ->paginate(12);

    return view('creative::projects');
  }

  public function show(string $slug, SeoService $seo): View
  {
    $site = app('current.site');

    $project = PortfolioProject::where('site_id', $site->id)
      ->where('slug', $slug)
      ->where('status', 'published')
      ->firstOrFail();

    $seo->fromSite($site)
      ->title($project->meta_title ?: $project->title, ' | ', $site->name)
      ->description($project->meta_description ?: $project->excerpt)
      ->canonical(url("/portfolio/{$slug}"));

    return view('creative::portfolio.show', compact('project'));
  }
}
