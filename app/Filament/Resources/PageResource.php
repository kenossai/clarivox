<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use App\Models\Site;
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
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
  use AuthorizesResourcePermissions;

  protected static ?string $model = Page::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

  protected static string|\UnitEnum|null $navigationGroup = 'Creative Agency';

  protected static ?int $navigationSort = 1;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make('Page Details')->schema([
        Select::make('site_id')
          ->label('Site')
          ->options(Site::pluck('name', 'id'))
          ->required()
          ->searchable(),
        TextInput::make('title')->required()->maxLength(255)->live(onBlur: true)
          ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
        TextInput::make('slug')->required()->unique(ignoreRecord: true)->maxLength(255),
        Select::make('template')
          ->options(['default' => 'Default', 'landing' => 'Landing', 'about' => 'About', 'contact' => 'Contact'])
          ->default('default'),
        Select::make('status')
          ->options(['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived'])
          ->default('draft')
          ->required(),
      ])->columns(2),

      Section::make('Content')->schema([
        RichEditor::make('content')->fileAttachmentsDisk('public')->fileAttachmentsDirectory('pages')->columnSpanFull(),
      ]),

      Section::make('SEO')->schema([
        TextInput::make('meta_title')->maxLength(70)->placeholder('Leave empty to use page title'),
        TextInput::make('meta_description')->maxLength(160),
      ])->columns(2)->collapsible(),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('site.name')->sortable()->badge()->color('primary'),
        TextColumn::make('title')->searchable()->sortable(),
        TextColumn::make('slug')->searchable()->copyable(),
        TextColumn::make('template')->badge()->color('gray'),
        TextColumn::make('status')->badge()
          ->color(fn($state) => match ($state) {
            'published' => 'success',
            'draft' => 'warning',
            'archived' => 'gray',
            default => 'gray',
          }),
        TextColumn::make('updated_at')->dateTime()->sortable(),
      ])
      ->filters([
        SelectFilter::make('site')->relationship('site', 'name'),
        SelectFilter::make('status')->options(['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived']),
        TrashedFilter::make(),
      ])
      ->actions([EditAction::make()])
      ->bulkActions([
        BulkActionGroup::make([
          DeleteBulkAction::make(),
          ForceDeleteBulkAction::make(),
          RestoreBulkAction::make(),
        ]),
      ]);
  }

  public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
  {
    return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListPages::route('/'),
      'create' => Pages\CreatePage::route('/create'),
      'edit' => Pages\EditPage::route('/{record}/edit'),
    ];
  }
}
