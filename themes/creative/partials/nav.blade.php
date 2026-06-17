<nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Logo --}}
            <a href="{{ route('creative.home') }}" class="flex items-center space-x-3">
                @if ($currentSite?->logo)
                    <img src="{{ $currentSite->logo }}" alt="{{ $currentSite->name }}" class="h-10 w-auto">
                @else
                    <span class="text-2xl font-bold tracking-tight text-gray-900">
                        {{ $currentSite?->name ?? config('app.name') }}
                    </span>
                @endif
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('creative.home') }}"
                    class="text-gray-600 hover:text-gray-900 font-medium transition">Home</a>
                <a href="{{ route('creative.services.index') }}"
                    class="text-gray-600 hover:text-gray-900 font-medium transition">Services</a>
                <a href="{{ route('creative.portfolio.index') }}"
                    class="text-gray-600 hover:text-gray-900 font-medium transition">Portfolio</a>
                <a href="{{ route('creative.contact.show') }}"
                    class="bg-gray-900 text-white px-6 py-2.5 rounded-full font-medium hover:bg-gray-700 transition">
                    Contact Us
                </a>
            </div>

            {{-- Mobile menu button --}}
            <button id="mobile-menu-btn" class="md:hidden text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</nav>
