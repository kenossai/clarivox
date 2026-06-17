<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Services\SeoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
  public function show(string $slug, SeoService $seo): View
  {
    $site = app('current.site');

    $article = Article::where('site_id', $site->id)
      ->where('slug', $slug)
      ->published()
      ->with(['category', 'author', 'tags', 'approvedComments.replies'])
      ->firstOrFail();

    $article->incrementViews();

    $seo->fromSite($site)
      ->title($article->meta_title, ' | ', $site->name)
      ->description($article->meta_description ?: $article->excerpt)
      ->canonical(url("/article/{$slug}"))
      ->article([
        'published_time' => $article->published_at?->toIso8601String(),
        'author' => $article->author?->name,
      ])
      ->twitterCard('summary_large_image');

    if ($article->getFirstMediaUrl('og_image')) {
      $seo->image($article->getFirstMediaUrl('og_image'));
    }

    $related = Article::where('site_id', $site->id)
      ->where('category_id', $article->category_id)
      ->where('id', '!=', $article->id)
      ->published()
      ->latest('published_at')
      ->take(4)
      ->get();

    return view('news::article', compact('article', 'related'));
  }

  public function comment(Request $request, string $slug): RedirectResponse
  {
    $site = app('current.site');

    $article = Article::where('site_id', $site->id)
      ->where('slug', $slug)
      ->published()
      ->where('allow_comments', true)
      ->firstOrFail();

    $request->validate([
      'author_name' => ['required', 'string', 'max:255'],
      'author_email' => ['required', 'email', 'max:255'],
      'content' => ['required', 'string', 'max:3000'],
      'parent_id' => ['nullable', 'integer', 'exists:comments,id'],
    ]);

    Comment::create([
      'article_id' => $article->id,
      'parent_id' => $request->parent_id,
      'author_name' => $request->author_name,
      'author_email' => $request->author_email,
      'content' => $request->content,
      'status' => 'pending',
      'ip_address' => $request->ip(),
    ]);

    return back()->with('success', 'Your comment is awaiting moderation.');
  }
}
