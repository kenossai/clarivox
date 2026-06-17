<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use App\Services\SeoService;
use Illuminate\View\View;

class TagController extends Controller
{
  public function show(string $slug, SeoService $seo): View
  {
    $site = app('current.site');

    $tag = Tag::where('site_id', $site->id)
      ->where('slug', $slug)
      ->firstOrFail();

    $seo->fromSite($site)
      ->title("#{$tag->name}", ' | ', $site->name)
      ->canonical(url("/tag/{$slug}"));

    $articles = $tag->articles()
      ->where('site_id', $site->id)
      ->published()
      ->latest('published_at')
      ->with(['category', 'author'])
      ->paginate(12);

    return view('news::tag', compact('tag', 'articles'));
  }
}
