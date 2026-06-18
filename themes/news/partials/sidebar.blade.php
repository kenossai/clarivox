{{-- Sidebar --}}
<div class="space-y-8">
    {{-- Newsletter --}}
    <div class="bg-red-600 text-white rounded-xl p-6">
        <h3 class="font-bold text-lg mb-2">Newsletter</h3>
        <p class="text-red-100 text-sm mb-4">Get the latest news delivered to your inbox.</p>
        <form action="{{ route('news.newsletter.subscribe') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="your@email.com" required
                class="w-full rounded-lg px-4 py-2.5 text-gray-900 text-sm mb-3 focus:outline-none">
            <button type="submit"
                class="w-full bg-white text-red-600 font-semibold py-2.5 rounded-lg hover:bg-red-50 transition text-sm">
                Subscribe
            </button>
        </form>
    </div>

    {{-- Recent Articles --}}
    <div>
        <h3 class="font-bold text-gray-900 text-lg border-b border-gray-200 pb-2 mb-4">Latest News</h3>
        @foreach (\App\Models\Article::published()->latest('published_at')->take(5)->get() as $article)
            <a href="{{ route('news.article.show', $article->slug) }}" class="flex gap-3 mb-4 group">
                @if ($article->featured_image_url)
                    <img src="{{ $article->featured_image_url }}"
                        class="w-20 h-16 object-cover rounded-lg flex-shrink-0" alt="{{ $article->title }}">
                @endif
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900 group-hover:text-red-600 transition leading-snug">
                        {{ Str::limit($article->title, 60) }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1">{{ $article->published_at?->diffForHumans() }}</p>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Tags Cloud --}}
    <div>
        <h3 class="font-bold text-gray-900 text-lg border-b border-gray-200 pb-2 mb-4">Topics</h3>
        <div class="flex flex-wrap gap-2">
            @foreach (\App\Models\Tag::withCount('articles')->orderByDesc('articles_count')->take(20)->get() as $tag)
                <a href="{{ route('news.tag.show', $tag->slug) }}"
                    class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-full hover:bg-red-600 hover:text-white transition">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>
