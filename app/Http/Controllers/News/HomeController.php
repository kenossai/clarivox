<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Services\SeoService;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HomeController extends Controller
{
  public function index(SeoService $seo): View
  {
    $site = app('current.site');

    $seo->fromSite($site)
      ->title($site->name)
      ->description($site->getSetting('meta_description', 'Breaking news and in-depth analysis.'))
      ->canonical(url('/'));

    $featured = Article::where('site_id', $site->id)
      ->published()
      ->featured()
      ->latest('published_at')
      ->take(4)
      ->with(['category', 'author'])
      ->get();

    $latest = Article::where('site_id', $site->id)
      ->published()
      ->latest('published_at')
      ->with(['category', 'author'])
      ->paginate(10);

    $categories = Category::where('site_id', $site->id)
      ->where('status', 'published')
      ->withCount('articles')
      ->orderBy('sort_order')
      ->take(12)
      ->get();

    $trending = Article::where('site_id', $site->id)
      ->published()
      ->orderByDesc('views_count')
      ->take(5)
      ->with(['category'])
      ->get();

    $editorsPicks = Article::where('site_id', $site->id)
      ->published()
      ->featured()
      ->latest('published_at')
      ->skip(4)
      ->take(4)
      ->with(['category', 'tags'])
      ->get();

    return view('news::home', compact('featured', 'latest', 'categories', 'trending', 'editorsPicks'));
  }

  public function sitemap(): Response
  {
    $site = app('current.site');

    $articles = Article::where('site_id', $site->id)
      ->published()
      ->latest('published_at')
      ->take(1000)
      ->get(['slug', 'updated_at']);

    $content = view('news::sitemap', compact('articles', 'site'))->render();

    return response($content, 200, ['Content-Type' => 'application/xml']);
  }
}
