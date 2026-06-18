@extends('news::layouts.app')

@push('styles')
    <style>
        .article-layout {
            display: grid;
            grid-template-columns: 1fr 228px;
            gap: 32px;
            align-items: start
        }

        .article-body {
            min-width: 0
        }

        .article-hero {
            height: 420px;
            margin-bottom: 24px
        }

        .article-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 700;
            line-height: 1.25;
            color: var(--text);
            margin: 10px 0 14px
        }

        .article-divider {
            border: none;
            border-top: 1px solid var(--border-light);
            margin: 20px 0
        }

        .prose-content {
            font-size: 14px;
            line-height: 1.8;
            color: var(--text)
        }

        .prose-content p {
            margin-bottom: 1em
        }

        .prose-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            margin: 1.5em 0 .5em
        }

        .prose-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            margin: 1.2em 0 .4em
        }

        .prose-content blockquote {
            border-left: 3px solid var(--accent);
            padding-left: 16px;
            color: var(--text-muted);
            margin: 1.5em 0
        }

        .prose-content a {
            color: var(--accent)
        }

        .prose-content ul,
        .prose-content ol {
            padding-left: 1.5em;
            margin-bottom: 1em
        }

        .prose-content img {
            max-width: 100%;
            height: auto;
            display: block
        }

        .tags-row {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding-top: 20px;
            border-top: 1px solid var(--border-light);
            margin-top: 20px
        }

        .tag-link {
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--text-muted);
            border: 1px solid var(--border);
            padding: 4px 10px
        }

        .tag-link:hover {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent)
        }

        .related-section {
            margin-top: 32px
        }

        .related-card {
            display: flex;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid var(--border-light)
        }

        .related-img {
            height: 60px;
            width: 88px
        }

        .related-card h4 {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.35;
            color: var(--text)
        }

        .related-card h4 a:hover {
            color: var(--accent)
        }

        .comments-section {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border-light)
        }

        .comment-item {
            padding: 16px 0;
            border-bottom: 1px solid var(--border-light)
        }

        .comment-author {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
            color: var(--text)
        }

        .comment-date {
            font-size: 10px;
            color: var(--text-muted);
            margin-top: 2px
        }

        .comment-text {
            font-size: 13px;
            color: var(--text);
            margin-top: 8px;
            line-height: 1.6
        }

        .comment-form {
            margin-top: 24px
        }

        .comment-form input,
        .comment-form textarea,
        .aside-box input[type="email"] {
            display: block;
            width: 100%;
            border: 1px solid var(--border);
            font-family: 'Menlo', monospace;
            font-size: 12px;
            color: var(--input-color);
            background: var(--input-bg);
            padding: 10px 12px;
            outline: none;
            margin-bottom: 12px;
        }

        .comment-form input:focus,
        .comment-form textarea:focus,
        .aside-box input[type="email"]:focus {
            border-color: var(--accent)
        }

        .comment-form .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .btn-comment {
            background: var(--accent);
            color: #fff;
            font-family: 'Menlo', monospace;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 10px 20px;
            border: none;
            cursor: pointer
        }

        .aside-box {
            border-top: 2px solid var(--accent);
            padding-top: 16px;
            margin-bottom: 28px
        }

        .aside-box h4 {
            font-family: 'Menlo', monospace;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--accent);
            margin-bottom: 14px
        }

        .aside-article {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border-light);
            margin-bottom: 14px
        }

        .aside-article:last-child {
            border-bottom: none;
            margin-bottom: 0
        }

        .aside-article h5 {
            font-size: 13px;
            font-weight: 700;
            line-height: 1.35;
            color: var(--text)
        }

        .aside-article h5 a:hover {
            color: var(--accent)
        }

        @media(max-width:900px) {
            .article-layout {
                grid-template-columns: 1fr
            }

            .article-aside {
                display: none
            }

            .article-title {
                font-size: 26px
            }
        }
    </style>
@endpush

