@extends('creative::layouts.app')

@section('content')
    <!-- Hero Section Start -->
    <div class="hero-area style-three position-relative overflow-hidden z-1">
        <div class="hero-bg bg-f position-absolute top-0 start-0 w-100 h-100 transition"></div>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-md-7 pe-xxl-5">
                    <div class="hero-content mb-35">
                        <h1 class="font-secondary fw-normal text-white mb-0" data-cue="slideInUp">Crafting <span
                                class="fw-black">Homes Built To Last</span> Generations</h1>
                    </div>
                </div>
                <div class="col-xl-4 offset-xl-2 col-lg-4 offset-lg-1 col-md-5 ps-xxl-5 mb-35">
                    <div class="hero-para" data-cue="slideInUp">
                        <p class="ms-xxl-5 mb-35">Home build craft was founded on a simple idea great homes begin with great
                        </p>
                        <a href="services.html"
                            class="btn style-one d-inline-flex flex-wrap align-items-center p-0 ms-xxl-5"><span
                                class="btn-text d-inline-block fw-semibold position-relative transition">Our
                                Services</span><span
                                class="btn-icon position-relative d-flex flex-column align-items-center justify-content-center rounded-circle transition"><i
                                    class="ri-arrow-right-up-line"></i></span></a>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-6 col-lg-5 offset-lg-7 col-md-4 offset-md-8 ps-xxl-5 ps-md-4">
                    <div class="circle-text-wrap position-relative overflow-hidden z-1" data-cue="slideInUp"
                        data-delay="300">
                        <img src="assets/img/hero/circle-text-1.svg" alt="Circle Text" class="rotate position-relative z-1">
                        <a data-fslightbox="" href="https://www.youtube.com/watch?v=u31qwQUeGuM"
                            class="play-icon position-absolute d-flex flex-column align-items-center justify-content-center rounded-circle z-1 bg_primary"><i
                                class="ri-play-large-fill"></i></a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="hero-transparent-text-wrap">
                        <h6 class="section-subtitle style-two d-inline-block fs-13 ls-1 font-optional fw-semibold position-relative text_secondary mb-18"
                            data-cue="slideInUp" data-delay="400"><img src="assets/img/icons/home-2.svg"
                                alt="Icon">WHERE CRAFTSMANSHIP MEETS CONSTRUCTION EXCELLENCE</h6>
                        <h2 class="hero-transparent-text font-secondary fw-black mb-0 d-flex flex-wrap align-items-center justify-content-between"
                            data-cue="slideInUp" data-delay="500">
                            <span>C</span>
                            <span>L</span>
                            <span>A</span>
                            <span>R</span>
                            <span>I</span>
                            <span>V</span>
                            <span>O</span>
                            <span>X</span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- Feature Section Start -->
    <div class="container pb-90">
        <div class="row align-items-end">
            <div class="col-xl-8 offset-xl-2 col-md-10 offset-md-1 text-center px-xxl-5">
                <h6 class="section-subtitle style-two d-inline-block fs-13 ls-1 font-optional fw-semibold position-relative text_primary mb-25"
                    data-cue="slideInUp"><img src="{{ asset('assets/img/icons/home-icon.svg') }}" alt="Icon">HOW WE ARE
                </h6>
                <h2 class="section-title style-one fw-normal text-title mb-40" data-cue="slideInUp" data-delay="300">From
                    Architectural Concepts To <span class="fw-black">Final Finishes We Take Pride In Crafting Homes</span>
                    That Balance Functionality</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6" data-cue="slideInUp">
                <div class="feature-card style-three position-relative round-20 transition mb-30">
                    <div class="br-one position-absolute top-0 start-0"></div>
                    <div class="br-two position-absolute bottom-0 start-0"></div>
                    <div class="feature-img rounded-circle position-relative z-1 d-block mx-auto">
                        <img src="{{ asset('assets/img/features/zigzag-shape.svg') }}" alt="Shape"
                            class="position-absolute top-0 start-0 w-100 h-100 z-1">
                        <img src="{{ asset('assets/img/features/feature-img-1.jpg') }}" alt="Image"
                            class="rounded-circle">
                    </div>
                    <h3 class="fs-24 font-primary fw-black">What We Do</h3>
                    <p>Architectural concepts to final finishes we take pride in crafting homes </p>
                    <a href="services.html" class="link style-one fw-semibold">Our Solution <img
                            src="{{ asset('assets/img/icons/right-arrow-small.svg') }}" alt="Icon"></a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6" data-cue="slideInUp">
                <div class="feature-card style-four position-relative z-1 overflow-hidden round-20 mb-30">
                    <div class="feature-info">
                        <h3 class="fs-24 font-primary fw-black">Our Impact</h3>
                        <p>Building experience with passion creating custom homes that are as unique</p>
                        <a href="projects.html" class="link style-one fw-semibold">See Our Projects <img
                                src="{{ asset('assets/img/icons/right-arrow-small.svg') }}" alt="Icon"></a>
                    </div>
                    <img src="{{ asset('assets/img/features/feature-img-2.jpg') }}" alt="Image"
                        class="position-absolute bottom-0 start-0 z-n1 transition">
                </div>
            </div>
            <div class="col-xl-4 col-md-6" data-cue="slideInUp">
                <div
                    class="feature-card style-five bg-f position-relative overflow-hidden d-flex flex-column align-items-end justify-content-end round-20 z-1 mb-30">
                    <div class="feature-info">
                        <h3 class="fs-24 font-primary fw-black text-white">Core Values</h3>
                        <p class="text-alto">Home Build Craft, we believe the difference is in the details Our team brings
                        </p>
                        <a href="about.html" class="link style-one fw-semibold">Discover More<img
                                src="{{ asset('assets/img/icons/right-arrow-small.svg') }}" alt="Icon"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Section End -->
    {{-- Services Preview --}}
    {{-- @if ($services->isNotEmpty())
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
    @endif --}}

    {{-- Featured Portfolio --}}
    {{-- @if ($projects->isNotEmpty())
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
                                <div
                                    class="w-full h-56 bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center">
                                    <span class="text-4xl">🎨</span>
                                </div>
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
    @endif --}}

    {{-- Testimonials --}}
    {{-- @if ($testimonials->isNotEmpty())
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
                                    <p class="text-sm text-gray-500">
                                        {{ $testimonial->author_title }}@if ($testimonial->author_company)
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
    @endif --}}
@endsection
