@extends('creative::layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="relative min-h-screen flex items-center bg-gradient-to-br from-gray-50 to-white pt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="max-w-3xl">
                <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 leading-tight mb-6">
                    We Create<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500">
                        Digital Experiences
                    </span>
                </h1>
                <p class="text-xl text-gray-500 mb-10 max-w-xl">
                    A creative agency crafting brand stories, visual identities, and digital products that leave a lasting
                    impression.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('creative.portfolio.index') }}"
                        class="bg-gray-900 text-white px-8 py-4 rounded-full font-semibold hover:bg-gray-700 transition">
                        View Our Work
                    </a>
                    <a href="{{ route('creative.contact.show') }}"
                        class="border-2 border-gray-900 text-gray-900 px-8 py-4 rounded-full font-semibold hover:bg-gray-900 hover:text-white transition">
                        Start a Project
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Preview --}}
    @if ($services->isNotEmpty())
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">What We Do</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($services as $service)
                        <div class="p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition group">
                            @if ($service->icon)
                                <div class="text-3xl mb-4">{{ $service->icon }}</div>
                            @endif
                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition">
                                {{ $service->title }}
                            </h3>
                            <p class="text-gray-500">{{ $service->excerpt }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Featured Portfolio --}}
    @if ($projects->isNotEmpty())
        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Featured Work</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <a href="{{ route('creative.portfolio.show', $project->slug) }}"
                            class="group rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-xl transition">
                            @if ($project->getFirstMediaUrl('featured_image'))
                                <img src="{{ $project->getFirstMediaUrl('featured_image') }}" alt="{{ $project->title }}"
                                    class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-56 bg-gradient-to-br from-purple-100 to-blue-100"></div>
                            @endif
                            <div class="p-6">
                                <span
                                    class="text-xs font-medium text-purple-600 uppercase tracking-wider">{{ $project->category }}</span>
                                <h3 class="text-lg font-bold text-gray-900 mt-1">{{ $project->title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Testimonials --}}
    @if ($testimonials->isNotEmpty())
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Client Love</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($testimonials as $testimonial)
                        <div class="p-8 rounded-2xl bg-gray-50">
                            <div class="flex mb-4">
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                    <span class="text-yellow-400">★</span>
                                @endfor
                            </div>
                            <p class="text-gray-600 mb-6 italic">"{{ $testimonial->content }}"</p>
                            <div>
                                <p class="font-semibold text-gray-900">{{ $testimonial->author_name }}</p>
                                @if ($testimonial->author_title)
                                    <p class="text-sm text-gray-500">{{ $testimonial->author_title }}@if ($testimonial->author_company)
                                            , {{ $testimonial->author_company }}
                                        @endif
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
