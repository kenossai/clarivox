@extends('news::layouts.app')

@push('styles')
    <style>
        /* ── Full-width Hero ──────────────────────────────────────── */
        .hero-full {
            display: grid;
            grid-template-columns: 3fr 2fr;
            gap: 0;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 32px
        }

        .hero-feature {
            padding-right: 32px;
            border-right: 1px solid var(--border-light)
        }

        .hero-feature-img {
            height: 360px;
            background: var(--img-bg);
            overflow: hidden;
            margin-bottom: 20px
        }

        .hero-feature-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block
        }

        .hero-feature h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            line-height: 1.25;
            color: var(--text);
            margin: 8px 0 12px
        }

        .hero-feature h1 a:hover {
            color: var(--accent)
        }

        .hero-stack {
            padding-left: 28px;
            display: flex;
            flex-direction: column
        }

        .hero-stack-card {
            display: flex;
            gap: 14px;
            padding: 16px 0;
            border-bottom: 1px solid var(--border-light);
            align-items: flex-start
        }

        .hero-stack-card:first-child {
            padding-top: 0
        }

        .hero-stack-card:last-child {
            border-bottom: none
        }

        .hero-stack-thumb {
            width: 160px;
            height: 100px;
            flex-shrink: 0;
            background: var(--img-bg);
            overflow: hidden
        }

        .hero-stack-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block
        }

        .hero-stack-text h3 {
            font-family: 'Playfair Display', serif;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--text);
            margin: 4px 0 6px
        }

        .hero-stack-text h3 a:hover {
            color: var(--accent)
        }

        /* ── 2-col Home Layout ────────────────────────────────────── */
        .home-layout {
            display: grid;
            grid-template-columns: 1fr 260px;
            gap: 40px;
            align-items: start
        }

        .home-main {
            min-width: 0
        }

        .home-sidebar {
            position: sticky;
            top: 24px
        }

        /* ── Article grid (inside main) ───────────────────────────── */
        .main-article-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px
        }

        .main-article-card {
            display: flex;
            flex-direction: column;
            gap: 8px
        }

        .main-article-img {
            height: 128px;
            background: var(--img-bg);
            overflow: hidden
        }

        .main-article-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block
        }

        .main-article-card h3 {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--text)
        }

        .main-article-card h3 a:hover {
            color: var(--accent)
        }

        /* ── Section divider ──────────────────────────────────────── */
        .section-divider {
            border: none;
            border-top: 1px solid var(--border-light);
            margin: 28px 0 20px
        }

        .section-label {
            font-family: 'Menlo', monospace;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: var(--text-muted);
            border-left: 3px solid var(--accent);
            padding-left: 8px;
            margin-bottom: 20px
        }

        /* ── Editor's Picks ───────────────────────────────────────── */
        .picks-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px
        }

        .picks-card {
            padding: 16px 0;
            border-top: 1px solid var(--border-light)
        }

        .picks-cats {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 8px;
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .8px
        }

        .picks-cats .cat-primary {
            color: var(--accent);
            font-weight: 700
        }

        .picks-cats .cat-sep {
            color: var(--text-muted)
        }

        .picks-cats .cat-secondary {
            color: var(--text-muted)
        }

        .picks-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--text)
        }

        .picks-card h3 a:hover {
            color: var(--accent)
        }

        /* ── Sidebar Widgets ──────────────────────────────────────── */
        .sidebar-widget {
            border-top: 2px solid var(--accent);
            padding-top: 14px;
            margin-bottom: 28px
        }

        .sidebar-widget-title {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--accent);
            margin-bottom: 14px
        }

        .nl-box h3 {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            line-height: 1.3;
            color: var(--text);
            margin-bottom: 8px
        }

        .nl-box p {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 14px
        }

        .nl-box input[type="email"] {
            display: block;
            width: 100%;
            border: 1px solid var(--border);
            background: var(--input-bg);
            color: var(--input-color);
            font-family: 'Menlo', monospace;
            font-size: 11px;
            padding: 9px 12px;
            outline: none;
            margin-bottom: 6px
        }

        .nl-box input[type="email"]:focus {
            border-color: var(--accent)
        }

        .nl-box button {
            width: 100%;
            background: var(--accent);
            color: #fff;
            font-family: 'Menlo', monospace;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 10px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px
        }

        /* Trending */
        .trending-item {
            display: flex;
            gap: 14px;
            padding: 10px 0;
            border-bottom: 1px solid var(--border-light);
            align-items: flex-start
        }

        .trending-item:last-child {
            border-bottom: none
        }

        .trending-num {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--border);
            flex-shrink: 0;
            line-height: 1;
            min-width: 18px
        }

        .trending-item h4 {
            font-size: 12px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--text)
        }

        .trending-item h4 a:hover {
            color: var(--accent)
        }

        /* Browse Topics */
        .topics-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 6px
        }

        .topic-tag {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            letter-spacing: .8px;
            text-transform: uppercase;
            color: var(--text-muted);
            border: 1px solid var(--border);
            padding: 5px 10px;
            transition: all .15s
        }

        .topic-tag:hover {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent)
        }

        /* ── Responsive ───────────────────────────────────────────── */
        @media(max-width:1100px) {
            .main-article-grid {
                grid-template-columns: repeat(2, 1fr)
            }
        }

        @media(max-width:900px) {
            .hero-full {
                grid-template-columns: 1fr
            }

            .hero-feature {
                padding-right: 0;
                border-right: none;
                border-bottom: 1px solid var(--border-light);
                padding-bottom: 24px
            }

            .hero-stack {
                padding-left: 0;
                padding-top: 20px
            }

            .home-layout {
                grid-template-columns: 1fr
            }

            .home-sidebar {
                position: static
            }

            .picks-grid {
                grid-template-columns: 1fr
            }
        }
    </style>
