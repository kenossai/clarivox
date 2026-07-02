<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\Site;
use App\Models\TeamMember;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TeamMemberResource extends Resource
{
  use AuthorizesResourcePermissions;

  protected static ?string $model = TeamMember::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

  protected static string|\UnitEnum|null $navigationGroup = 'Creative Agency';

  protected static ?int $navigationSort = 4;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required(),
        TextInput::make('name')->required(),
        TextInput::make('position'),
        TextInput::make('email')->email()->nullable(),
        Select::make('status')->options(['published' => 'Published', 'draft' => 'Draft'])->default('published'),
        TextInput::make('sort_order')->numeric()->default(0),
      ])->columns(2),
      Section::make('Bio')->schema([
        Textarea::make('bio')->rows(4)->columnSpanFull(),
      ]),
      Section::make('Photo')->schema([
        FileUpload::make('photo')
          ->image()
          ->disk('public')
          ->directory('team')
          ->maxSize(5024)
          ->columnSpanFull(),
      ]),
      Section::make('Social Links')->schema([
        KeyValue::make('social_links')->nullable()
          ->helperText('e.g. twitter: https://twitter.com/handle'),
      ])->collapsible(),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        ImageColumn::make('photo')->disk('public')->height(48)->width(48)->circular(),
        TextColumn::make('site.name')->badge()->color('violet'),
        TextColumn::make('name')->searchable()->sortable(),
        TextColumn::make('position'),
        TextColumn::make('status')->badge()->color(fn($s) => $s === 'published' ? 'success' : 'warning'),
        TextColumn::make('sort_order')->sortable(),
      ])
      ->reorderable('sort_order')
      ->filters([SelectFilter::make('site')->relationship('site', 'name')])
      ->actions([EditAction::make()])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListTeamMembers::route('/'),
      'create' => Pages\CreateTeamMember::route('/create'),
      'edit' => Pages\EditTeamMember::route('/{record}/edit'),
    ];
  }
}
