<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteResource\Pages;
use App\Models\Site;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SiteResource extends Resource
{
  protected static ?string $model = Site::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-globe-alt';

  protected static string|\UnitEnum|null $navigationGroup = 'Core';

  protected static ?int $navigationSort = 1;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make('Site Identity')->schema([
        TextInput::make('name')
          ->required()
          ->maxLength(255),
        TextInput::make('domain')
          ->required()
          ->unique(ignoreRecord: true)
          ->placeholder('example.com')
          ->helperText('Without www or https://'),
        Select::make('type')
          ->options(config('cms.site_types'))
          ->required(),
        Select::make('theme')
          ->options(fn() => collect(app(\App\Services\ThemeLoader::class)->all())->mapWithKeys(fn($t) => [$t => ucfirst($t)])->toArray())
          ->required(),
        Select::make('status')
          ->options(config('cms.site_statuses'))
          ->required()
          ->default('active'),
      ])->columns(2),

      Section::make('Branding')->schema([
        TextInput::make('logo')->nullable()->placeholder('URL or storage path'),
        TextInput::make('favicon')->nullable()->placeholder('URL or storage path'),
      ])->columns(2),

      Section::make('Extra Settings')->schema([
        KeyValue::make('settings')
          ->nullable()
          ->helperText('JSON key/value pairs for custom site configuration'),
      ]),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('domain')->searchable()->copyable(),
        TextColumn::make('type')->badge()
          ->color(fn($state) => $state === 'creative' ? 'violet' : 'blue'),
        TextColumn::make('theme')->badge()->color('gray'),
        TextColumn::make('status')->badge()
          ->color(fn($state) => match ($state) {
            'active' => 'success',
            'maintenance' => 'warning',
            'inactive' => 'danger',
            default => 'gray',
          }),
        TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
      ])
      ->filters([
        SelectFilter::make('type')->options(config('cms.site_types')),
        SelectFilter::make('status')->options(config('cms.site_statuses')),
      ])
      ->actions([
        EditAction::make(),
      ])
      ->bulkActions([
        BulkActionGroup::make([
          DeleteBulkAction::make(),
        ]),
      ]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListSites::route('/'),
      'create' => Pages\CreateSite::route('/create'),
      'edit' => Pages\EditSite::route('/{record}/edit'),
    ];
  }
}
