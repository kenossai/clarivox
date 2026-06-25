<?php

namespace App\Support;

class AdminPermissions
{
  public const ACCESS_ADMIN = 'access admin';

  public const RESOURCES = [
    'sites',
    'users',
    'roles',
    'permissions',
    'pages',
    'services',
    'portfolio projects',
    'team members',
    'testimonials',
    'faqs',
    'articles',
    'categories',
    'authors',
    'comments',
    'newsletter subscribers',
  ];

  public const ACTIONS = [
    'view_any',
    'view',
    'create',
    'update',
    'delete',
    'delete_any',
    'force_delete',
    'force_delete_any',
    'restore',
    'restore_any',
  ];

  public static function all(): array
  {
    $permissions = [self::ACCESS_ADMIN];

    foreach (self::RESOURCES as $resource) {
      foreach (self::ACTIONS as $action) {
        $permissions[] = self::for($action, $resource);
      }
    }

    return $permissions;
  }

  public static function for(string $action, string $resource): string
  {
    return "{$action} {$resource}";
  }
}
