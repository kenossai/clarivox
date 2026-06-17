<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentResource extends Resource
{
  protected static ?string $model = Comment::class;

  protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

  protected static string|\UnitEnum|null $navigationGroup = 'News Portal';

  protected static ?int $navigationSort = 5;

  public static function form(Schema $schema): Schema
  {
    return $schema->schema([
      Section::make()->schema([
        TextInput::make('author_name')->required(),
        TextInput::make('author_email')->email()->required(),
        Select::make('status')->options(config('cms.comment_statuses'))->required(),
        Textarea::make('content')->required()->rows(5)->columnSpanFull(),
      ])->columns(2),
    ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        TextColumn::make('article.title')->searchable()->limit(40)->label('Article'),
        TextColumn::make('author_name')->searchable(),
        TextColumn::make('author_email')->searchable()->copyable(),
        TextColumn::make('content')->limit(80),
        TextColumn::make('status')->badge()
          ->color(fn($s) => match ($s) {
            'approved' => 'success',
            'pending' => 'warning',
            'rejected' => 'danger',
            'spam' => 'gray',
            default => 'gray',
          }),
        TextColumn::make('created_at')->dateTime()->sortable(),
      ])
      ->filters([
        SelectFilter::make('status')->options(config('cms.comment_statuses')),
        TrashedFilter::make(),
      ])
      ->actions([
        Action::make('approve')
          ->icon('heroicon-o-check')
          ->color('success')
          ->action(fn(Comment $record) => $record->update(['status' => 'approved']))
          ->visible(fn(Comment $r) => $r->status !== 'approved'),
        Action::make('reject')
          ->icon('heroicon-o-x-mark')
          ->color('danger')
          ->action(fn(Comment $record) => $record->update(['status' => 'rejected']))
          ->visible(fn(Comment $r) => $r->status !== 'rejected'),
        EditAction::make(),
      ])
      ->bulkActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
  }

  public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
  {
    return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListComments::route('/'),
      'edit' => Pages\EditComment::route('/{record}/edit'),
    ];
  }
}
