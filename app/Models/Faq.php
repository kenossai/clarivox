<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faq extends Model
{
  use SoftDeletes;

  protected $table = 'faqs';

  protected $fillable = [
    'site_id',
    'question',
    'answer',
    'category',
    'status',
    'sort_order',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }
}
