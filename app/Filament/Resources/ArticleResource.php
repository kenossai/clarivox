<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Site;
use App\Models\Tag;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use ZipStream\File;

class ArticleResource extends Resource
{
  protected static ?string $model = Article::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

  protected static string|\UnitEnum|null $navigationGroup = 'News Portal';

  protected static ?int $navigationSort = 1;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make('Article Details')->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required()->live(),
        Select::make('category_id')->label('Category')
          ->options(fn($get) => Category::where('site_id', $get('site_id'))->pluck('name', 'id'))
          ->searchable()->nullable(),
        Select::make('author_id')->label('Author')
          ->options(fn($get) => Author::where('site_id', $get('site_id'))->pluck('name', 'id'))
          ->searchable()->nullable(),
        TextInput::make('title')->required()->maxLength(255)->columnSpanFull()->live(onBlur: true)
          ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
        TextInput::make('slug')->required()->unique(ignoreRecord: true)->columnSpanFull(),
      ])->columns(3),

      Section::make('Media')->schema([
        FileUpload::make('featured_image')
          ->image()
          ->disk('public')
          ->directory('articles')
          ->maxSize(5024) //5MB
          ->columnSpanFull(),
      ])->columns(1),

      Section::make('Content')->schema([

        Textarea::make('excerpt')->rows(3)->maxLength(500)->columnSpanFull(),
        RichEditor::make('content')
          ->fileAttachmentsDisk('public')
          ->fileAttachmentsDirectory('articles')
          ->columnSpanFull(),
      ]),

      Section::make('Publishing')->schema([
        Select::make('status')
          ->options(config('cms.article_statuses'))
          ->default('draft')
          ->required(),
        DateTimePicker::make('published_at')->nullable(),
        Toggle::make('featured')->label('Featured Article'),
        Toggle::make('allow_comments')->label('Allow Comments')->default(true),
        Select::make('tags')
          ->multiple()
          ->relationship('tags', 'name')
          ->createOptionForm([
            Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required(),
            TextInput::make('name')->required()->live(onBlur: true)
              ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
            TextInput::make('slug')->required()->unique(),
          ])
          ->preload(),
      ])->columns(2),

      Section::make('SEO')->schema([
        TextInput::make('meta_title')->maxLength(70)->placeholder('Leave empty to use article title'),
        TextInput::make('meta_description')->maxLength(160),
      ])->columns(2)->collapsible(),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        ImageColumn::make('featured_image')->label('Image')->disk('public')->height(50)->width(80),
        TextColumn::make('site.name')->badge()->color('blue')->sortable(),
        TextColumn::make('title')->searchable()->sortable()->limit(50),
        TextColumn::make('category.name')->badge()->color('gray'),
        TextColumn::make('author.name')->label('Author'),
        TextColumn::make('status')->badge()
          ->color(fn($s) => match ($s) {
            'published' => 'success',
            'draft' => 'warning',
            'archived' => 'gray',
            default => 'gray',
          }),
        IconColumn::make('featured')->boolean(),
        TextColumn::make('views_count')->numeric()->sortable()->label('Views'),
        TextColumn::make('published_at')->dateTime()->sortable(),
      ])
      ->filters([
        SelectFilter::make('site')->relationship('site', 'name'),
        SelectFilter::make('status')->options(config('cms.article_statuses')),
        SelectFilter::make('category')->relationship('category', 'name'),
        TrashedFilter::make(),
      ])
      ->actions([EditAction::make()])
      ->bulkActions([
        BulkActionGroup::make([
          DeleteBulkAction::make(),
          ForceDeleteBulkAction::make(),
          RestoreBulkAction::make(),
        ]),
      ])
      ->defaultSort('created_at', 'desc');
  }

  public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
  {
    return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListArticles::route('/'),
      'create' => Pages\CreateArticle::route('/create'),
      'edit' => Pages\EditArticle::route('/{record}/edit'),
    ];
  }
}
