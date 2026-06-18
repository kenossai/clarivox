@extends('news::layouts.app')

@section('content')
    <div
        style="display:flex;gap:20px;align-items:center;margin-bottom:28px;padding-bottom:24px;border-bottom:1px solid rgba(240,234,231,.4)">
        @if ($author->getFirstMediaUrl('avatar'))
            <div class="img-block" style="width:80px;height:80px;border-radius:50%;overflow:hidden;flex-shrink:0">
                <img src="{{ $author->getFirstMediaUrl('avatar') }}" alt="{{ $author->name }}">
            </div>
        @else
            <div
                style="width:80px;height:80px;background:#2A1818;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                <span
                    style="font-family:'Playfair Display',serif;font-size:32px;font-weight:700;color:#F0EAE7">{{ substr($author->name, 0, 1) }}</span>
            </div>
        @endif
        <div>
            <span class="badge">Author</span>
            <h1 style="font-family:'Playfair Display',serif;font-size:32px;font-weight:700;color:#2A1818;margin:6px 0 4px">
                {{ $author->name }}</h1>
            @if ($author->bio)
                <p style="font-size:12px;color:#9A8A84;line-height:1.6;max-width:600px">{{ $author->bio }}</p>
            @endif
        </div>
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
                    <div class="meta"><span>{{ $article->published_at?->format('M j, Y') }}</span></div>
                </div>
            @endforeach
        </div>

        @if ($articles->hasPages())
            <div class="pagination">
                @if ($articles->onFirstPage())
                    <span>&laquo;</span>
                @else
                    <a href="{{ $articles->previousPageUrl() }}">&laquo;</a>
                @endif
                @foreach ($articles->getUrlRange(max(1, $articles->currentPage() - 2), min($articles->lastPage(), $articles->currentPage() + 2)) as $page => $url)
                    @if ($page == $articles->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
                @if ($articles->hasMorePages())
                    <a href="{{ $articles->nextPageUrl() }}">&raquo;</a>
                @else
                    <span>&raquo;</span>
                @endif
            </div>
        @endif
    @else
        <p style="font-size:12px;color:#9A8A84;padding:40px 0;text-align:center">No articles by this author yet.</p>
    @endif
@endsection
