<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Comment;
use App\Models\NewsletterSubscriber;
use App\Models\Site;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SiteStatsWidget extends BaseWidget
{
  protected function getStats(): array
  {
    return [
      Stat::make('Total Sites', Site::count())
        ->description(Site::where('status', 'active')->count() . ' active')
        ->descriptionIcon('heroicon-m-globe-alt')
        ->color('primary'),

      Stat::make('Articles Published', Article::where('status', 'published')->count())
        ->description('All sites combined')
        ->descriptionIcon('heroicon-m-newspaper')
        ->color('success'),

      Stat::make('Pending Comments', Comment::where('status', 'pending')->count())
        ->description('Awaiting moderation')
        ->descriptionIcon('heroicon-m-chat-bubble-left-ellipsis')
        ->color('warning'),

      Stat::make('Newsletter Subscribers', NewsletterSubscriber::where('status', 'active')->count())
        ->description('Active subscriptions')
        ->descriptionIcon('heroicon-m-envelope')
        ->color('info'),
    ];
  }
}
