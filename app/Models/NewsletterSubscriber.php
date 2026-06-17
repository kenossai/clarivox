<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class NewsletterSubscriber extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'site_id',
    'email',
    'name',
    'status',
    'token',
    'verified_at',
    'unsubscribed_at',
  ];

  protected $casts = [
    'verified_at' => 'datetime',
    'unsubscribed_at' => 'datetime',
  ];

  protected static function booted(): void
  {
    static::creating(function (self $subscriber) {
      if (empty($subscriber->token)) {
        $subscriber->token = Str::random(40);
      }
    });
  }

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function isVerified(): bool
  {
    return $this->verified_at !== null;
  }
}
