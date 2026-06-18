<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Apply saved theme before first paint to avoid flash --}}
    <script>
        (function() {
            var t = localStorage.getItem('cx-theme');
            if (t === 'dark' || t === 'light') {
                document.documentElement.setAttribute('data-theme', t);
            }
        })();
    </script>

    {!! app(\App\Services\SeoService::class)->render() !!}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <style>
        /* ── Theme Variables ─────────────────────────────────────────── */
        :root {
            --bg: #fff;
            --bg-elevated: #F8F4F2;
            --text: #2A1818;
            --text-muted: #9A8A84;
            --accent: #E74607;
            --border: rgba(42, 24, 24, .15);
            --border-light: rgba(42, 24, 24, .12);
            --img-bg: #2A1818;
            --footer-bg: #2A1818;
            --footer-text: #F0EAE7;
            --footer-border: rgba(240, 234, 231, .2);
            --footer-border-subtle: rgba(240, 234, 231, .1);
            --input-bg: #fff;
            --input-color: #2A1818;
        }

        [data-theme="dark"] {
            --bg: #141414;
            --bg-elevated: #1e1e1e;
            --text: #F0EAE7;
            --text-muted: #7a7a7a;
            --accent: #E74607;
            --border: rgba(240, 234, 231, .15);
            --border-light: rgba(240, 234, 231, .12);
            --img-bg: #222;
            --footer-bg: #0a0a0a;
            --footer-text: #F0EAE7;
            --footer-border: rgba(240, 234, 231, .15);
            --footer-border-subtle: rgba(240, 234, 231, .08);
            --input-bg: #1e1e1e;
            --input-color: #F0EAE7;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'Montserrat', 'Courier New', monospace;
            background: var(--bg);
            color: var(--text)
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Montserrat', Georgia, serif
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
            border-bottom: 1px solid var(--border-light);
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
            color: var(--text-muted)
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 16px
        }

        .topbar-icon {
            color: var(--text-muted);
            display: flex;
            align-items: center
        }

        .btn-nl {
            background: var(--accent);
            color: #fff;
            font-family: 'Montserrat', monospace;
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

        /* Theme Toggle */
        .theme-toggle {
            background: none;
            border: 1px solid var(--border-light);
            color: var(--text-muted);
            width: 26px;
            height: 26px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 0
        }

        .theme-toggle:hover {
            color: var(--accent);
            border-color: var(--accent)
        }

        .theme-toggle .icon-sun {
            display: none
        }

        .theme-toggle .icon-moon {
            display: flex
        }

        [data-theme="dark"] .theme-toggle .icon-sun {
            display: flex
        }

        [data-theme="dark"] .theme-toggle .icon-moon {
            display: none
        }

        /* Header */
        .site-header {
            padding: 20px 0;
            border-bottom: 1px solid var(--border-light)
        }

        .site-header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .logo-name {
            font-family: 'Montserrat', serif;
            font-weight: 900;
            font-size: 48px;
            line-height: 1;
            letter-spacing: -1.2px;
            color: var(--text)
        }

        .logo-name span {
            color: var(--accent)
        }

        .logo-tag {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 2.25px;
            color: var(--text-muted);
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
            border: 1px solid var(--border);
            height: 38px;
            width: 208px;
            background: var(--input-bg)
        }

        .search-form input {
            flex: 1;
            border: none;
            outline: none;
            font-family: 'Montserrat', monospace;
            font-size: 14px;
            color: var(--input-color);
            padding: 0 12px;
            background: transparent
        }

        .search-form input::placeholder {
            color: var(--text-muted)
        }

        .search-form button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0 10px;
            color: var(--text-muted);
            display: flex;
            align-items: center
        }

        .header-right .btn-search {
            background: var(--accent);
            color: #fff;
            font-family: 'Montserrat', monospace;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            height: 35px;
            padding: 13px 14px;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center
        }

        /* Nav */
        .site-nav {
            border-bottom: 1px solid var(--border-light);
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
            color: var(--text-muted);
            white-space: nowrap;
            padding-bottom: 4px;
            display: block
        }

        .site-nav a:hover,
        .site-nav a.active {
            color: var(--accent);
            border-bottom: 2px solid var(--accent)
        }

        /* Shared */
        .badge {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--accent);
            display: inline-block
        }

        .meta {
            font-size: 10px;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 6px
        }

        .meta .sep {
            opacity: .4
        }

        .img-block {
            background: var(--img-bg);
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
            border-right: 1px solid var(--border-light);
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
            color: var(--text);
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
            border-bottom: 1px solid var(--border-light)
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
            color: var(--text)
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
            color: var(--text)
        }

        .article-card h3 a:hover {
            color: var(--accent)
        }

        /* Section header */
        .section-head {
            font-family: 'Montserrat', serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
            padding-bottom: 12px;
            border-bottom: 2px solid var(--accent);
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
            color: var(--text-muted);
            padding: 6px 10px;
            border: 1px solid var(--border)
        }

        .pagination a:hover,
        .pagination .active {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent)
        }

        /* Footer */
        .site-footer {
            background: var(--footer-bg);
            color: var(--footer-text);
            padding: 48px 0 0;
            margin-top: 48px
        }

        .footer-inner {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            padding-bottom: 40px
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 28px;
            color: var(--footer-text);
            margin-bottom: 6px
        }

        .footer-logo span {
            color: var(--accent)
        }

        .footer-tagline {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-muted);
            margin-bottom: 12px
        }

        .footer-about {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 16px
        }

        .footer-social {
            display: flex;
            gap: 12px;
            align-items: center
        }

        .footer-social a {
            color: var(--text-muted);
            display: flex;
            align-items: center
        }

        .footer-social a:hover {
            color: var(--footer-text)
        }

        .footer-col h4 {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            margin-bottom: 16px
        }

        .footer-col a {
            display: block;
            font-size: 12px;
            color: var(--footer-text);
            margin-bottom: 10px;
            opacity: .7
        }

        .footer-col a:hover {
            opacity: 1
        }

        .footer-bottom {
            border-top: 1px solid var(--footer-border-subtle);
            padding: 16px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 10px;
            color: var(--text-muted);
            letter-spacing: .5px
        }

        .footer-locations {
            display: flex;
            gap: 16px
        }

        .footer-locations a {
            font-size: 10px;
            color: var(--text-muted);
            letter-spacing: .3px
        }

        .footer-locations a:hover {
            color: var(--footer-text)
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
                grid-template-columns: 1fr 1fr
            }

            .footer-bottom {
                flex-direction: column;
                gap: 10px;
                text-align: center
            }
        }

        @media(max-width:480px) {
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
                    <a href="{{ route('news.subscribe') }}" class="btn-nl">Newsletter</a>
                    <button class="theme-toggle" id="themeToggle" aria-label="Toggle dark mode">
                        {{-- Sun icon (shown in dark mode) --}}
                        <svg class="icon-sun" width="13" height="13" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="5" />
                            <line x1="12" y1="1" x2="12" y2="3" />
                            <line x1="12" y1="21" x2="12" y2="23" />
                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                            <line x1="1" y1="12" x2="3" y2="12" />
                            <line x1="21" y1="12" x2="23" y2="12" />
                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
                        </svg>
                        {{-- Moon icon (shown in light mode) --}}
                        <svg class="icon-moon" width="13" height="13" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" />
                        </svg>
                    </button>
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
                        <button type="submit" aria-label="Search" class="btn-search">
                            Search
                        </button>
                    </form>
                    {{-- <a href="#newsletter" class="btn-sub">Search</a> --}}
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
                <li><a href="{{ route('news.about') }}"
                        class="{{ request()->routeIs('news.about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('news.subscribe') }}"
                        class="{{ request()->routeIs('news.subscribe') ? 'active' : '' }}"
                        style="{{ request()->routeIs('news.subscribe') ? '' : 'color:var(--accent)' }}">Subscribe</a>
                </li>
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
    <footer class="site-footer">
        <div class="cx">
            <div class="footer-inner">

                {{-- Col 1: Brand --}}
                <div>
                    @php
                        $sn = $currentSite?->name ?? config('app.name');
                        $sw = explode(' ', $sn);
                    @endphp
                    <div class="footer-logo">
                        {{ $sw[0] ?? $sn }}<span>{{ count($sw) > 1 ? ' ' . implode(' ', array_slice($sw, 1)) : '' }}</span>
                    </div>
                    <div class="footer-tagline">
                        {{ $currentSite?->getSetting('tagline', "Africa's Technology of Record") }}</div>
                    <p class="footer-about">
                        {{ $currentSite?->getSetting('about', 'Covering the startups, policies, and people shaping the continent\'s digital future.') }}
                    </p>
                    <div class="footer-social">
                        <a href="#" aria-label="Twitter/X">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.7 5.5 4.4 9 4.5-.9-4.2 4-6.5 7-3.8 1.1 0 3-1.2 3-1.7z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="Facebook">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                        </a>
                        <a href="#" aria-label="LinkedIn">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                <rect x="2" y="9" width="4" height="12" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                        <a href="#" aria-label="Instagram">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Col 2: Sections --}}
                <div class="footer-col">
                    <h4>Sections</h4>
                    @foreach (\App\Models\Category::where('status', 'published')->orderBy('sort_order')->take(6)->get() as $fc)
                        <a href="{{ route('news.category.show', $fc->slug) }}">{{ $fc->name }}</a>
                    @endforeach
                </div>

                {{-- Col 3: Company --}}
                <div class="footer-col">
                    <h4>Company</h4>
                    <a href="{{ route('news.about') }}">About</a>
                    <a href="{{ route('news.subscribe') }}">Subscribe</a>
                    <a href="#">Careers</a>
                    <a href="#">Advertise</a>
                    <a href="#">Contact</a>
                </div>

                {{-- Col 4: Legal --}}
                <div class="footer-col">
                    <h4>Legal</h4>
                    <a href="#">Terms of Service</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Cookie Policy</a>
                    <a href="#">Editorial Standards</a>
                </div>

            </div>

            <div class="footer-bottom">
                <span>&copy; {{ date('Y') }} {{ $currentSite?->name ?? config('app.name') }} Media Ltd. All rights
                    reserved.</span>
                <div class="footer-locations">
                    <a href="#">Lagos</a>
                    <a href="#">Nairobi</a>
                    <a href="#">Accra</a>
                    <a href="#">Cairo</a>
                    <a href="#">Johannesburg</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')

    <script>
        (function() {
            var btn = document.getElementById('themeToggle');
            if (!btn) return;
            btn.addEventListener('click', function() {
                var html = document.documentElement;
                var current = html.getAttribute('data-theme');
                var next = current === 'dark' ? 'light' : 'dark';
                html.setAttribute('data-theme', next);
                try {
                    localStorage.setItem('cx-theme', next);
                } catch (e) {}
            });
        })();
    </script>
</body>

</html>
