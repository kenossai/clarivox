<?php

namespace App\Http\Controllers\Creative;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\Testimonial;
use App\Services\SeoService;
use Illuminate\View\View;

class HomeController extends Controller
{
  public function index(SeoService $seo): View
  {
    $site = app('current.site');

    $seo->fromSite($site)
      ->title($site->name)
      ->description($site->getSetting('meta_description', 'A creative agency crafting digital experiences.'))
      ->canonical(url('/'));

    $services = Service::where('site_id', $site->id)
      ->where('status', 'published')
      ->orderBy('sort_order')
      ->take(6)
      ->get();

    $projects = PortfolioProject::where('site_id', $site->id)
      ->where('status', 'published')
      ->where('featured', true)
      ->orderBy('sort_order')
      ->take(6)
      ->get();

    $testimonials = Testimonial::where('site_id', $site->id)
      ->where('status', 'published')
      ->orderBy('sort_order')
      ->take(3)
      ->get();

    return view('creative::home', compact('services', 'projects', 'testimonials'));
  }
}
