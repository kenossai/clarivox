<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Services\SeoService;
use Illuminate\View\View;

class AuthorController extends Controller
{
  public function show(string $slug, SeoService $seo): View
  {
    $site = app('current.site');

    $author = Author::where('site_id', $site->id)
      ->where('slug', $slug)
      ->where('status', 'active')
      ->firstOrFail();

    $seo->fromSite($site)
      ->title($author->name, ' | ', $site->name)
      ->description($author->bio)
      ->canonical(url("/author/{$slug}"));

    $articles = Article::where('site_id', $site->id)
      ->where('author_id', $author->id)
      ->published()
      ->latest('published_at')
      ->paginate(12);

    return view('news::author', compact('author', 'articles'));
  }
}
