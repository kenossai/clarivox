<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
  protected static string $resource = RoleResource::class;

  protected array $permissionGroups = [];

  protected function mutateFormDataBeforeCreate(array $data): array
  {
    $this->permissionGroups = $data['permission_groups'] ?? [];

    unset($data['permission_groups'], $data['permission_group_toggles'], $data['select_all']);

    return $data;
  }

  protected function afterCreate(): void
  {
    RoleResource::syncRolePermissions(
      $this->record,
      RoleResource::permissionNamesFromGroups($this->permissionGroups),
    );
  }
}
