<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
  protected $fillable = [
    'name',
    'domain',
    'type',
    'theme',
    'status',
    'logo',
    'favicon',
    'settings',
  ];

  protected $casts = [
    'settings' => 'array',
  ];

  // ─── Relationships ────────────────────────────────────────────────

  public function pages(): HasMany
  {
    return $this->hasMany(Page::class);
  }

  public function services(): HasMany
  {
    return $this->hasMany(Service::class);
  }

  public function portfolioProjects(): HasMany
  {
    return $this->hasMany(PortfolioProject::class);
  }

  public function testimonials(): HasMany
  {
    return $this->hasMany(Testimonial::class);
  }

  public function teamMembers(): HasMany
  {
    return $this->hasMany(TeamMember::class);
  }

  public function faqs(): HasMany
  {
    return $this->hasMany(Faq::class);
  }

  public function categories(): HasMany
  {
    return $this->hasMany(Category::class);
  }

  public function tags(): HasMany
  {
    return $this->hasMany(Tag::class);
  }

  public function authors(): HasMany
  {
    return $this->hasMany(Author::class);
  }

  public function articles(): HasMany
  {
    return $this->hasMany(Article::class);
  }

  public function newsletterSubscribers(): HasMany
  {
    return $this->hasMany(NewsletterSubscriber::class);
  }

  public function settings(): HasMany
  {
    return $this->hasMany(Setting::class);
  }

  // ─── Helpers ──────────────────────────────────────────────────────

  public function getSetting(string $key, mixed $default = null): mixed
  {
    $setting = $this->settings()->where('key', $key)->first();

    return $setting ? $setting->value : $default;
  }

  public function isActive(): bool
  {
    return $this->status === 'active';
  }

  public function isCreative(): bool
  {
    return $this->type === 'creative';
  }

  public function isNews(): bool
  {
    return $this->type === 'news';
  }
}
