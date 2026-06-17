<?php

namespace App\Services;

use App\Models\Site;

class SeoService
{
  private array $meta = [];

  public function fromSite(Site $site): static
  {
    $this->set('og:site_name', $site->name);

    return $this;
  }

  public function set(string $key, string $value): static
  {
    $this->meta[$key] = $value;

    return $this;
  }

  public function title(string $title, ?string $separator = ' | ', ?string $suffix = null): static
  {
    $full = $suffix ? $title . $separator . $suffix : $title;
    $this->meta['title'] = $full;
    $this->meta['og:title'] = $full;
    $this->meta['twitter:title'] = $full;

    return $this;
  }

  public function description(string|null $description): static
  {
    if ($description === null) {
      return $this;
    }
    $this->meta['description'] = $description;
    $this->meta['og:description'] = $description;
    $this->meta['twitter:description'] = $description;

    return $this;
  }

  public function image(string|null $url): static
  {
    $this->meta['og:image'] = $url;
    $this->meta['twitter:image'] = $url;

    return $this;
  }

  public function canonical(string|null $url): static
  {
    $this->meta['canonical'] = $url;
    $this->meta['og:url'] = $url;

    return $this;
  }

  public function article(array $data = []): static
  {
    $this->meta['og:type'] = 'article';

    if (isset($data['published_time'])) {
      $this->meta['article:published_time'] = $data['published_time'];
    }
    if (isset($data['author'])) {
      $this->meta['article:author'] = $data['author'];
    }

    return $this;
  }

  public function twitterCard(string $card = 'summary_large_image'): static
  {
    $this->meta['twitter:card'] = $card;

    return $this;
  }

  public function get(string $key, ?string $default = null): ?string
  {
    return $this->meta[$key] ?? $default;
  }

  public function all(): array
  {
    return $this->meta;
  }

  public function render(): string
  {
    $html = '';

    if (isset($this->meta['title'])) {
      $html .= '<title>' . e($this->meta['title']) . '</title>' . PHP_EOL;
    }

    if (isset($this->meta['description'])) {
      $html .= '<meta name="description" content="' . e($this->meta['description']) . '">' . PHP_EOL;
    }

    if (isset($this->meta['canonical'])) {
      $html .= '<link rel="canonical" href="' . e($this->meta['canonical']) . '">' . PHP_EOL;
    }

    foreach ($this->meta as $key => $value) {
      if (in_array($key, ['title', 'description', 'canonical'])) {
        continue;
      }

      if (str_starts_with($key, 'og:') || str_starts_with($key, 'article:')) {
        $html .= '<meta property="' . e($key) . '" content="' . e($value) . '">' . PHP_EOL;
      } elseif (str_starts_with($key, 'twitter:')) {
        $html .= '<meta name="' . e($key) . '" content="' . e($value) . '">' . PHP_EOL;
      }
    }

    return $html;
  }
}
