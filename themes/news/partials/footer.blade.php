<footer class="bg-gray-900 text-gray-400 mt-16 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-8">
            <div>
                <h3 class="text-white font-bold text-xl mb-3">{{ $currentSite?->name ?? config('app.name') }}</h3>
                <p class="text-sm leading-relaxed">
                    {{ $currentSite?->getSetting('about', 'Your trusted source for breaking news and in-depth analysis.') }}
                </p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Categories</h4>
                <ul class="space-y-2 text-sm">
                    @foreach (\App\Models\Category::where('status', 'published')->take(6)->get() as $cat)
                        <li><a href="{{ route('news.category.show', $cat->slug) }}"
                                class="hover:text-white transition">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-3">Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('news.sitemap') }}" class="hover:text-white transition">Sitemap</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-6 text-sm text-center">
            &copy; {{ date('Y') }} {{ $currentSite?->name ?? config('app.name') }}. All rights reserved.
        </div>
    </div>
</footer>
