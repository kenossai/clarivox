<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Site;
use App\Models\Testimonial;
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

class TestimonialResource extends Resource
{
  use AuthorizesResourcePermissions;

  protected static ?string $model = Testimonial::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-star';

  protected static string|\UnitEnum|null $navigationGroup = 'Creative Agency';

  protected static ?int $navigationSort = 5;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required(),
        TextInput::make('author_name')->required(),
        TextInput::make('author_title')->nullable(),
        TextInput::make('author_company')->nullable(),
        Select::make('rating')->options([1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5])->default(5),
        Select::make('status')->options(['published' => 'Published', 'draft' => 'Draft'])->default('published'),
        TextInput::make('sort_order')->numeric()->default(0),
      ])->columns(2),
      Section::make('Testimonial')->schema([
        Textarea::make('content')->required()->rows(4)->columnSpanFull(),
      ]),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('site.name')->badge()->color('violet'),
        TextColumn::make('author_name')->searchable(),
        TextColumn::make('author_company'),
        TextColumn::make('rating')->badge()->color('warning'),
        TextColumn::make('status')->badge()->color(fn($s) => $s === 'published' ? 'success' : 'warning'),
      ])
      ->reorderable('sort_order')
      ->filters([SelectFilter::make('site')->relationship('site', 'name')])
      ->actions([EditAction::make()])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListTestimonials::route('/'),
      'create' => Pages\CreateTestimonial::route('/create'),
      'edit' => Pages\EditTestimonial::route('/{record}/edit'),
    ];
  }
}