@section('content')
    <div class="article-layout">

        {{-- ── Main Article ──────────────────────────────── --}}
        <div class="article-body">

            {{-- Category --}}
            @if ($article->category)
                <a href="{{ route('news.category.show', $article->category->slug) }}"
                    class="badge">{{ $article->category->name }}</a>
            @endif

            <h1 class="article-title">{{ $article->title }}</h1>

            <div class="meta" style="margin-bottom:16px">
                @if ($article->author)
                    <span>{{ $article->author->name }}</span>
                    <span class="sep">|</span>
                @endif
                <span>{{ $article->published_at?->format('F j, Y') }}</span>
                <span class="sep">|</span>
                <span>{{ number_format($article->views_count) }} views</span>
            </div>

            <hr class="article-divider">

            {{-- Featured Image --}}
            @if ($article->featured_image_url)
                <div class="img-block article-hero">
                    <img src="{{ $article->featured_image_url }}" alt="{{ $article->title }}">
                </div>
            @endif

            {{-- Body --}}
            <div class="prose-content">
                {!! $article->content !!}
            </div>

            {{-- Tags --}}
            @if ($article->tags->isNotEmpty())
                <div class="tags-row">
                    @foreach ($article->tags as $tag)
                        <a href="{{ route('news.tag.show', $tag->slug) }}" class="tag-link">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            @endif

            {{-- Related Articles --}}
            @if (isset($related) && $related->isNotEmpty())
                <div class="related-section">
                    <div class="section-head">Related Stories</div>
                    @foreach ($related as $rel)
                        <div class="related-card">
                            <a href="{{ route('news.article.show', $rel->slug) }}">
                                <div class="img-block related-img">
                                    @if ($rel->featured_image_url)
                                        <img src="{{ $rel->featured_image_url }}" alt="{{ $rel->title }}">
                                    @endif
                                </div>
                            </a>
                            <div>
                                @if ($rel->category)
                                    <a href="{{ route('news.category.show', $rel->category->slug) }}" class="badge"
                                        style="font-size:9px">{{ $rel->category->name }}</a>
                                @endif
                                <h4><a href="{{ route('news.article.show', $rel->slug) }}"
                                        style="color:inherit">{{ $rel->title }}</a></h4>
                                <div class="meta" style="margin-top:4px">
                                    <span>{{ $rel->published_at?->format('M j, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Comments --}}
            @if ($article->allow_comments)
                <div class="comments-section">
                    <div class="section-head">Comments ({{ $article->approvedComments->count() }})</div>

                    @foreach ($article->approvedComments as $comment)
                        <div class="comment-item">
                            <div class="comment-author">{{ $comment->author_name }}</div>
                            <div class="comment-date">{{ $comment->created_at->format('F j, Y') }}</div>
                            <div class="comment-text">{{ $comment->content }}</div>
                        </div>
                    @endforeach

                    @if (session('success'))
                        <div
                            style="background:var(--img-bg);color:var(--footer-text);padding:12px 16px;font-size:11px;margin:16px 0">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="comment-form">
                        <div
                            style="font-family:'Menlo',monospace;font-size:10px;text-transform:uppercase;letter-spacing:1px;color:var(--accent);margin-bottom:16px">
                            Leave a Comment</div>
                        <form action="{{ route('news.article.comment', $article->slug) }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <input type="text" name="author_name" placeholder="Your name *" required>
                                <input type="email" name="author_email" placeholder="Your email *" required>
                            </div>
                            <textarea name="content" rows="5" placeholder="Your comment *" required style="resize:vertical"></textarea>
                            <button type="submit" class="btn-comment">Post Comment</button>
                        </form>
                    </div>
                </div>
            @endif

        </div>

        {{-- ── Aside ──────────────────────────────────────── --}}
        <aside class="article-aside">
            @if (isset($related) && $related->isNotEmpty())
                <div class="aside-box">
                    <h4>More Stories</h4>
                    @foreach ($related->take(5) as $rel)
                        <div class="aside-article">
                            @if ($rel->category)
                                <a href="{{ route('news.category.show', $rel->category->slug) }}" class="badge"
                                    style="font-size:9px">{{ $rel->category->name }}</a>
                            @endif
                            <h5><a href="{{ route('news.article.show', $rel->slug) }}"
                                    style="color:inherit">{{ $rel->title }}</a></h5>
                            <div class="meta"><span>{{ $rel->published_at?->format('M j, Y') }}</span></div>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Newsletter CTA --}}
            <div class="aside-box">
                <h4>Newsletter</h4>
                <p style="font-size:11px;color:#9A8A84;line-height:1.6;margin-bottom:12px">Get the latest stories delivered
                    to your inbox.</p>
                <form action="{{ route('news.newsletter.subscribe') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="your@email.com" required style="margin-bottom:8px">
                    <button type="submit" class="btn-comment" style="width:100%;justify-content:center">Subscribe</button>
                </form>
            </div>
        </aside>

    </div>
@endsection
