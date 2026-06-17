<?php

namespace App\Http\Controllers\Creative;

use App\Http\Controllers\Controller;
use App\Services\SeoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
  public function show(SeoService $seo): View
  {
    $site = app('current.site');

    $seo->fromSite($site)->title('Contact Us', ' | ', $site->name)->canonical(url('/contact'));

    return view('creative::contact', compact('site'));
  }

  public function submit(Request $request): RedirectResponse
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'max:255'],
      'message' => ['required', 'string', 'max:5000'],
    ]);

    // TODO: Queue a contact notification
    // Mail::to(config('cms.contact_email'))->send(new ContactFormMail($request->only('name','email','message')));

    return back()->with('success', 'Thank you! We\'ll be in touch soon.');
  }
}
