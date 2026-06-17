<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
  use SoftDeletes, InteractsWithMedia;

  protected $fillable = [
    'site_id',
    'title',
    'slug',
    'content',
    'template',
    'status',
    'sort_order',
    'meta_title',
    'meta_description',
    'og_image',
    'hero',
  ];

  protected $casts = [
    'hero' => 'array',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('og_image')->singleFile();
    $this->addMediaCollection('hero_image')->singleFile();
  }

  public function getMetaTitleAttribute($value): string
  {
    return $value ?: $this->title;
  }
}
