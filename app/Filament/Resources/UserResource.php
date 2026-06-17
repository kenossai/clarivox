<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
  protected static ?string $model = User::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';

  protected static string|\UnitEnum|null $navigationGroup = 'Core';

  protected static ?int $navigationSort = 2;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        TextInput::make('name')->required()->maxLength(255),
        TextInput::make('email')->required()->email()->unique(ignoreRecord: true)->maxLength(255),
        TextInput::make('password')
          ->password()
          ->revealable()
          ->required(fn($livewire) => $livewire instanceof Pages\CreateUser)
          ->minLength(8)
          ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
          ->dehydrated(fn($state) => filled($state))
          ->label(fn($livewire) => $livewire instanceof Pages\CreateUser ? 'Password' : 'New Password'),
        Select::make('roles')
          ->multiple()
          ->relationship('roles', 'name')
          ->preload(),
      ])->columns(2),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('email')->searchable()->copyable(),
        TextColumn::make('roles.name')->badge()->color('primary')->label('Roles'),
        TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
      ])
      ->actions([EditAction::make()])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
  }
}
