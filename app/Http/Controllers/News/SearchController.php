<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\SeoService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
  public function index(Request $request, SeoService $seo): View
  {
    $site = app('current.site');
    $query = $request->get('q', '');

    $seo->fromSite($site)
      ->title("Search: {$query}", ' | ', $site->name)
      ->canonical(url("/search?q=" . urlencode($query)));

    $articles = collect();
    if (strlen($query) >= 2) {
      $articles = Article::where('site_id', $site->id)
        ->published()
        ->where(function ($q) use ($query) {
          $q->where('title', 'like', "%{$query}%")
            ->orWhere('excerpt', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%");
        })
        ->latest('published_at')
        ->with(['category', 'author'])
        ->paginate(12)
        ->appends(['q' => $query]);
    }

    return view('news::search', compact('articles', 'query'));
  }
}
