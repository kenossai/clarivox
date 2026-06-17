<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Services\SeoService;
use Illuminate\View\View;

class CategoryController extends Controller
{
  public function show(string $slug, SeoService $seo): View
  {
    $site = app('current.site');

    $category = Category::where('site_id', $site->id)
      ->where('slug', $slug)
      ->where('status', 'published')
      ->firstOrFail();

    $seo->fromSite($site)
      ->title($category->meta_title ?: $category->name, ' | ', $site->name)
      ->description($category->meta_description ?: $category->description)
      ->canonical(url("/category/{$slug}"));

    $articles = Article::where('site_id', $site->id)
      ->where('category_id', $category->id)
      ->published()
      ->latest('published_at')
      ->with(['author'])
      ->paginate(12);

    return view('news::category', compact('category', 'articles'));
  }
}
