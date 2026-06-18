@extends('news::layouts.app')

@push('styles')
    <style>
        /* ── Subscribe Hero ───────────────────────────────── */
        .subscribe-hero {
            text-align: center;
            padding: 80px 0 64px;
            border-bottom: 1px solid var(--border-light)
        }

        .subscribe-hero .eyebrow {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--accent);
            margin-bottom: 20px
        }

        .subscribe-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 64px;
            font-weight: 900;
            line-height: 1.05;
            letter-spacing: -2px;
            color: var(--text);
            margin-bottom: 20px
        }

        .subscribe-hero p {
            font-size: 14px;
            color: var(--text-muted);
            max-width: 520px;
            margin: 0 auto;
            line-height: 1.7
        }

        /* ── Pricing Grid ─────────────────────────────────── */
        .pricing-section {
            padding: 64px 0
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            border: 1px solid var(--border-light)
        }

        .pricing-card {
            padding: 32px 28px;
            border-right: 1px solid var(--border-light);
            position: relative
        }

        .pricing-card:last-child {
            border-right: none
        }

        .pricing-card.featured,
        .pricing-card.selected {
            border: 2px solid var(--accent);
            margin: -1px
        }

        .pricing-card {
            cursor: pointer
        }

        .pricing-card .plan-tag {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--accent);
            margin-bottom: 12px
        }

        .pricing-card.featured .featured-badge {
            position: absolute;
            top: -1px;
            right: 16px;
            background: var(--accent);
            color: #fff;
            font-family: 'Menlo', monospace;
            font-size: 8px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 3px 8px
        }

        .pricing-card .price {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            font-weight: 900;
            line-height: 1;
            color: var(--text)
        }

        .pricing-card .price sub {
            font-size: 14px;
            font-weight: 400;
            font-family: 'Menlo', monospace;
            vertical-align: baseline
        }

        .pricing-card .price-period {
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 4px;
            margin-bottom: 12px
        }

        .pricing-card .plan-desc {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--border-light)
        }

        .pricing-card .feature-list {
            list-style: none;
            padding: 0;
            margin: 0 0 28px
        }

        .pricing-card .feature-list li {
            font-size: 12px;
            color: var(--text);
            padding: 7px 0;
            display: flex;
            align-items: flex-start;
            gap: 8px
        }

        .pricing-card .feature-list li .check {
            color: var(--accent);
            flex-shrink: 0;
            margin-top: 1px
        }

        .btn-plan {
            display: block;
            width: 100%;
            text-align: center;
            font-family: 'Menlo', monospace;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 12px;
            border: 1px solid var(--border);
            color: var(--text-muted);
            cursor: pointer;
            transition: all .15s
        }

        .btn-plan:hover,
        .pricing-card.featured .btn-plan,
        .pricing-card.selected .btn-plan {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff
        }

        /* ── Trial Form ───────────────────────────────────── */
        .trial-section {
            padding: 64px 0;
            border-top: 1px solid var(--border-light)
        }

        .trial-inner {
            max-width: 520px;
            margin: 0 auto;
            border: 1px solid var(--border-light);
            padding: 40px
        }

        .trial-eyebrow {
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--accent);
            margin-bottom: 10px
        }

        .trial-inner h2 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 28px
        }

        .form-field {
            margin-bottom: 16px
        }

        .form-field label {
            display: block;
            font-family: 'Menlo', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-bottom: 6px
        }

        .form-field input {
            display: block;
            width: 100%;
            border: 1px solid var(--border);
            background: var(--input-bg);
            color: var(--input-color);
            font-family: 'Menlo', monospace;
            font-size: 13px;
            padding: 10px 14px;
            outline: none
        }

        .form-field input:focus {
            border-color: var(--accent)
        }

        .form-row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .btn-trial {
            display: block;
            width: 100%;
            background: var(--accent);
            color: #fff;
            font-family: 'Menlo', monospace;
            font-size: 11px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 14px;
            border: none;
            cursor: pointer;
            margin-top: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px
        }

        .trial-note {
            font-size: 10px;
            color: var(--text-muted);
            text-align: center;
            margin-top: 12px
        }

        /* ── Testimonials ─────────────────────────────────── */
        .testimonials-section {
            padding: 64px 0;
            border-top: 1px solid var(--border-light)
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 40px
        }

        .testimonial-card {
            border: 1px solid var(--border-light);
            padding: 28px 24px
        }

        .testimonial-card blockquote {
            font-size: 13px;
            line-height: 1.7;
            color: var(--text);
            margin-bottom: 20px
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 10px
        }

        .testimonial-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--img-bg);
            overflow: hidden;
            flex-shrink: 0
        }

        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .testimonial-name {
            font-size: 12px;
            font-weight: 700;
            color: var(--text)
        }

        .testimonial-title {
            font-size: 10px;
            color: var(--text-muted)
        }

        /* Success banner */
        .trial-success {
            background: var(--accent);
            color: #fff;
            padding: 16px 20px;
            font-size: 12px;
            margin-bottom: 20px;
            text-align: center
        }

        @media(max-width:900px) {
            .subscribe-hero h1 {
                font-size: 40px
            }

            .pricing-grid {
                grid-template-columns: 1fr
            }

            .pricing-card {
                border-right: none;
                border-bottom: 1px solid var(--border-light)
            }

            .pricing-card.featured {
                margin: 0
            }

            .testimonials-grid {
                grid-template-columns: 1fr
            }
        }
    </style>
