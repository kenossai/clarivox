<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! app(\App\Services\SeoService::class)->render() !!}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'Menlo', 'Courier New', monospace;
            background: #fff;
            color: #2A1818
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Playfair Display', Georgia, serif
        }

        a {
            text-decoration: none;
            color: inherit
        }

        .cx {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 32px
        }

        /* Top Bar */
        .topbar {
            height: 40px;
            border-bottom: 1px solid rgba(240, 234, 231, .4);
            display: flex;
            align-items: center
        }

        .topbar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%
        }

        .topbar-date {
            font-size: 11px;
            letter-spacing: .55px;
            color: #9A8A84
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 16px
        }

        .topbar-icon {
            color: #9A8A84;
            display: flex;
            align-items: center
        }

        .btn-nl {
            background: #E74607;
            color: #fff;
            font-family: 'Menlo', monospace;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 4px 10px;
            height: 23px;
            display: inline-flex;
            align-items: center;
            border: none;
            cursor: pointer
        }

        /* Header */
        .site-header {
            padding: 20px 0;
            border-bottom: 1px solid rgba(240, 234, 231, .4)
        }

        .site-header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .logo-name {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 48px;
            line-height: 1;
            letter-spacing: -1.2px;
            color: #2A1818
        }

        .logo-name span {
            color: #E74607
        }

        .logo-tag {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 2.25px;
            color: #9A8A84;
            margin-top: 4px
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .search-form {
            display: flex;
            align-items: center;
            border: 1px solid rgba(42, 24, 24, .2);
            height: 38px;
            width: 208px
        }

        .search-form input {
            flex: 1;
            border: none;
            outline: none;
            font-family: 'Menlo', monospace;
            font-size: 14px;
            color: #2A1818;
            padding: 0 12px;
            background: transparent
        }

        .search-form input::placeholder {
            color: #9A8A84
        }

        .search-form button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0 10px;
            color: #9A8A84;
            display: flex;
            align-items: center
        }

        .btn-sub {
            background: #E74607;
            color: #fff;
            font-family: 'Menlo', monospace;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            height: 35px;
            padding: 0 14px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center
        }

        /* Nav */
        .site-nav {
            border-bottom: 1px solid rgba(240, 234, 231, .4);
            padding: 16px 0 20px
        }

        .site-nav ul {
            display: flex;
            gap: 24px;
            list-style: none;
            overflow-x: auto;
            padding-bottom: 2px
        }

        .site-nav a {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .55px;
            color: #9A8A84;
            white-space: nowrap;
            padding-bottom: 4px;
            display: block
        }

        .site-nav a:hover,
        .site-nav a.active {
            color: #E74607;
            border-bottom: 2px solid #E74607
        }

        /* Shared */
        .badge {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #E74607;
            display: inline-block
        }

        .meta {
            font-size: 10px;
            color: #9A8A84;
            display: flex;
            align-items: center;
            gap: 6px
        }

        .meta .sep {
            opacity: .4
        }

        .img-block {
            background: #2A1818;
            overflow: hidden;
            flex-shrink: 0
        }

        .img-block img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block
        }

        /* Featured + Sidebar grid */
        .hero-grid {
            display: grid;
            grid-template-columns: 674fr 228fr;
            gap: 24px;
            margin-bottom: 24px
        }

        .featured-card {
            border-right: 1px solid rgba(240, 234, 231, .4);
            padding-right: 24px
        }

        .featured-img {
            height: 420px
        }

        .featured-content {
            padding-top: 16px
        }

        .featured-content h1 {
            font-size: 36px;
            font-weight: 700;
            line-height: 1.25;
            color: #2A1818;
            margin: 6px 0 12px
        }

        .sidebar-cards {
            display: flex;
            flex-direction: column;
            gap: 16px
        }

        .sidebar-card {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding-bottom: 16px;
            border-bottom: 1px solid rgba(240, 234, 231, .4)
        }

        .sidebar-card:last-child {
            border-bottom: none
        }

        .sidebar-img {
            height: 80px
        }

        .sidebar-card h3 {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.375;
            color: #2A1818
        }

        /* Article Grid */
        .article-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 32px
        }

        .article-card {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding-bottom: 12px
        }

        .article-img {
            height: 144px
        }

        .article-card h3 {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.375;
            color: #2A1818
        }

        .article-card h3 a:hover {
            color: #E74607
        }

        /* Section header */
        .section-head {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: #2A1818;
            padding-bottom: 12px;
            border-bottom: 2px solid #E74607;
            display: inline-block;
            margin-bottom: 20px
        }

        /* Pagination */
        .pagination {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-top: 24px
        }

        .pagination a,
        .pagination span {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: #9A8A84;
            padding: 6px 10px;
            border: 1px solid rgba(42, 24, 24, .15)
        }

        .pagination a:hover,
        .pagination .active {
            background: #E74607;
            color: #fff;
            border-color: #E74607
        }

        /* Footer */
        .site-footer {
            background: #2A1818;
            color: #F0EAE7;
            padding: 40px 0 24px;
            margin-top: 48px
        }

        .footer-inner {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 32px;
            margin-bottom: 32px
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 28px;
            color: #F0EAE7;
            margin-bottom: 8px
        }

        .footer-logo span {
            color: #E74607
        }

        .footer-about {
            font-size: 11px;
            color: #9A8A84;
            line-height: 1.6
        }

        .footer-col h4 {
            font-family: 'Menlo', monospace;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #E74607;
            margin-bottom: 12px
        }

        .footer-col a {
            display: block;
            font-size: 11px;
            color: #9A8A84;
            margin-bottom: 8px
        }

        .footer-col a:hover {
            color: #F0EAE7
        }

        .footer-bottom {
            border-top: 1px solid rgba(240, 234, 231, .1);
            padding-top: 20px;
            font-size: 10px;
            color: #9A8A84;
            letter-spacing: .5px;
            text-transform: uppercase
        }

        @media(max-width:900px) {
            .hero-grid {
                grid-template-columns: 1fr
            }

            .article-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .logo-name {
                font-size: 32px
            }

            .header-right {
                display: none
            }

            .cx {
                padding: 0 16px
            }

            .footer-inner {
                grid-template-columns: 1fr
            }
        }

        @media(max-width:480px) {
            .article-grid {
                grid-template-columns: 1fr
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    {{-- Top Bar --}}
    <div class="topbar">
        <div class="cx">
            <div class="topbar-inner">
                <span class="topbar-date">{{ now()->format('l, F j, Y') }}</span>
                <div class="topbar-actions">
                    <a href="#" class="topbar-icon" aria-label="Twitter">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.7 5.5 4.4 9 4.5-.9-4.2 4-6.5 7-3.8 1.1 0 3-1.2 3-1.7z" />
                        </svg>
                    </a>
                    <a href="#" class="topbar-icon" aria-label="LinkedIn">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                            <rect x="2" y="9" width="4" height="12" />
                            <circle cx="4" cy="4" r="2" />
                        </svg>
                    </a>
                    <a href="#" class="topbar-icon" aria-label="Notifications">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                            <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                        </svg>
                    </a>
                    <a href="{{ route('news.newsletter.subscribe') }}" class="btn-nl">Newsletter</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Site Header --}}
    <header class="site-header">
        <div class="cx">
            <div class="site-header-inner">
                <a href="{{ route('news.home') }}">
                    @php
                        $siteName = $currentSite?->name ?? 'Clarivox News';
                        $words = explode(' ', $siteName);
                        $first = $words[0] ?? $siteName;
                        $rest = implode(' ', array_slice($words, 1));
                    @endphp
                    <div class="logo-name">{{ $first }}<span>{{ $rest ? ' ' . $rest : '' }}</span></div>
                    <div class="logo-tag">{{ $currentSite?->getSetting('tagline', 'Breaking News & Analysis') }}</div>
                </a>
                <div class="header-right">
                    <form action="{{ route('news.search') }}" method="GET" class="search-form">
                        <input type="text" name="q" placeholder="Search…" value="{{ request('q') }}">
                        <button type="submit" aria-label="Search">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                        </button>
                    </form>
                    <a href="#newsletter" class="btn-sub">Subscribe</a>
                </div>
            </div>
        </div>
    </header>

    {{-- Category Navigation --}}
    <nav class="site-nav">
        <div class="cx">
            <ul>
                <li><a href="{{ route('news.home') }}"
                        class="{{ request()->routeIs('news.home') ? 'active' : '' }}">All</a></li>
                @foreach (\App\Models\Category::where('status', 'published')->orderBy('sort_order')->take(10)->get() as $navCat)
                    <li>
                        <a href="{{ route('news.category.show', $navCat->slug) }}"
                            class="{{ request()->route('slug') === $navCat->slug ? 'active' : '' }}">
                            {{ $navCat->name }}
                        </a>
                    </li>
                @endforeach
                <li><a href="#">About</a></li>
            </ul>
        </div>
    </nav>

    {{-- Page Content --}}
    <main style="padding:24px 0">
        <div class="cx">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="site-footer" id="newsletter">
        <div class="cx">
            <div class="footer-inner">
                <div>
                    @php
                        $sn = $currentSite?->name ?? 'Clarivox News';
                        $sw = explode(' ', $sn);
                    @endphp
                    <div class="footer-logo">
                        {{ $sw[0] ?? $sn }}<span>{{ count($sw) > 1 ? ' ' . implode(' ', array_slice($sw, 1)) : '' }}</span>
                    </div>
                    <p class="footer-about">
                        {{ $currentSite?->getSetting('about', 'Your trusted source for breaking news and in-depth analysis.') }}
                    </p>
                    <form action="{{ route('news.newsletter.subscribe') }}" method="POST"
                        style="margin-top:20px;display:flex;gap:0">
                        @csrf
                        <input type="email" name="email" placeholder="your@email.com" required
                            style="flex:1;border:none;padding:0 12px;font-family:'Menlo',monospace;font-size:11px;height:35px;outline:none;border:1px solid rgba(240,234,231,.2)">
                        <button type="submit" class="btn-sub" style="flex-shrink:0">Subscribe</button>
                    </form>
                </div>
                <div class="footer-col">
                    <h4>Categories</h4>
                    @foreach (\App\Models\Category::where('status', 'published')->take(6)->get() as $fc)
                        <a href="{{ route('news.category.show', $fc->slug) }}">{{ $fc->name }}</a>
                    @endforeach
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <a href="{{ route('news.home') }}">Home</a>
                    <a href="{{ route('news.search') }}">Search</a>
                    <a href="{{ route('news.sitemap') }}">Sitemap</a>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; {{ date('Y') }} {{ $currentSite?->name ?? config('app.name') }}. All rights reserved.
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>

</html>
