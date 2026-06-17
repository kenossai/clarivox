<footer class="bg-gray-900 text-gray-300 py-16 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-white text-xl font-bold mb-4">{{ $currentSite?->name ?? config('app.name') }}</h3>
                <p class="text-gray-400 leading-relaxed max-w-sm">
                    {{ $currentSite?->getSetting('tagline', 'We craft digital experiences that inspire.') }}
                </p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Services</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('creative.services.index') }}" class="hover:text-white transition">All
                            Services</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('creative.portfolio.index') }}"
                            class="hover:text-white transition">Portfolio</a></li>
                    <li><a href="{{ route('creative.contact.show') }}" class="hover:text-white transition">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <div
            class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} {{ $currentSite?->name ?? config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</footer>
