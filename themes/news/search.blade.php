@extends('news::layouts.app')

@section('content')
    <div
        style="margin-bottom:24px;padding-bottom:20px;border-bottom:1px solid rgba(240,234,231,.4);display:flex;align-items:center;gap:20px">
        <form action="{{ route('news.search') }}" method="GET" class="search-form" style="flex:1;max-width:480px">
            <input type="text" name="q" placeholder="Search…" value="{{ $query }}" autofocus>
            <button type="submit" aria-label="Search">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
            </button>
        </form>
        @if ($query)
            <span style="font-size:11px;color:#9A8A84">
                {{ $articles->total() }} result{{ $articles->total() === 1 ? '' : 's' }} for "<strong
                    style="color:#2A1818">{{ $query }}</strong>"
            </span>
        @endif
    </div>

    @if ($articles->isNotEmpty())
        <div class="article-grid">
            @foreach ($articles as $article)
                <div class="article-card">
                    <a href="{{ route('news.article.show', $article->slug) }}">
                        <div class="img-block article-img">
                            @if ($article->featured_image_url)
                                <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}">
                            @endif
                        </div>
                    </a>
                    @if ($article->category)
                        <a href="{{ route('news.category.show', $article->category->slug) }}"
                            class="badge">{{ $article->category->name }}</a>
                    @endif
                    <h3><a href="{{ route('news.article.show', $article->slug) }}"
                            style="color:inherit">{{ $article->title }}</a></h3>
                    <div class="meta">
                        @if ($article->author)
                            <span>{{ $article->author->name }}</span><span class="sep">|</span>
                        @endif
                        <span>{{ $article->published_at?->format('M j, Y') }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($articles->hasPages())
            <div class="pagination">
                @if ($articles->onFirstPage())
                    <span>&laquo;</span>
                @else
                    <a href="{{ $articles->previousPageUrl() . '&q=' . urlencode($query) }}">&laquo;</a>
                @endif
                @foreach ($articles->getUrlRange(max(1, $articles->currentPage() - 2), min($articles->lastPage(), $articles->currentPage() + 2)) as $page => $url)
                    @if ($page == $articles->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
                @if ($articles->hasMorePages())
                    <a href="{{ $articles->nextPageUrl() . '&q=' . urlencode($query) }}">&raquo;</a>
                @else
                    <span>&raquo;</span>
                @endif
            </div>
        @endif
    @elseif($query)
        <div style="padding:60px 0;text-align:center">
            <div
                style="font-family:'Playfair Display',serif;font-size:24px;font-weight:700;color:#2A1818;margin-bottom:8px">
                No results found</div>
            <p style="font-size:12px;color:#9A8A84">Try different keywords or browse our categories below.</p>
        </div>
    @else
        <div style="padding:60px 0;text-align:center">
            <p style="font-size:12px;color:#9A8A84">Enter a search term above to find articles.</p>
        </div>
    @endif
@endsection
