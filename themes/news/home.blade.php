@extends('news::layouts.app')

@section('content')
    {{-- ── Hero Grid: Featured (674) + Sidebar (228) ────────────────────────── --}}
    @if ($featured->isNotEmpty())
        @php
            $hero = $featured->first();
            $sideItems = $featured->skip(1)->take(3);
        @endphp
        <div class="hero-grid">

            {{-- Featured Article --}}
            <div class="featured-card">
                <a href="{{ route('news.article.show', $hero->slug) }}">
                    <div class="img-block featured-img">
                        @if ($hero->getFirstMediaUrl('featured_image'))
                            <img src="{{ $hero->getFirstMediaUrl('featured_image') }}" alt="{{ $hero->title }}">
                        @endif
                    </div>
                </a>
                <div class="featured-content">
                    @if ($hero->category)
                        <a href="{{ route('news.category.show', $hero->category->slug) }}"
                            class="badge">{{ $hero->category->name }}</a>
                    @endif
                    <h1><a href="{{ route('news.article.show', $hero->slug) }}" style="color:inherit">{{ $hero->title }}</a>
                    </h1>
                    <div class="meta">
                        @if ($hero->author)
                            <span>{{ $hero->author->name }}</span><span class="sep">|</span>
                        @endif
                        <span>{{ $hero->published_at?->format('F j, Y') }}</span>
                    </div>
                </div>
            </div>

            {{-- Sidebar Cards --}}
            <div class="sidebar-cards">
                @foreach ($sideItems as $side)
                    <div class="sidebar-card">
                        <a href="{{ route('news.article.show', $side->slug) }}">
                            <div class="img-block sidebar-img">
                                @if ($side->getFirstMediaUrl('featured_image'))
                                    <img src="{{ $side->getFirstMediaUrl('featured_image') }}" alt="{{ $side->title }}">
                                @endif
                            </div>
                        </a>
                        @if ($side->category)
                            <a href="{{ route('news.category.show', $side->category->slug) }}"
                                class="badge">{{ $side->category->name }}</a>
                        @endif
                        <h3><a href="{{ route('news.article.show', $side->slug) }}"
                                style="color:inherit">{{ $side->title }}</a></h3>
                        <div class="meta">
                            @if ($side->author)
                                <span>{{ $side->author->name }}</span><span class="sep">|</span>
                            @endif
                            <span>{{ $side->published_at?->format('M j, Y') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endif

    {{-- ── Article Grid ──────────────────────────────────────────────────────── --}}
    <div class="article-grid">
        @foreach ($latest->take(8) as $article)
            <div class="article-card">
                <a href="{{ route('news.article.show', $article->slug) }}">
                    <div class="img-block article-img">
                        @if ($article->getFirstMediaUrl('featured_image'))
                            <img src="{{ $article->getFirstMediaUrl('featured_image') }}" alt="{{ $article->title }}">
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
                        <span>{{ $article->author->name }}</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{-- ── More Stories ──────────────────────────────────────────────────────── --}}
    @if ($latest->count() > 8)
        <div>
            <div class="section-head">More Stories</div>
            <div class="article-grid">
                @foreach ($latest->skip(8) as $article)
                    <div class="article-card">
                        <a href="{{ route('news.article.show', $article->slug) }}">
                            <div class="img-block article-img">
                                @if ($article->getFirstMediaUrl('featured_image'))
                                    <img src="{{ $article->getFirstMediaUrl('featured_image') }}"
                                        alt="{{ $article->title }}">
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
                                <span>{{ $article->author->name }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Pagination --}}
    @if ($latest->hasPages())
        <div class="pagination">
            @if ($latest->onFirstPage())
                <span>&laquo;</span>
            @else
                <a href="{{ $latest->previousPageUrl() }}">&laquo;</a>
            @endif

            @foreach ($latest->getUrlRange(max(1, $latest->currentPage() - 2), min($latest->lastPage(), $latest->currentPage() + 2)) as $page => $url)
                @if ($page == $latest->currentPage())
                    <span class="active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            @if ($latest->hasMorePages())
                <a href="{{ $latest->nextPageUrl() }}">&raquo;</a>
            @else
                <span>&raquo;</span>
            @endif
        </div>
    @endif
@endsection
