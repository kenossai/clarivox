<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
  public function subscribe(Request $request): RedirectResponse
  {
    $site = app('current.site');

    $request->validate([
      'email' => ['required', 'email', 'max:255'],
      'name' => ['nullable', 'string', 'max:255'],
    ]);

    NewsletterSubscriber::firstOrCreate(
      ['email' => $request->email, 'site_id' => $site->id],
      ['name' => $request->name, 'status' => 'active']
    );

    return back()->with('success', 'You have been subscribed!');
  }

  public function unsubscribe(string $token): RedirectResponse
  {
    $subscriber = NewsletterSubscriber::where('token', $token)->firstOrFail();

    $subscriber->update([
      'status' => 'unsubscribed',
      'unsubscribed_at' => now(),
    ]);

    return redirect('/')->with('success', 'You have been unsubscribed.');
  }
}
