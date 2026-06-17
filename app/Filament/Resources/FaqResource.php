<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
use App\Models\Site;
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

class FaqResource extends Resource
{
  protected static ?string $model = Faq::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';

  protected static string|\UnitEnum|null $navigationGroup = 'Creative Agency';

  protected static ?int $navigationSort = 6;

  protected static ?string $navigationLabel = 'FAQs';

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required(),
        TextInput::make('category')->nullable(),
        Select::make('status')->options(['published' => 'Published', 'draft' => 'Draft'])->default('published'),
        TextInput::make('sort_order')->numeric()->default(0),
      ])->columns(2),
      Section::make('Content')->schema([
        TextInput::make('question')->required()->columnSpanFull(),
        Textarea::make('answer')->required()->rows(5)->columnSpanFull(),
      ]),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('site.name')->badge()->color('violet'),
        TextColumn::make('question')->searchable()->limit(60),
        TextColumn::make('category')->badge()->color('gray')->placeholder('—'),
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
      'index' => Pages\ListFaqs::route('/'),
      'create' => Pages\CreateFaq::route('/create'),
      'edit' => Pages\EditFaq::route('/{record}/edit'),
    ];
  }
}
