<?php

namespace App\Http\Controllers\Creative;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Services\SeoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

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
    $site = app('current.site');

    $data = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'max:255'],
      'phone' => ['nullable', 'string', 'max:50'],
      'message' => ['required', 'string', 'max:5000'],
      'website' => ['prohibited'],
    ]);
    unset($data['website']);

    $recipient = $site->getSetting('contact_email')
      ?: config('cms.contact_email')
      ?: config('mail.from.address');

    try {
      // Sent synchronously so delivery doesn't depend on a queue worker running
      Mail::to($recipient)->send(new ContactFormMail($site, $data + ['phone' => null]));
    } catch (Throwable $e) {
      // Keep the enquiry in the logs so it isn't lost
      Log::error('Contact form email failed', ['site' => $site->domain, 'submission' => $data, 'error' => $e->getMessage()]);

      return back()->withInput()->withErrors(['message' => 'Sorry, we couldn\'t send your message. Please try again or email us directly.']);
    }

    return back()->with('success', 'Thank you! We\'ll be in touch soon.');
  }
}
