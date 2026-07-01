<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class NewsOverviewChart extends ChartWidget
{
  protected static ?int $sort = 2;

  protected string|int|array $columnSpan = 'full';

  protected ?string $heading = 'Articles Performance';

  protected ?string $description = 'Published articles and views over time.';

  protected string $color = 'info';

  protected ?string $maxHeight = '320px';

  protected function getData(): array
  {
    $days = match ($this->filter) {
      '90_days' => 90,
      'year' => 365,
      default => 30,
    };

    $start = now()->subDays($days - 1)->startOfDay();
    $end = now()->endOfDay();

    $period = collect(CarbonPeriod::create($start, '1 day', $end))
      ->mapWithKeys(fn(Carbon $date): array => [$date->toDateString() => [
        'label' => $date->format($days > 90 ? 'M j' : 'M d'),
        'articles' => 0,
        'views' => 0,
      ]]);

    Article::query()
      ->where('status', 'published')
      ->whereBetween('published_at', [$start, $end])
      ->selectRaw('DATE(published_at) as published_date, COUNT(*) as article_count, SUM(views_count) as view_count')
      ->groupBy(DB::raw('DATE(published_at)'))
      ->orderBy('published_date')
      ->get()
      ->each(function ($row) use ($period): void {
        if (! $period->has($row->published_date)) {
          return;
        }

        $day = $period->get($row->published_date);
        $day['articles'] = (int) $row->article_count;
        $day['views'] = (int) $row->view_count;

        $period->put($row->published_date, $day);
      });

    return [
      'datasets' => [
        [
          'label' => 'Published articles',
          'data' => $period->pluck('articles')->values()->all(),
          'borderColor' => '#8b5cf6',
          'backgroundColor' => 'rgba(139, 92, 246, 0.15)',
          'fill' => true,
          'tension' => 0.35,
        ],
        [
          'label' => 'Views',
          'data' => $period->pluck('views')->values()->all(),
          'borderColor' => '#0ea5e9',
          'backgroundColor' => 'rgba(14, 165, 233, 0.12)',
          'fill' => true,
          'tension' => 0.35,
          'yAxisID' => 'views',
        ],
      ],
      'labels' => $period->pluck('label')->values()->all(),
    ];
  }

  protected function getFilters(): ?array
  {
    return [
      '30_days' => 'Last 30 days',
      '90_days' => 'Last 90 days',
      'year' => 'Last year',
    ];
  }

  protected function getOptions(): array
  {
    return [
      'plugins' => [
        'legend' => [
          'display' => true,
        ],
      ],
      'scales' => [
        'y' => [
          'beginAtZero' => true,
          'ticks' => [
            'precision' => 0,
          ],
        ],
        'views' => [
          'beginAtZero' => true,
          'position' => 'right',
          'grid' => [
            'drawOnChartArea' => false,
          ],
          'ticks' => [
            'precision' => 0,
          ],
        ],
      ],
    ];
  }

  protected function getType(): string
  {
    return 'line';
  }
}
