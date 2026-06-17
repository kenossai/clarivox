<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsletterSubscriberResource\Pages;
use App\Models\NewsletterSubscriber;
use App\Models\Site;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class NewsletterSubscriberResource extends Resource
{
  protected static ?string $model = NewsletterSubscriber::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-envelope';

  protected static string|\UnitEnum|null $navigationGroup = 'News Portal';

  protected static ?int $navigationSort = 6;

  protected static ?string $navigationLabel = 'Newsletter';

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        Select::make('site_id')->label('Site')->options(Site::pluck('name', 'id'))->required(),
        TextInput::make('email')->required()->email(),
        TextInput::make('name')->nullable(),
        Select::make('status')->options(['active' => 'Active', 'unsubscribed' => 'Unsubscribed'])->required(),
      ])->columns(2),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('site.name')->badge()->color('blue')->sortable(),
        TextColumn::make('email')->searchable()->copyable(),
        TextColumn::make('name')->searchable()->placeholder('—'),
        TextColumn::make('status')->badge()->color(fn($s) => $s === 'active' ? 'success' : 'gray'),
        IconColumn::make('verified_at')->label('Verified')->boolean()->trueIcon('heroicon-o-check-circle')->falseIcon('heroicon-o-x-circle'),
        TextColumn::make('created_at')->dateTime()->sortable(),
      ])
      ->filters([
        SelectFilter::make('site')->relationship('site', 'name'),
        SelectFilter::make('status')->options(['active' => 'Active', 'unsubscribed' => 'Unsubscribed']),
      ])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListNewsletterSubscribers::route('/'),
    ];
  }
}
