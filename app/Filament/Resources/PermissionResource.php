<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Concerns\AuthorizesResourcePermissions;
use App\Filament\Resources\PermissionResource\Pages;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Spatie\Permission\Models\Permission;

class PermissionResource extends Resource
{
  use AuthorizesResourcePermissions;

  protected static ?string $model = Permission::class;

  protected static ?string $permissionResourceName = 'permissions';

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-key';

  protected static string|\UnitEnum|null $navigationGroup = 'Core';

  protected static ?int $navigationSort = 4;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make('Permission')->schema([
        TextInput::make('name')
          ->required()
          ->unique(ignoreRecord: true)
          ->maxLength(255),
      ]),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('roles.name')->badge()->color('primary')->label('Roles'),
        TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
      ])
      ->actions([EditAction::make()])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListPermissions::route('/'),
      'create' => Pages\CreatePermission::route('/create'),
      'edit' => Pages\EditPermission::route('/{record}/edit'),
    ];
  }
}
