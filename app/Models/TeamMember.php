<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TeamMember extends Model implements HasMedia
{
  use SoftDeletes, InteractsWithMedia;

  protected $fillable = [
    'site_id',
    'name',
    'position',
    'bio',
    'email',
    'social_links',
    'status',
    'sort_order',
  ];

  protected $casts = [
    'social_links' => 'array',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function registerMediaCollections(): void
  {
    $this->addMediaCollection('photo')->singleFile();
  }
}
