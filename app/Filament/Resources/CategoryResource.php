<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use App\Models\Site;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use App\Filament\Resources\Concerns\AuthorizesResourcePermissions;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
  use AuthorizesResourcePermissions;

  protected static ?string $model = Category::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-tag';

  protected static string|\UnitEnum|null $navigationGroup = 'News Portal';

  protected static ?int $navigationSort = 2;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required(),
        Select::make('parent_id')->label('Parent Category')
          ->options(Category::whereNull('parent_id')->pluck('name', 'id'))
          ->nullable()->placeholder('None (top-level)'),
        TextInput::make('name')->required()->live(onBlur: true)
          ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
        TextInput::make('slug')->required()->unique(ignoreRecord: true),
        Select::make('status')->options(['published' => 'Published', 'draft' => 'Draft'])->default('published'),
        TextInput::make('sort_order')->numeric()->default(0),
      ])->columns(2),

      Section::make('Description')->schema([
        Textarea::make('description')->rows(3)->columnSpanFull(),
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
        TextColumn::make('site.name')->badge()->color('blue')->sortable(),
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('slug')->copyable(),
        TextColumn::make('parent.name')->label('Parent')->placeholder('—'),
        TextColumn::make('articles_count')->counts('articles')->label('Articles'),
        TextColumn::make('status')->badge()->color(fn($s) => $s === 'published' ? 'success' : 'warning'),
      ])
      ->filters([SelectFilter::make('site')->relationship('site', 'name')])
      ->actions([EditAction::make()])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListCategories::route('/'),
      'create' => Pages\CreateCategory::route('/create'),
      'edit' => Pages\EditCategory::route('/{record}/edit'),
    ];
  }
}
