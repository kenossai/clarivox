<?php

namespace App\Filament\Resources\PortfolioProjectResource\Pages;

use App\Filament\Resources\PortfolioProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioProject extends EditRecord
{
  protected static string $resource = PortfolioProjectResource::class;
  protected function getHeaderActions(): array
  {
    return [DeleteAction::make()];
  }
}
