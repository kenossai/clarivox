<?php

namespace App\Filament\Resources\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait AuthorizesResourcePermissions
{
  public static function canAccess(): bool
  {
    return static::allowsResourceAction('view_any');
  }

  public static function canViewAny(): bool
  {
    return static::allowsResourceAction('view_any');
  }

  public static function canView(Model $record): bool
  {
    return static::allowsResourceAction('view');
  }

  public static function canCreate(): bool
  {
    return static::allowsResourceAction('create');
  }

  public static function canEdit(Model $record): bool
  {
    return static::allowsResourceAction('update');
  }

  public static function canDelete(Model $record): bool
  {
    return static::allowsResourceAction('delete');
  }

  public static function canDeleteAny(): bool
  {
    return static::allowsResourceAction('delete_any');
  }

  public static function canForceDelete(Model $record): bool
  {
    return static::allowsResourceAction('force_delete');
  }

  public static function canForceDeleteAny(): bool
  {
    return static::allowsResourceAction('force_delete_any');
  }

  public static function canRestore(Model $record): bool
  {
    return static::allowsResourceAction('restore');
  }

  public static function canRestoreAny(): bool
  {
    return static::allowsResourceAction('restore_any');
  }

  protected static function allowsResourceAction(string $action): bool
  {
    $user = Auth::user();

    if (! $user) {
      return false;
    }

    return $user->hasRole('super_admin') || $user->can("{$action} " . static::permissionResourceName());
  }

  protected static function permissionResourceName(): string
  {
    if (property_exists(static::class, 'permissionResourceName') && static::$permissionResourceName) {
      return static::$permissionResourceName;
    }

    return str(class_basename(static::class))
      ->beforeLast('Resource')
      ->headline()
      ->plural()
      ->lower()
      ->toString();
  }
}
