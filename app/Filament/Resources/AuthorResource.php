<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Models\Author;
use App\Models\Site;
use App\Models\User;
use Filament\Forms\Components\KeyValue;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AuthorResource extends Resource
{
  protected static ?string $model = Author::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-pencil-square';

  protected static string|\UnitEnum|null $navigationGroup = 'News Portal';

  protected static ?int $navigationSort = 4;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required(),
        Select::make('user_id')->label('Linked User')->options(User::pluck('name', 'id'))->nullable()->searchable(),
        TextInput::make('name')->required()->live(onBlur: true)
          ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
        TextInput::make('slug')->required()->unique(ignoreRecord: true),
        TextInput::make('email')->email()->nullable(),
        Select::make('status')->options(['active' => 'Active', 'inactive' => 'Inactive'])->default('active'),
      ])->columns(2),
      Section::make('Bio')->schema([
        Textarea::make('bio')->rows(4)->columnSpanFull(),
      ]),
      Section::make('Social Links')->schema([
        KeyValue::make('social_links')->nullable(),
      ])->collapsible(),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('site.name')->badge()->color('blue'),
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('email')->searchable(),
        TextColumn::make('articles_count')->counts('articles')->label('Articles'),
        TextColumn::make('status')->badge()->color(fn($s) => $s === 'active' ? 'success' : 'gray'),
      ])
      ->filters([SelectFilter::make('site')->relationship('site', 'name')])
      ->actions([EditAction::make()])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListAuthors::route('/'),
      'create' => Pages\CreateAuthor::route('/create'),
      'edit' => Pages\EditAuthor::route('/{record}/edit'),
    ];
  }
}
