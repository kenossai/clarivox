<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
  protected $fillable = [
    'site_id',
    'group',
    'key',
    'value',
    'type',
  ];

  public function site(): BelongsTo
  {
    return $this->belongsTo(Site::class);
  }

  public function getValueAttribute($value): mixed
  {
    return match ($this->type) {
      'boolean' => (bool) $value,
      'integer' => (int) $value,
      'json' => json_decode($value, true),
      default => $value,
    };
  }
}
