@extends('news::layouts.app')

@push('styles')
    <style>
        /* ── About Hero ──────────────────────────────────── */
        .about-hero {
            padding: 72px 0 64px;
            border-bottom: 1px solid var(--border-light)
        }

        .about-hero-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: center
        }

        .about-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 56px;
            font-weight: 900;
            line-height: 1.1;
            letter-spacing: -1.5px;
            color: var(--text)
        }

        .about-hero p {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.75;
            margin-top: 20px
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1px;
            background: var(--border-light)
        }

        .stat-cell {
            background: var(--bg);
            padding: 28px 24px
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 40px;
            font-weight: 900;
            color: var(--accent);
            line-height: 1
        }

        .stat-label {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            margin-top: 6px
        }

        /* ── Mission ─────────────────────────────────────── */
        .mission-section {
            padding: 72px 0;
            border-bottom: 1px solid var(--border-light)
        }

        .mission-inner {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 64px;
            align-items: start
        }

        .mission-label {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--accent);
            border-left: 2px solid var(--accent);
            padding-left: 12px
        }

        .mission-quote {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            line-height: 1.4;
            color: var(--text);
            margin-bottom: 24px
        }

        .mission-body p {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.8;
            margin-bottom: 1em
        }

        /* ── Values ──────────────────────────────────────── */
        .values-section {
            padding: 72px 0;
            border-bottom: 1px solid var(--border-light)
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
            margin-top: 40px
        }

        .value-card .value-num {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            color: var(--accent);
            letter-spacing: 1px;
            margin-bottom: 12px
        }

        .value-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 10px
        }

        .value-card p {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.7
        }

        /* ── Newsroom ─────────────────────────────────────── */
        .newsroom-section {
            padding: 72px 0;
            border-bottom: 1px solid var(--border-light)
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-top: 40px
        }

        .team-card .team-img {
            height: 180px;
            background: var(--img-bg);
            overflow: hidden;
            margin-bottom: 12px
        }

        .team-card .team-img img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .team-card h4 {
            font-size: 14px;
            font-weight: 700;
            color: var(--text)
        }

        .team-card span {
            font-size: 10px;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: .8px
        }

        /* ── Where We Are ──────────────────────────────────── */
        .locations-section {
            padding: 64px 0;
            border-bottom: 1px solid var(--border-light)
        }

        .locations-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 0;
            margin-top: 40px;
            border: 1px solid var(--border-light)
        }

        .location-cell {
            padding: 24px 20px;
            border-right: 1px solid var(--border-light)
        }

        .location-cell:last-child {
            border-right: none
        }

        .location-type {
            font-family: 'Menlo', monospace;
            font-size: 8px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 8px
        }

        .location-city {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--text)
        }

        .location-country {
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 4px
        }

        /* ── CTA Blocks ───────────────────────────────────── */
        .cta-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            margin-top: 64px;
            margin-bottom: 0
        }

        .cta-block {
            padding: 48px 40px
        }

        .cta-block.cta-subscribe {
            background: var(--accent)
        }

        .cta-block.cta-advertise {
            background: var(--bg-elevated);
            border: 1px solid var(--border-light)
        }

        .cta-eyebrow {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 12px
        }

        .cta-subscribe .cta-eyebrow {
            color: rgba(255, 255, 255, .7)
        }

        .cta-advertise .cta-eyebrow {
            color: var(--accent)
        }

        .cta-block h2 {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 10px
        }

        .cta-subscribe h2 {
            color: #fff
        }

        .cta-advertise h2 {
            color: var(--text)
        }

        .cta-block p {
            font-size: 11px;
            line-height: 1.6;
            margin-bottom: 20px
        }

        .cta-subscribe p {
            color: rgba(255, 255, 255, .75)
        }

        .cta-advertise p {
            color: var(--text-muted)
        }

        .cta-link {
            font-family: 'Menlo', monospace;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            gap: 6px
        }

        .cta-subscribe .cta-link {
            color: #fff;
            border-bottom: 1px solid rgba(255, 255, 255, .4);
            padding-bottom: 2px
        }

        .cta-advertise .cta-link {
            color: var(--accent);
            border-bottom: 1px solid var(--accent);
            padding-bottom: 2px
        }

        .cta-link:hover {
            opacity: .8
        }

        /* Responsive */
        @media(max-width:900px) {

            .about-hero-inner,
            .mission-inner {
                grid-template-columns: 1fr
            }

            .values-grid,
            .team-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .locations-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .location-cell {
                border-bottom: 1px solid var(--border-light)
            }

            .cta-row {
                grid-template-columns: 1fr
            }

            .about-hero h1 {
                font-size: 36px
            }
        }

        @media(max-width:480px) {

            .values-grid,
            .team-grid {
                grid-template-columns: 1fr
            }
        }
    </style>
@endpush

