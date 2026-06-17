<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioProjectResource\Pages;
use App\Models\PortfolioProject;
use App\Models\Site;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioProjectResource extends Resource
{
  protected static ?string $model = PortfolioProject::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

  protected static string|\UnitEnum|null $navigationGroup = 'Creative Agency';

  protected static ?int $navigationSort = 3;

  protected static ?string $navigationLabel = 'Portfolio';

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make('Project Details')->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required(),
        TextInput::make('title')->required()->live(onBlur: true)
          ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
        TextInput::make('slug')->required()->unique(ignoreRecord: true),
        TextInput::make('client'),
        TextInput::make('category'),
        DatePicker::make('completion_date'),
        TextInput::make('project_url')->url()->placeholder('https://'),
        Select::make('status')->options(['published' => 'Published', 'draft' => 'Draft'])->default('published'),
        Toggle::make('featured')->label('Featured on homepage'),
        TextInput::make('sort_order')->numeric()->default(0),
      ])->columns(2),

      Section::make('Content')->schema([
        TextInput::make('excerpt')->maxLength(255)->columnSpanFull(),
        RichEditor::make('description')->columnSpanFull(),
        TagsInput::make('tags')->separator(','),
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
        TextColumn::make('site.name')->badge()->color('violet')->sortable(),
        TextColumn::make('title')->searchable()->sortable(),
        TextColumn::make('client')->searchable(),
        TextColumn::make('category')->badge()->color('gray'),
        IconColumn::make('featured')->boolean(),
        TextColumn::make('status')->badge()->color(fn($s) => $s === 'published' ? 'success' : 'warning'),
        TextColumn::make('completion_date')->date()->sortable(),
      ])
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
      'index' => Pages\ListPortfolioProjects::route('/'),
      'create' => Pages\CreatePortfolioProject::route('/create'),
      'edit' => Pages\EditPortfolioProject::route('/{record}/edit'),
    ];
  }
}