@endpush

@section('content')

    {{-- ── Full-width Hero ────────────────────────────────────────── --}}
    @if ($featured->isNotEmpty())
        @php
            $hero = $featured->first();
            $sideItems = $featured->skip(1)->take(3);
        @endphp
        <div class="hero-full">

            {{-- Big featured article --}}
            <div class="hero-feature">
                <a href="{{ route('news.article.show', $hero->slug) }}">
                    <div class="hero-feature-img">
                        @if ($hero->featured_image_url)
                            <img src="{{ $hero->featured_image_url }}" alt="{{ $hero->title }}">
                        @endif
                    </div>
                </a>
                @if ($hero->category)
                    <a href="{{ route('news.category.show', $hero->category->slug) }}"
                        class="badge">{{ $hero->category->name }}</a>
                @endif
                <h1><a href="{{ route('news.article.show', $hero->slug) }}" style="color:inherit">{{ $hero->title }}</a>
                </h1>
                <div class="meta">
                    @if ($hero->author)
                        <span>{{ $hero->author->name }}</span>
                        <span class="sep">|</span>
                    @endif
                    <span>{{ $hero->published_at?->format('F j, Y') }}</span>
                </div>
            </div>

            {{-- Stacked mini-cards --}}
            <div class="hero-stack">
                @foreach ($sideItems as $side)
                    <div class="hero-stack-card">
                        <a href="{{ route('news.article.show', $side->slug) }}">
                            <div class="hero-stack-thumb">
                                @if ($side->featured_image_url)
                                    <img src="{{ $side->featured_image_url }}" alt="{{ $side->title }}">
                                @endif
                            </div>
                        </a>
                        <div class="hero-stack-text">
                            @if ($side->category)
                                <a href="{{ route('news.category.show', $side->category->slug) }}" class="badge"
                                    style="font-size:9px">{{ $side->category->name }}</a>
                            @endif
                            <h3><a href="{{ route('news.article.show', $side->slug) }}"
                                    style="color:inherit">{{ $side->title }}</a></h3>
                            <div class="meta">
                                @if ($side->author)
                                    <span>{{ $side->author->name }}</span>
                                    <span class="sep">|</span>
                                @endif
                                <span>{{ $side->published_at?->format('M j, Y') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    @endif

    {{-- ── Main + Sidebar ─────────────────────────────────────────── --}}
    <div class="home-layout">

        {{-- Main column --}}
        <div class="home-main">

            {{-- Latest Articles --}}
            <div class="main-article-grid">
                @foreach ($latest->take(8) as $article)
                    <div class="main-article-card">
                        <a href="{{ route('news.article.show', $article->slug) }}">
                            <div class="main-article-img">
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
                                <span>{{ $article->author->name }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- More Stories --}}
            @if ($latest->count() > 8)
                <hr class="section-divider">
                <div class="section-label">More Stories</div>
                <div class="main-article-grid">
                    @foreach ($latest->skip(8) as $article)
                        <div class="main-article-card">
                            <a href="{{ route('news.article.show', $article->slug) }}">
                                <div class="main-article-img">
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
                                    <span>{{ $article->author->name }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Editor's Picks --}}
            @if (isset($editorsPicks) && $editorsPicks->isNotEmpty())
                <hr class="section-divider">
                <div class="section-label">Editor's Picks</div>
                <div class="picks-grid">
                    @foreach ($editorsPicks->take(4) as $pick)
                        <div class="picks-card">
                            <div class="picks-cats">
                                @if ($pick->tags->isNotEmpty())
                                    <span class="cat-primary">{{ strtoupper($pick->tags->first()->name) }}</span>
                                    <span class="cat-sep">/</span>
                                @endif
                                @if ($pick->category)
                                    <span class="cat-secondary">{{ strtoupper($pick->category->name) }}</span>
                                @endif
                            </div>
                            <h3><a href="{{ route('news.article.show', $pick->slug) }}"
                                    style="color:inherit">{{ $pick->title }}</a></h3>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Pagination --}}
            @if ($latest->hasPages())
                <div class="pagination" style="margin-top:28px">
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

        </div>

        {{-- Right Sidebar --}}
        <aside class="home-sidebar">

            {{-- Daily Briefing --}}
            <div class="sidebar-widget">
                <div class="sidebar-widget-title">Daily Briefing</div>
                <div class="nl-box">
                    <h3>Get the best stories delivered daily.</h3>
                    <p>Join {{ number_format($currentSite?->newsletterSubscribers()->count() ?? 0) }}+ founders,
                        investors, and builders.</p>
                    <form action="{{ route('news.newsletter.subscribe') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="your@email.com" required>
                        <button type="submit">
                            Subscribe Free
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <polyline points="12 5 19 12 12 19" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Trending --}}
            @if ($trending->isNotEmpty())
                <div class="sidebar-widget">
                    <div class="sidebar-widget-title">Trending</div>
                    @foreach ($trending as $i => $t)
                        <div class="trending-item">
                            <span class="trending-num">{{ $i + 1 }}</span>
                            <div>
                                @if ($t->category)
                                    <a href="{{ route('news.category.show', $t->category->slug) }}" class="badge"
                                        style="font-size:9px;display:inline-block;margin-bottom:4px">{{ $t->category->name }}</a>
                                @endif
                                <h4><a href="{{ route('news.article.show', $t->slug) }}"
                                        style="color:inherit">{{ $t->title }}</a></h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Browse Topics --}}
            @if ($categories->isNotEmpty())
                <div class="sidebar-widget">
                    <div class="sidebar-widget-title">Browse Topics</div>
                    <div class="topics-grid">
                        @foreach ($categories as $cat)
                            <a href="{{ route('news.category.show', $cat->slug) }}"
                                class="topic-tag">{{ $cat->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endif

        </aside>

    </div>

@endsection