@section('content')

    {{-- ── Hero ──────────────────────────────────────────── --}}
    <div class="about-hero">
        <div class="about-hero-inner">
            <div>
                <span class="badge">About {{ $currentSite?->name ?? config('app.name') }}</span>
                <h1>{{ $currentSite?->getSetting('about_headline', "Africa's Technology of Record.") }}</h1>
                <p>{{ $currentSite?->getSetting('about', 'Since 2012, we have been the definitive source for technology news — covering the startups, policies, capital flows, and people shaping the digital economy.') }}
                </p>
            </div>
            <div class="stats-grid">
                <div class="stat-cell">
                    <div class="stat-number">{{ $currentSite?->getSetting('stat_years', date('Y') - 2012) }}</div>
                    <div class="stat-label">Years of Coverage</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-number">{{ number_format($subscriberCount) }}+</div>
                    <div class="stat-label">Newsletter Subscribers</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-number">{{ $currentSite?->getSetting('stat_readers', '2.4M') }}</div>
                    <div class="stat-label">Monthly Readers</div>
                </div>
                <div class="stat-cell">
                    <div class="stat-number">{{ $currentSite?->getSetting('stat_countries', '34') }}</div>
                    <div class="stat-label">Countries Covered</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Mission ──────────────────────────────────────── --}}
    <div class="mission-section">
        <div class="mission-inner">
            <div class="mission-label">Our Mission</div>
            <div class="mission-body">
                <div class="mission-quote">
                    "{{ $currentSite?->getSetting('mission_quote', 'We exist to tell the stories of technology with the rigour, depth, and respect they deserve — for the builders, investors, policymakers, and citizens.') }}"
                </div>
                <p>{{ $currentSite?->getSetting('mission_body_1', 'For too long, technology was reported as a curiosity. We were founded to change that. We report on tech as what it actually is: one of the most dynamic, consequential, and financially significant markets in the world.') }}
                </p>
                <p>{{ $currentSite?->getSetting('mission_body_2', 'Our readers include the founders building the next generation of companies, the investors allocating capital, the policymakers writing the rules of the digital economy, and the citizens whose lives are being transformed every day.') }}
                </p>
            </div>
        </div>
    </div>

    {{-- ── Editorial Values ────────────────────────────── --}}
    <div class="values-section">
        <div class="section-head">Our Editorial Values</div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-num">#1</div>
                <h3>Independence</h3>
                <p>{{ $currentSite?->getSetting('value_independence', 'We accept no funding from the companies we cover. Our newsroom operates independently of commercial interests, funded by subscriptions, advertising, and events.') }}
                </p>
            </div>
            <div class="value-card">
                <div class="value-num">#2</div>
                <h3>Accuracy</h3>
                <p>{{ $currentSite?->getSetting('value_accuracy', 'Every fact is sourced and verified. We correct errors prominently and promptly. Our editorial standards document is published openly on this site.') }}
                </p>
            </div>
            <div class="value-card">
                <div class="value-num">#3</div>
                <h3>Local-First</h3>
                <p>{{ $currentSite?->getSetting('value_local', 'We cover technology on its own terms — not as a derivative of Silicon Valley, but as an ecosystem with its own dynamics, capital flows, and stories worth telling.') }}
                </p>
            </div>
            <div class="value-card">
                <div class="value-num">#4</div>
                <h3>Accountability</h3>
                <p>{{ $currentSite?->getSetting('value_accountability', 'We hold power to account — whether that is a government regulator, a venture-backed startup, or a tech platform operating across the continent.') }}
                </p>
            </div>
        </div>
    </div>

    {{-- ── Newsroom / Team ─────────────────────────────── --}}
    @if ($authors->isNotEmpty())
        <div class="newsroom-section">
            <div class="section-head">The Newsroom</div>
            <div class="team-grid">
                @foreach ($authors as $author)
                    <a href="{{ route('news.author.show', $author->slug) }}" class="team-card">
                        <div class="team-img">
                            @if ($author->getFirstMediaUrl('avatar'))
                                <img src="{{ $author->getFirstMediaUrl('avatar') }}" alt="{{ $author->name }}">
                            @endif
                        </div>
                        <h4>{{ $author->name }}</h4>
                        @if ($author->bio)
                            <span>{{ Str::words($author->bio, 4, '') }}</span>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    {{-- ── Where We Are ────────────────────────────────── --}}
    <div class="locations-section">
        <div class="section-head">Where We Are</div>
        <div class="locations-grid">
            <div class="location-cell">
                <div class="location-type">Headquarters</div>
                <div class="location-city">Lagos</div>
                <div class="location-country">Nigeria</div>
            </div>
            <div class="location-cell">
                <div class="location-type">East Africa Bureau</div>
                <div class="location-city">Nairobi</div>
                <div class="location-country">Kenya</div>
            </div>
            <div class="location-cell">
                <div class="location-type">West Africa Bureau</div>
                <div class="location-city">Accra</div>
                <div class="location-country">Ghana</div>
            </div>
            <div class="location-cell">
                <div class="location-type">North Africa Bureau</div>
                <div class="location-city">Cairo</div>
                <div class="location-country">Egypt</div>
            </div>
            <div class="location-cell">
                <div class="location-type">Southern Africa Bureau</div>
                <div class="location-city">Johannesburg</div>
                <div class="location-country">South Africa</div>
            </div>
        </div>
    </div>

    {{-- ── CTA Row ──────────────────────────────────────── --}}
    <div class="cta-row">
        <div class="cta-block cta-subscribe">
            <div class="cta-eyebrow">Get Smarter</div>
            <h2>Subscribe to {{ $currentSite?->name ?? config('app.name') }} AM</h2>
            <p>The morning newsletter read by the continent's most engaged tech audience. Free, every morning.</p>
            <a href="{{ route('news.subscribe') }}" class="cta-link">
                Subscribe Free
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>
        <div class="cta-block cta-advertise">
            <div class="cta-eyebrow">Work With Us</div>
            <h2>Advertise or Partner</h2>
            <p>Reach Africa's most engaged tech audience across newsletter, site, and events.</p>
            <a href="mailto:{{ $currentSite?->getSetting('contact_email', 'advertise@' . request()->getHost()) }}"
                class="cta-link">
                Get in Touch
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </a>
        </div>
    </div>

@endsection
