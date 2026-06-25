<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
  protected static string $resource = RoleResource::class;

  protected array $permissionGroups = [];

  protected function mutateFormDataBeforeFill(array $data): array
  {
    $data['permission_groups'] = RoleResource::permissionGroupsFromNames(
      $this->record->permissions()->pluck('name'),
    );

    return $data;
  }

  protected function mutateFormDataBeforeSave(array $data): array
  {
    $this->permissionGroups = $data['permission_groups'] ?? [];

    unset($data['permission_groups'], $data['permission_group_toggles'], $data['select_all']);

    return $data;
  }

  protected function afterSave(): void
  {
    RoleResource::syncRolePermissions(
      $this->record,
      RoleResource::permissionNamesFromGroups($this->permissionGroups),
    );
  }

  protected function getHeaderActions(): array
  {
    return [
      DeleteAction::make(),
    ];
  }
}
