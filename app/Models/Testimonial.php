<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Testimonial extends Model implements HasMedia
{
  use SoftDeletes, InteractsWithMedia;

  protected $fillable = [
    'site_id',
    'author_name',
    'author_title',
    'author_company',
    'content',
    'rating',
    'status',
    'sort_order',
  ];

  protected $casts = [
    'rating' => 'integer',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('avatar')->singleFile();
  }
}
