<?php

namespace App\Http\Controllers\Creative;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\SeoService;
use Illuminate\View\View;

class ServiceController extends Controller
{
  public function index(SeoService $seo): View
  {
    $site = app('current.site');

    $seo->fromSite($site)->title('Services', ' | ', $site->name)->canonical(url('/services'));

    $services = Service::where('site_id', $site->id)
      ->where('status', 'published')
      ->orderBy('sort_order')
      ->get();

    return view('creative::services.index', compact('services'));
  }

  public function show(string $slug, SeoService $seo): View
  {
    $site = app('current.site');

    $service = Service::where('site_id', $site->id)
      ->where('slug', $slug)
      ->where('status', 'published')
      ->firstOrFail();

    $seo->fromSite($site)
      ->title($service->meta_title ?: $service->title, ' | ', $site->name)
      ->description($service->meta_description ?: $service->excerpt)
      ->canonical(url("/services/{$slug}"));

    return view('creative::services.show', compact('service'));
  }
}
