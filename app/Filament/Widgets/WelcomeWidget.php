<?php

namespace App\Filament\Widgets;

use Filament\Facades\Filament;
use Filament\Widgets\Widget;

class WelcomeWidget extends Widget
{
  protected static ?int $sort = -3;

  protected static bool $isLazy = false;

  protected string|int|array $columnSpan = 'full';

  protected string $view = 'filament.widgets.welcome-widget';

  public static function canView(): bool
  {
    return Filament::auth()->check();
  }

  protected function getViewData(): array
  {
    $user = filament()->auth()->user();

    return [
      'user' => $user,
      'greeting' => match (true) {
        now()->hour < 12 => 'Good morning',
        now()->hour < 18 => 'Good afternoon',
        default => 'Good evening',
      },
    ];
  }
}
