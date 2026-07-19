<?php

namespace App\Filament\Resources\ArticleResource\Pages;

use App\Filament\Resources\ArticleResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditArticle extends EditRecord
{
  protected static string $resource = ArticleResource::class;
  protected function getHeaderActions(): array
  {
    return [
      Action::make('viewArticle')
        ->label('View Article')
        ->icon('heroicon-o-eye')
        ->url(fn(): string => ArticleResource::getArticleUrl($this->getRecord()))
        ->openUrlInNewTab(),
      DeleteAction::make(),
    ];
  }
}
