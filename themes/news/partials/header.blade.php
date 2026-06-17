<header class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Top bar --}}
        <div class="flex justify-between items-center py-3 text-sm text-gray-500 border-b border-gray-100">
            <span>{{ now()->format('l, F j, Y') }}</span>
            <form action="{{ route('news.search') }}" method="GET" class="flex items-center gap-2">
                <input type="text" name="q" placeholder="Search news..." value="{{ request('q') }}"
                    class="border border-gray-200 rounded-full px-4 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-red-500 w-56">
            </form>
        </div>
        {{-- Brand --}}
        <div class="py-4 text-center">
            <a href="{{ route('news.home') }}" class="text-4xl font-bold font-serif text-gray-900 tracking-tight">
                {{ $currentSite?->name ?? config('app.name') }}
            </a>
            <p class="text-xs text-gray-500 mt-1 uppercase tracking-widest">
                {{ $currentSite?->getSetting('tagline', 'Breaking News & Analysis') }}
            </p>
        </div>
        {{-- Category navigation --}}
        <nav class="flex overflow-x-auto gap-6 py-3 text-sm font-medium border-t border-gray-100">
            <a href="{{ route('news.home') }}"
                class="whitespace-nowrap text-gray-700 hover:text-red-600 transition">Home</a>
            @foreach (\App\Models\Category::where('status', 'published')->orderBy('sort_order')->take(8)->get() as $cat)
                <a href="{{ route('news.category.show', $cat->slug) }}"
                    class="whitespace-nowrap text-gray-700 hover:text-red-600 transition">{{ $cat->name }}</a>
            @endforeach
        </nav>
    </div>
</header>
