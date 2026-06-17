<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Author extends Model implements HasMedia
{
  use SoftDeletes, InteractsWithMedia;

  protected $fillable = [
    'site_id',
    'user_id',
    'name',
    'slug',
    'bio',
    'email',
    'social_links',
    'status',
  ];

  protected $casts = [
    'social_links' => 'array',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function articles(): HasMany
  {
    return $this->hasMany(Article::class);
  }

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('avatar')->singleFile();
  }
}
