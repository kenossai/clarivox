<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Concerns\AuthorizesResourcePermissions;
use App\Filament\Resources\RoleResource\Pages;
use App\Support\AdminPermissions;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
  use AuthorizesResourcePermissions;

  protected static ?string $model = Role::class;

  protected static ?string $permissionResourceName = 'roles';

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shield-check';

  protected static string|\UnitEnum|null $navigationGroup = 'Core';

  protected static ?int $navigationSort = 3;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make('Role')->schema([
        TextInput::make('name')
          ->required()
          ->unique(ignoreRecord: true)
          ->maxLength(255),
        TextInput::make('guard_name')
          ->required()
          ->default('web')
          ->maxLength(255),
        Toggle::make('select_all')
          ->label('Select All')
          ->helperText('Enable or disable every permission for this role.')
          ->live()
          ->dehydrated(false)
          ->afterStateUpdated(function (bool $state, Set $set): void {
            foreach (static::getPermissionGroups() as $key => $group) {
              $set("permission_groups.{$key}", $state ? array_keys($group['options']) : []);
            }
          }),
      ])->columns(3)->columnSpanFull(),

      Tabs::make('Permission groups')
        ->tabs([
          Tab::make('Resources')
            ->badge(fn() => count(static::getPermissionGroups()))
            ->schema([
              Grid::make(['default' => 1, 'xl' => 3])
                ->schema(static::getPermissionGroupCards()),
            ]),
      ])
        ->columnSpanFull(),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('permissions_count')->counts('permissions')->label('Permissions')->sortable(),
        TextColumn::make('users_count')->counts('users')->label('Users')->sortable(),
        TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
      ])
      ->actions([EditAction::make()])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListRoles::route('/'),
      'create' => Pages\CreateRole::route('/create'),
      'edit' => Pages\EditRole::route('/{record}/edit'),
    ];
  }

  public static function getPermissionGroups(): array
  {
    $permissions = collect(AdminPermissions::all())
      ->merge(Permission::query()->pluck('name'))
      ->unique()
      ->sort()
      ->values();

    $groups = [
      'administration' => [
        'label' => 'Administration',
        'description' => 'Panel access',
        'options' => [],
      ],
    ];

    foreach (AdminPermissions::RESOURCES as $resource) {
      $key = Str::slug($resource, '_');

      $groups[$key] = [
        'label' => Str::headline($resource),
        'description' => Str::studly(Str::singular($resource)),
        'options' => [],
      ];
    }

    foreach ($permissions as $permission) {
      if ($permission === AdminPermissions::ACCESS_ADMIN) {
        $groups['administration']['options'][$permission] = 'Access Admin';

        continue;
      }

      [$action, $resource] = static::splitPermissionName($permission);
      $key = Str::slug($resource, '_');

      if (! isset($groups[$key])) {
        $groups[$key] = [
          'label' => Str::headline($resource),
          'description' => 'Custom group',
          'options' => [],
        ];
      }

      $groups[$key]['options'][$permission] = Str::headline($action);
    }

    return array_filter($groups, fn(array $group): bool => filled($group['options']));
  }

  public static function permissionGroupsFromNames(iterable $permissions): array
  {
    $selected = collect($permissions)->values();

    return collect(static::getPermissionGroups())
      ->mapWithKeys(fn(array $group, string $key): array => [
        $key => $selected
          ->intersect(array_keys($group['options']))
          ->values()
          ->all(),
      ])
      ->all();
  }

  public static function permissionNamesFromGroups(?array $groups): array
  {
    return collect($groups ?? [])
      ->flatten()
      ->filter()
      ->unique()
      ->values()
      ->all();
  }

  public static function syncRolePermissions(Role $role, array $permissions): void
  {
    foreach ($permissions as $permission) {
      Permission::firstOrCreate([
        'name' => $permission,
        'guard_name' => $role->guard_name,
      ]);
    }

    $role->syncPermissions($permissions);
  }

  protected static function getPermissionGroupCards(): array
  {
    return collect(static::getPermissionGroups())
      ->map(function (array $group, string $key) {
        return Section::make($group['label'])
          ->description($group['description'])
          ->schema([
            CheckboxList::make("permission_groups.{$key}")
              ->hiddenLabel()
              ->options($group['options'])
              ->columns(2)
              ->bulkToggleable(),
          ]);
      })
      ->values()
      ->all();
  }

  protected static function splitPermissionName(string $permission): array
  {
    foreach (AdminPermissions::ACTIONS as $action) {
      $prefix = "{$action} ";

      if (str_starts_with($permission, $prefix)) {
        return [$action, Str::after($permission, $prefix)];
      }
    }

    return [$permission, 'custom permissions'];
  }
}
