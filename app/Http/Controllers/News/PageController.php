<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\NewsletterSubscriber;
use App\Services\SeoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
  public function about(SeoService $seo): View
  {
    $site = app('current.site');

    $seo->fromSite($site)
      ->title('About — ' . $site->name)
      ->description('Learn about ' . $site->name . ', our mission, editorial values, and newsroom.')
      ->canonical(url('/about'));

    $authors = Author::where('site_id', $site->id)
      ->where('status', 'active')
      ->orderBy('name')
      ->get();

    $subscriberCount = NewsletterSubscriber::where('site_id', $site->id)->count();
    $articleCount    = Article::where('site_id', $site->id)->published()->count();

    return view('news::about', compact('authors', 'subscriberCount', 'articleCount'));
  }

  public function subscribe(SeoService $seo): View
  {
    $site = app('current.site');

    $seo->fromSite($site)
      ->title('Subscribe — ' . $site->name)
      ->description('Get unlimited access to every story, analysis, and database on ' . $site->name . '.')
      ->canonical(url('/subscribe'));

    $subscriberCount = NewsletterSubscriber::where('site_id', $site->id)->count();

    return view('news::subscribe', compact('subscriberCount'));
  }

  public function subscribeTrial(Request $request): RedirectResponse
  {
    $request->validate([
      'name'  => 'required|string|max:120',
      'email' => 'required|email|max:200',
    ]);

    // Subscribe them to the newsletter if not already subscribed
    $site = app('current.site');
    NewsletterSubscriber::firstOrCreate(
      ['site_id' => $site->id, 'email' => strtolower($request->email)],
      ['name' => $request->name, 'status' => 'active', 'token' => \Str::random(40)]
    );

    return redirect()->route('news.subscribe')->with('trial_success', true);
  }
}
