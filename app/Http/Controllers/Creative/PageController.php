<?php

namespace App\Http\Controllers\Creative;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\SeoService;
use Illuminate\View\View;

class PageController extends Controller
{
  public function show(string $slug, SeoService $seo): View
  {
    $site = app('current.site');

    $page = Page::where('site_id', $site->id)
      ->where('slug', $slug)
      ->where('status', 'published')
      ->firstOrFail();

    $seo->fromSite($site)
      ->title($page->meta_title ?: $page->title, ' | ', $site->name)
      ->description($page->meta_description)
      ->canonical(url("/{$slug}"));

    // Use page-specific template or fall back to default
    $template = "creative::pages.{$page->template}";
    if (! view()->exists($template)) {
      $template = 'creative::pages.default';
    }

    return view($template, compact('page'));
  }
}