@endpush

@section('content')
    {{-- ── Hero ───────────────────────────────────────────── --}}
    <div class="subscribe-hero">
        <div class="eyebrow">Subscribe</div>
        <h1>Stay ahead of<br>the story.</h1>
        <p>{{ $currentSite?->getSetting('subscribe_hero_desc', 'From Lagos to Nairobi to Cairo — this is where the continent\'s most consequential technology stories break first. Don\'t miss them.') }}
        </p>
    </div>

    {{-- ── Pricing ─────────────────────────────────────────── --}}
    <div class="pricing-section">
        <div class="pricing-grid">

            {{-- Free --}}
            <div class="pricing-card">
                <div class="plan-tag">AM Newsletter</div>
                <div class="price">Free</div>
                <div class="price-period">&nbsp;</div>
                <div class="plan-desc">The morning newsletter read by {{ number_format($subscriberCount) }}+ tech
                    professionals.</div>
                <ul class="feature-list">
                    <li><span class="check">✓</span> Daily morning briefing, weekdays</li>
                    <li><span class="check">✓</span> Top 5 stories curated by our editors</li>
                    <li><span class="check">✓</span> Weekly funding roundup</li>
                    <li><span class="check">✓</span> Access to all free articles</li>
                </ul>
                <button type="button" class="btn-plan" onclick="selectPlan(this,'free','AM Newsletter — Free')">Get Started
                    Free</button>
            </div>

            {{-- Pro --}}
            <div class="pricing-card featured">
                <div class="featured-badge">Most Popular</div>
                <div class="plan-tag">Pro</div>
                <div class="price"><sub>$</sub>9</div>
                <div class="price-period">/ month</div>
                <div class="plan-desc">Unlimited access to every story, analysis, and database.</div>
                <ul class="feature-list">
                    <li><span class="check">✓</span> Everything in AM Newsletter</li>
                    <li><span class="check">✓</span> Unlimited article access</li>
                    <li><span class="check">✓</span> Weekly deep-dive analysis</li>
                    <li><span class="check">✓</span> Funding database access</li>
                    <li><span class="check">✓</span> Startup intelligence reports</li>
                    <li><span class="check">✓</span> Exclusive journalist Q&As</li>
                    <li><span class="check">✓</span> Early access to events</li>
                </ul>
                <button type="button" class="btn-plan" onclick="selectPlan(this,'pro','Pro — $9/month')">Start 14-Day
                    Trial</button>
            </div>

            {{-- Team --}}
            <div class="pricing-card">
                <div class="plan-tag">Team</div>
                <div class="price"><sub>$</sub>49</div>
                <div class="price-period">/ month</div>
                <div class="plan-desc">For investment firms, enterprises, and newsrooms covering the space.</div>
                <ul class="feature-list">
                    <li><span class="check">✓</span> Everything in Pro</li>
                    <li><span class="check">✓</span> Up to 10 team seats</li>
                    <li><span class="check">✓</span> API access to funding database</li>
                    <li><span class="check">✓</span> Custom briefings on request</li>
                    <li><span class="check">✓</span> Dedicated account manager</li>
                    <li><span class="check">✓</span> Priority event invitations</li>
                </ul>
                <button type="button" class="btn-plan" onclick="selectPlan(this,'team','Team — $49/month')">Contact
                    Us</button>
            </div>

        </div>
    </div>

    {{-- ── Trial Form ──────────────────────────────────────── --}}
    <div class="trial-section" id="trial-form">
        <div class="trial-inner">
            @if (session('trial_success'))
                <div class="trial-success">You're in! Check your inbox to confirm your subscription.</div>
            @endif
            <div class="trial-eyebrow" id="trial-plan-label">Pro</div>
            <h2>Start 14-Day Trial</h2>
            <form action="{{ route('news.subscribe.trial') }}" method="POST">
                @csrf
                <input type="hidden" name="plan" id="selected-plan" value="pro">
                <div class="form-field">
                    <label for="tf-name">Full Name</label>
                    <input type="text" id="tf-name" name="name"
                        placeholder="{{ \App\Models\Author::inRandomOrder()->value('name') ?? 'Your name' }}" required
                        value="{{ old('name') }}">
                    @error('name')
                        <span style="font-size:10px;color:var(--accent)">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-field">
                    <label for="tf-email">Email Address</label>
                    <input type="email" id="tf-email" name="email" placeholder="your@email.com" required
                        value="{{ old('email') }}">
                    @error('email')
                        <span style="font-size:10px;color:var(--accent)">{{ $message }}</span>
                    @enderror
                </div>
                <div id="card-fields">
                    <div class="form-field">
                        <label>Card Number</label>
                        <input type="text" placeholder="1234 5678 9012 3456" maxlength="19" inputmode="numeric">
                    </div>
                    <div class="form-row-2">
                        <div class="form-field">
                            <label>MM / YY</label>
                            <input type="text" placeholder="MM / YY" maxlength="7">
                        </div>
                        <div class="form-field">
                            <label>CVC</label>
                            <input type="text" placeholder="CVC" maxlength="4">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-trial">
                    Start 14-Day Trial
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </button>
            </form>
            <p class="trial-note">14-day free trial. Cancel anytime. No commitment.</p>
        </div>
    </div>

    {{-- ── Testimonials ─────────────────────────────────────── --}}
    <div class="testimonials-section">
        <div class="section-head">Trusted by tech leaders</div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <blockquote>"This is the first thing I read every morning. It's indispensable for anyone serious about tech
                    in this space."</blockquote>
                <div class="testimonial-author">
                    <div class="testimonial-avatar"></div>
                    <div>
                        <div class="testimonial-name">Olumide Soyombo</div>
                        <div class="testimonial-title">Co-founder, Voltron Capital</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <blockquote>"The depth of reporting here is genuinely world-class. No other outlet covers this ecosystem
                    with the same rigour."</blockquote>
                <div class="testimonial-author">
                    <div class="testimonial-avatar"></div>
                    <div>
                        <div class="testimonial-name">Chidinma Obi</div>
                        <div class="testimonial-title">Partner, Tlcom Capital</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <blockquote>"We use the Pro plan across our entire East Africa team. The funding database alone is worth the
                    subscription."</blockquote>
                <div class="testimonial-author">
                    <div class="testimonial-avatar"></div>
                    <div>
                        <div class="testimonial-name">James Mwangi</div>
                        <div class="testimonial-title">Head of Ventures, Safaricom</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function selectPlan(btn, planKey, planLabel) {
                // Highlight selected card
                document.querySelectorAll('.pricing-card').forEach(function(c) {
                    c.classList.remove('selected');
                });
                btn.closest('.pricing-card').classList.add('selected');

                // Update form label & hidden input
                var label = document.getElementById('trial-plan-label');
                var input = document.getElementById('selected-plan');
                if (label) label.textContent = planLabel;
                if (input) input.value = planKey;

                // If free plan, hide card fields; show for paid
                var cardFields = document.getElementById('card-fields');
                if (cardFields) {
                    cardFields.style.display = planKey === 'free' ? 'none' : 'block';
                }

                // Scroll to form
                var form = document.getElementById('trial-form');
                if (form) form.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }

            // Pre-select Pro on load
            document.addEventListener('DOMContentLoaded', function() {
                var proCard = document.querySelector('.pricing-card.featured');
                if (proCard) proCard.classList.add('selected');
            });
        </script>
    @endpush
@endsection
