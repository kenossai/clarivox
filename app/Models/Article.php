<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
  use SoftDeletes, InteractsWithMedia, LogsActivity, HasFactory;

  protected $fillable = [
    'site_id',
    'category_id',
    'author_id',
    'title',
    'slug',
    'excerpt',
    'content',
    'featured_image',
    'status',
    'featured',
    'allow_comments',
    'views_count',
    'published_at',
    'meta_title',
    'meta_description',
    'og_image',
  ];

  protected $casts = [
    'featured' => 'boolean',
    'allow_comments' => 'boolean',
    'published_at' => 'datetime',
    'views_count' => 'integer',
  ];

  public function getActivitylogOptions(): LogOptions
  {
    return LogOptions::defaults()->logFillable();
  }

  protected static function booted(): void
  {
    static::saving(function (Article $article) {
      if ($article->status === 'published' && empty($article->published_at)) {
        $article->published_at = now();
      }
    });
  }

  // ─── Relationships ────────────────────────────────────────────────

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function author(): BelongsTo
  {
    return $this->belongsTo(Author::class);
  }

  public function tags(): BelongsToMany
  {
    return $this->belongsToMany(Tag::class, 'article_tag');
  }

  public function comments(): HasMany
  {
    return $this->hasMany(Comment::class);
  }

  public function approvedComments(): HasMany
  {
    return $this->hasMany(Comment::class)->where('status', 'approved');
  }

  // ─── Media ────────────────────────────────────────────────────────

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('featured_image')->singleFile();
    $this->addMediaCollection('og_image')->singleFile();
    $this->addMediaCollection('content_images');
  }

  /**
   * Returns the featured image URL, falling back to the direct column
   * when no Spatie Media Library entry exists (e.g. uploaded via Filament FileUpload).
   */
  public function getFeaturedImageUrlAttribute(): ?string
  {
    $mediaUrl = $this->getFirstMediaUrl('featured_image');
    if ($mediaUrl) {
      return $mediaUrl;
    }

    if ($this->featured_image) {
      return asset('storage/' . $this->featured_image);
    }

    return null;
  }

  // ─── Scopes ───────────────────────────────────────────────────────

  public function scopePublished($query)
  {
    return $query->where('status', 'published')
      ->where('published_at', '<=', now());
  }

  public function scopeFeatured($query)
  {
    return $query->where('featured', true);
  }

  // ─── Helpers ──────────────────────────────────────────────────────

  public function incrementViews(): void
  {
    $this->increment('views_count');
  }

  public function getMetaTitleAttribute($value): string
  {
    return $value ?: $this->title;
  }
}
