<?php

namespace App\Services;

use Illuminate\Support\Facades\View;

class ThemeLoader
{
  private string $activeTheme = 'creative';

  private string $themesBasePath;

  public function __construct()
  {
    $this->themesBasePath = base_path('themes');
  }

  /**
   * Activate a theme by name, registering its view paths.
   */
  public function activate(string $theme): void
  {
    $this->activeTheme = $theme;
    $themePath = $this->getThemePath($theme);

    if (is_dir($themePath)) {
      // Prepend theme views so they override default resources/views
      View::prependLocation($themePath);
    }
  }

  /**
   * Get the filesystem path for a given theme.
   */
  public function getThemePath(string $theme): string
  {
    return $this->themesBasePath . DIRECTORY_SEPARATOR . $theme;
  }

  /**
   * Return the currently active theme name.
   */
  public function active(): string
  {
    return $this->activeTheme;
  }

  /**
   * Check if a theme exists on disk.
   */
  public function exists(string $theme): bool
  {
    return is_dir($this->getThemePath($theme));
  }

  /**
   * List all available themes.
   *
   * @return array<string>
   */
  public function all(): array
  {
    if (! is_dir($this->themesBasePath)) {
      return [];
    }

    return array_values(array_filter(
      scandir($this->themesBasePath),
      fn($dir) => $dir !== '.' && $dir !== '..' && is_dir($this->themesBasePath . DIRECTORY_SEPARATOR . $dir)
    ));
  }
}
