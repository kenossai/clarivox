<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
  protected $fillable = [
    'site_id',
    'name',
    'slug',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function articles(): BelongsToMany
  {
    return $this->belongsToMany(Article::class, 'article_tag');
  }
}
