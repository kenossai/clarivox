<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
  use SoftDeletes, InteractsWithMedia;

  protected $fillable = [
    'site_id',
    'parent_id',
    'name',
    'slug',
    'description',
    'status',
    'sort_order',
    'meta_title',
    'meta_description',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function parent(): BelongsTo
  {
    return $this->belongsTo(Category::class, 'parent_id');
  }

  public function children(): HasMany
  {
    return $this->hasMany(Category::class, 'parent_id');
  }

  public function articles(): HasMany
  {
    return $this->hasMany(Article::class);
  }

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('thumbnail')->singleFile();
  }
}
