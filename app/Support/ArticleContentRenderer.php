<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMXPath;

class ArticleContentRenderer
{
  public function render(?string $content): string
  {
    if ($content === null || trim($content) === '') {
      return '';
    }

    $document = new DOMDocument();

    $previous = libxml_use_internal_errors(true);
    $document->loadHTML('<?xml encoding="UTF-8"><div id="article-content-root">' . $content . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    libxml_use_internal_errors($previous);

    $root = $document->getElementById('article-content-root');

    if (! $root instanceof DOMElement) {
      return $content;
    }

    $xpath = new DOMXPath($document);

    foreach ($xpath->query('//p') ?: [] as $paragraph) {
      if (! $paragraph instanceof DOMElement) {
        continue;
      }

      $embed = null;

      if ($url = $this->standaloneUrl($paragraph)) {
        $embed = $this->embedForUrl($document, $url);
      }

      if ($embed === null && $url = $this->urlFromEscapedEmbedCode($paragraph)) {
        $embed = $this->embedForUrl($document, $url);
      }

      if ($embed === null) {
        continue;
      }

      $paragraph->parentNode?->replaceChild($embed, $paragraph);
    }

    return $this->innerHtml($document, $root);
  }

  private function standaloneUrl(DOMElement $paragraph): ?string
  {
    $elements = [];
    $plainText = '';

    foreach ($paragraph->childNodes as $child) {
      if ($child instanceof DOMElement) {
        $elements[] = $child;
        continue;
      }

      if (trim($child->textContent) !== '') {
        $plainText .= $child->textContent;
      }
    }

    if (count($elements) === 1 && $elements[0]->tagName === 'a' && trim($plainText) === '') {
      return trim($elements[0]->getAttribute('href'));
    }

    if (count($elements) === 0) {
      return trim($paragraph->textContent);
    }

    return null;
  }

  private function urlFromEscapedEmbedCode(DOMElement $paragraph): ?string
  {
    $content = html_entity_decode($paragraph->textContent, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    if (! str_contains($content, '<blockquote') && ! str_contains($content, '<iframe') && ! str_contains($content, '<script')) {
      return null;
    }

    $urls = [];

    foreach ($paragraph->getElementsByTagName('a') as $link) {
      $urls[] = $link->getAttribute('href');
    }

    if (preg_match_all('~https?://[^\s<>"\']+~i', $content, $matches)) {
      $urls = [...$urls, ...$matches[0]];
    }

    foreach ($urls as $url) {
      $url = html_entity_decode(rtrim($url, '.,;'), ENT_QUOTES | ENT_HTML5, 'UTF-8');

      if ($this->isEmbeddableUrl($url)) {
        return $url;
      }
    }

    return null;
  }

  private function isEmbeddableUrl(string $url): bool
  {
    return $this->xPostUrl($url) !== null
      || $this->youtubeVideoId($url) !== null
      || $this->vimeoVideoId($url) !== null
      || $this->instagramPostUrl($url) !== null
      || $this->tikTokPost($url) !== null
      || $this->facebookPostUrl($url) !== null
      || $this->threadsPostUrl($url) !== null
      || $this->linkedInActivityId($url) !== null;
  }

  private function embedForUrl(DOMDocument $document, string $url): ?DOMElement
  {
    $url = trim($url);

    if ($xUrl = $this->xPostUrl($url)) {
      return $this->makeXEmbed($document, $xUrl);
    }

    if ($youtubeId = $this->youtubeVideoId($url)) {
      return $this->makeIframeEmbed($document, "https://www.youtube-nocookie.com/embed/{$youtubeId}", 'YouTube video');
    }

    if ($vimeoId = $this->vimeoVideoId($url)) {
      return $this->makeIframeEmbed($document, "https://player.vimeo.com/video/{$vimeoId}", 'Vimeo video');
    }

    if ($instagramUrl = $this->instagramPostUrl($url)) {
      return $this->makeInstagramEmbed($document, $instagramUrl);
    }

    if ($tikTok = $this->tikTokPost($url)) {
      return $this->makeTikTokEmbed($document, $tikTok['url'], $tikTok['id']);
    }

    if ($facebookUrl = $this->facebookPostUrl($url)) {
      return $this->makeIframeEmbed($document, 'https://www.facebook.com/plugins/post.php?href=' . rawurlencode($facebookUrl) . '&show_text=true&width=500', 'Facebook post', 680);
    }

    if ($threadsUrl = $this->threadsPostUrl($url)) {
      return $this->makeThreadsEmbed($document, $threadsUrl);
    }

    if ($linkedInId = $this->linkedInActivityId($url)) {
      return $this->makeIframeEmbed($document, "https://www.linkedin.com/embed/feed/update/urn:li:activity:{$linkedInId}", 'LinkedIn post', 580);
    }

    return null;
  }

  private function xPostUrl(string $url): ?string
  {
    if (! preg_match('~^https?://(?:www\.)?(?:x\.com|twitter\.com)/([A-Za-z0-9_]{1,20})/status(?:es)?/(\d+)(?:[/?#].*)?$~i', trim($url), $matches)) {
      return null;
    }

    return "https://twitter.com/{$matches[1]}/status/{$matches[2]}";
  }

  private function youtubeVideoId(string $url): ?string
  {
    $patterns = [
      '~^https?://(?:www\.)?youtu\.be/([A-Za-z0-9_-]{6,})(?:[/?#].*)?$~i',
      '~^https?://(?:www\.)?youtube\.com/(?:watch\?[^#]*v=|shorts/|embed/)([A-Za-z0-9_-]{6,})(?:[/?#&].*)?$~i',
    ];

    foreach ($patterns as $pattern) {
      if (preg_match($pattern, $url, $matches)) {
        return $matches[1];
      }
    }

    return null;
  }

  private function vimeoVideoId(string $url): ?string
  {
    if (! preg_match('~^https?://(?:www\.)?(?:vimeo\.com/(?:video/)?|player\.vimeo\.com/video/)(\d+)(?:[/?#].*)?$~i', $url, $matches)) {
      return null;
    }

    return $matches[1];
  }

  private function instagramPostUrl(string $url): ?string
  {
    if (! preg_match('~^https?://(?:www\.)?instagram\.com/(p|reel|tv)/([A-Za-z0-9_-]+)(?:[/?#].*)?$~i', $url, $matches)) {
      return null;
    }

    return "https://www.instagram.com/{$matches[1]}/{$matches[2]}/";
  }

  /**
   * @return array{url:string,id:string}|null
   */
  private function tikTokPost(string $url): ?array
  {
    if (! preg_match('~^https?://(?:www\.|m\.)?tiktok\.com/@[A-Za-z0-9._-]+/video/(\d+)(?:[/?#].*)?$~i', $url, $matches)) {
      return null;
    }

    return [
      'url' => preg_replace('/[?#].*$/', '', $url) ?: $url,
      'id' => $matches[1],
    ];
  }

  private function facebookPostUrl(string $url): ?string
  {
    if (! preg_match('~^https?://(?:www\.|m\.)?facebook\.com/(?:[^/]+/(?:posts|videos)/\d+|permalink\.php\?story_fbid=\d+.*|photo\.php\?fbid=\d+.*)(?:[/?#].*)?$~i', $url)) {
      return null;
    }

    return $url;
  }

  private function threadsPostUrl(string $url): ?string
  {
    if (! preg_match('~^https?://(?:www\.)?threads\.(?:net|com)/@[A-Za-z0-9._-]+/post/[A-Za-z0-9_-]+(?:[/?#].*)?$~i', $url)) {
      return null;
    }

    return preg_replace('/[?#].*$/', '', $url) ?: $url;
  }

  private function linkedInActivityId(string $url): ?string
  {
    $patterns = [
      '~^https?://(?:www\.)?linkedin\.com/feed/update/urn:li:activity:(\d+)(?:[/?#].*)?$~i',
      '~^https?://(?:www\.)?linkedin\.com/posts/[^/]+_activity-(\d+)(?:-[A-Za-z0-9_-]+)?(?:[/?#].*)?$~i',
    ];

    foreach ($patterns as $pattern) {
      if (preg_match($pattern, $url, $matches)) {
        return $matches[1];
      }
    }

    return null;
  }

  private function makeXEmbed(DOMDocument $document, string $url): DOMElement
  {
    $blockquote = $document->createElement('blockquote');
    $blockquote->setAttribute('class', 'twitter-tweet social-embed');
    $blockquote->setAttribute('data-dnt', 'true');

    $link = $document->createElement('a', $url);
    $link->setAttribute('href', $url);

    $blockquote->appendChild($link);

    return $blockquote;
  }

  private function makeInstagramEmbed(DOMDocument $document, string $url): DOMElement
  {
    $blockquote = $document->createElement('blockquote');
    $blockquote->setAttribute('class', 'instagram-media social-embed');
    $blockquote->setAttribute('data-instgrm-permalink', $url);
    $blockquote->setAttribute('data-instgrm-version', '14');

    $link = $document->createElement('a', $url);
    $link->setAttribute('href', $url);
    $blockquote->appendChild($link);

    return $blockquote;
  }

  private function makeTikTokEmbed(DOMDocument $document, string $url, string $videoId): DOMElement
  {
    $blockquote = $document->createElement('blockquote');
    $blockquote->setAttribute('class', 'tiktok-embed social-embed');
    $blockquote->setAttribute('cite', $url);
    $blockquote->setAttribute('data-video-id', $videoId);
    $blockquote->setAttribute('style', 'max-width: 605px; min-width: 325px;');

    $section = $document->createElement('section');
    $link = $document->createElement('a', $url);
    $link->setAttribute('href', $url);
    $section->appendChild($link);
    $blockquote->appendChild($section);

    return $blockquote;
  }

  private function makeThreadsEmbed(DOMDocument $document, string $url): DOMElement
  {
    $blockquote = $document->createElement('blockquote');
    $blockquote->setAttribute('class', 'threads-post social-embed');
    $blockquote->setAttribute('data-text-post-permalink', $url);

    $link = $document->createElement('a', $url);
    $link->setAttribute('href', $url);
    $blockquote->appendChild($link);

    return $blockquote;
  }

  private function makeIframeEmbed(DOMDocument $document, string $src, string $title, int $height = 315): DOMElement
  {
    $wrapper = $document->createElement('div');
    $wrapper->setAttribute('class', 'social-embed social-embed--iframe');

    $iframe = $document->createElement('iframe');
    $iframe->setAttribute('src', $src);
    $iframe->setAttribute('title', $title);
    $iframe->setAttribute('height', (string) $height);
    $iframe->setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
    $iframe->setAttribute('allowfullscreen', 'allowfullscreen');
    $iframe->setAttribute('loading', 'lazy');
    $iframe->setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');

    $wrapper->appendChild($iframe);

    return $wrapper;
  }

  private function innerHtml(DOMDocument $document, DOMElement $element): string
  {
    $html = '';

    foreach ($element->childNodes as $child) {
      $html .= $document->saveHTML($child);
    }

    return $html;
  }
}
