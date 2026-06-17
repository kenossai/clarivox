<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PortfolioProject extends Model implements HasMedia
{
  use SoftDeletes, InteractsWithMedia;

  protected $fillable = [
    'site_id',
    'title',
    'slug',
    'excerpt',
    'description',
    'client',
    'category',
    'completion_date',
    'project_url',
    'status',
    'featured',
    'sort_order',
    'tags',
    'meta_title',
    'meta_description',
  ];

  protected $casts = [
    'completion_date' => 'date',
    'featured' => 'boolean',
    'tags' => 'array',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('featured_image')->singleFile();
    $this->addMediaCollection('gallery');
  }
}
