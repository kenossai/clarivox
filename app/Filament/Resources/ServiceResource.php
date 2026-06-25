<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use App\Models\Site;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Filament\Resources\Concerns\AuthorizesResourcePermissions;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceResource extends Resource
{
  use AuthorizesResourcePermissions;

  protected static ?string $model = Service::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-briefcase';

  protected static string|\UnitEnum|null $navigationGroup = 'Creative Agency';

  protected static ?int $navigationSort = 2;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required()->searchable(),
        TextInput::make('title')->required()->maxLength(255)->live(onBlur: true)
          ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
        TextInput::make('slug')->required()->unique(ignoreRecord: true),
        TextInput::make('icon')->placeholder('Emoji or icon class')->maxLength(50),
        Select::make('status')->options(['published' => 'Published', 'draft' => 'Draft'])->default('published'),
        TextInput::make('sort_order')->numeric()->default(0),
      ])->columns(2),

      Section::make('Description')->schema([
        TextInput::make('excerpt')->maxLength(255)->columnSpanFull(),
        RichEditor::make('description')->columnSpanFull(),
      ]),

      Section::make('Media')->schema([
        FileUpload::make('image')
          ->image()
          ->disk('public')
          ->directory('services')
          ->maxSize(5024)
          ->columnSpanFull(),
      ]),

      Section::make('SEO')->schema([
        TextInput::make('meta_title')->maxLength(70),
        TextInput::make('meta_description')->maxLength(160),
      ])->columns(2)->collapsible(),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        ImageColumn::make('image')->disk('public')->height(48)->width(72),
        TextColumn::make('site.name')->badge()->color('violet')->sortable(),
        TextColumn::make('icon'),
        TextColumn::make('title')->searchable()->sortable(),
        TextColumn::make('status')->badge()->color(fn($state) => $state === 'published' ? 'success' : 'warning'),
        TextColumn::make('sort_order')->sortable(),
      ])
      ->reorderable('sort_order')
      ->defaultSort('sort_order')
      ->filters([
        SelectFilter::make('site')->relationship('site', 'name'),
        TrashedFilter::make(),
      ])
      ->actions([EditAction::make()])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
  {
    return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListServices::route('/'),
      'create' => Pages\CreateService::route('/create'),
      'edit' => Pages\EditService::route('/{record}/edit'),
    ];
  }
}
