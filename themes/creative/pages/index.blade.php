@extends('creative::layouts.app')

@section('content')
    {{-- Portfolio Section --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Our Portfolio</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <div class="p-8 rounded-2xl border border-gray-100 hover:shadow-lg transition group">
                        @if ($project->image)
                            <img src="{{ $project->image }}" alt="{{ $project->title }}" class="mb-4 rounded-lg">
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition">
                            {{ $project->title }}
                        </h3>
                        <p class="text-gray-500">{{ $project->excerpt }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
