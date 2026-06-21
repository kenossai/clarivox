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
                    data-cue="slideInUp">HOW WE ARE
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
    {{-- About Section Start --}}
    <div class="about-area style-three position-relative z-1 ptb-120">
        <div class="move-text-wrapper overflow-hidden mb-120">
            <div class="move-text style-two position-relative z-1">
                <ul class="list-unstyled mb-0">
                    <li class="position-relative font-secondary">FREE IN-HOME CONSULTATIONS</li>
                    <li class="position-relative font-secondary">CUSTOM DESIGN SOLUTIONS</li>
                    <li class="position-relative font-secondary">FLEXIBLE FINANCING OPTIONS</li>
                    <li class="position-relative font-secondary">POST-RENOVATION SUPPORT</li>
                    <li class="position-relative font-secondary">FREE IN-HOME CONSULTATIONS</li>
                    <li class="position-relative font-secondary">CUSTOM DESIGN SOLUTIONS</li>
                    <li class="position-relative font-secondary">FLEXIBLE FINANCING OPTIONS</li>
                    <li class="position-relative font-secondary">POST-RENOVATION SUPPORT</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-lg-5">
                    <div class="about-img-wrap position-relative z-1 mb-md-30">
                        <img src="assets/img/about/about-img-3.png" alt="Image" class="d-block tilt-img mx-auto"
                            style="translate: none; rotate: none; scale: none; transform: perspective(2000px);">
                        <img src="assets/img/about/shape-1.png" alt="Shape"
                            class="about-shape position-absolute top-0 z-n1">
                    </div>
                </div>
                <div class="col-xxl-6 offset-xxl-1 col-lg-7 ps-xxl-3 ps-xl-4">
                    <div class="about-content position-relative">
                        <h6
                            class="section-subtitle style-two d-inline-block fs-13 ls-1 font-optional fw-semibold position-relative text_primary mb-20">
                            <img src="assets/img/icons/home-icon.svg" alt="Icon">ABOUT US</h6>
                        <h2 class="section-title style-one fw-normal text-title">Renius Home <span class="fw-black">Build
                                Craft Was Founded On A Simple</span> Idea Great Homes</h2>
                        <p class="mb-28">We believe that every home should reflect the people who live in it. With decades
                            of experience in custom home construction</p>
                        <div class="row gx-xxl-45">
                            <div class="col-sm-6">
                                <div class="feature-item position-relative">
                                    <img src="assets/img/about/feature-icon-1.png" alt="Icon" class="feature-icon">
                                    <h3 class="fs-16 fw-semibold">Decades Of Construction Experience</h3>
                                    <p class="mb-0">Proven expertise in custom building quality craftsmanship.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item position-relative">
                                    <img src="assets/img/about/feature-icon-2.png" alt="Icon" class="feature-icon">
                                    <h3 class="fs-16 fw-semibold">Craftsmanship Meets Modern Innovation</h3>
                                    <p class="mb-0">We blend tested techniques with cutting-edge building.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item position-relative">
                                    <img src="assets/img/about/feature-icon-3.png" alt="Icon" class="feature-icon">
                                    <h3 class="fs-16 fw-semibold">Built To Last With Quality Materials</h3>
                                    <p class="mb-0">We use only premium, durable &amp; materials every project.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-item position-relative">
                                    <img src="assets/img/about/feature-icon-4.png" alt="Icon" class="feature-icon">
                                    <h3 class="fs-16 fw-semibold">Trusted By Homeowners Across</h3>
                                    <p>A growing portfolio of satisfied &amp; successful custom builds.</p>
                                </div>
                            </div>
                        </div>
                        <a href="about.html" class="btn style-one d-inline-flex flex-wrap align-items-center p-0"><span
                                class="btn-text d-inline-block fw-semibold position-relative transition">More About
                                Us</span><span
                                class="btn-icon position-relative d-flex flex-column align-items-center justify-content-center rounded-circle transition"><i
                                    class="ri-arrow-right-up-line"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- About Section End --}}

    {{-- Service Section Start --}}
    <div class="bg-optional pt-120 pb-90 mb-120">
        <div class="container">
            <div class="row align-items-end mb-45">
                <div class="col-lg-7 col-md-8">
                    <h6 class="section-subtitle style-two d-inline-block fs-13 ls-1 font-optional fw-semibold position-relative text_primary mb-25" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                        <img src="assets/img/icons/home-icon.svg" alt="Icon">
                        OUR SERVICES
                    </h6>
                    <h2 class="section-title style-one fw-normal text-white" data-cue="slideInUp" data-delay="400" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 400ms; animation-direction: normal; animation-fill-mode: both;">
                        Project Management 
                        <span class="fw-black">With Precision and Professional</span>
                        Oversight
                    </h2>
                </div>
                <div class="col-lg-5 col-md-4 text-md-end">
                    <a href="services.html" class="btn style-one d-inline-flex flex-wrap align-items-center p-0">
                        <span class="btn-text d-inline-block fw-semibold position-relative transition">View All Services</span>
                        <span class="btn-icon position-relative d-flex flex-column align-items-center justify-content-center rounded-circle transition">
                            <i class="ri-arrow-right-up-line"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="service-card-wrap style-one d-flex flex-wrap justify-content-center">
                <div class="service-card style-three mb-30" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <img src="assets/img/icons/custom-home.svg" alt="Icon">
                    <h3 class="fs-24 fw-semibold">
                        <a href="service-single.html" class="text-white link-hover-primary transition">Custom Home Construction</a>
                    </h3>
                    <p class="text-alto">We specialize in building fully customized homes from the ground Every lifestyle future goals</p>
                    <a href="services.html" class="link style-one fw-semibold">
                        Read More
                        <img src="assets/img/icons/right-arrow-small.svg" alt="Icon">
                    </a>
                </div>
                <div class="service-card style-three mb-30" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <img src="assets/img/icons/design.svg" alt="Icon">
                    <h3 class="fs-24 fw-semibold">
                        <a href="service-single.html" class="text-white link-hover-primary transition">Architectural Design &amp; Planning</a>
                    </h3>
                    <p class="text-alto">Our in-house designers work with you to turn your ideas elegant floor plans that balance</p>
                    <a href="services.html" class="link style-one fw-semibold">
                        Read More
                        <img src="assets/img/icons/right-arrow-small.svg" alt="Icon">
                    </a>
                </div>
                <div class="service-card style-three mb-30" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <img src="assets/img/icons/renovation.svg" alt="Icon">
                    <h3 class="fs-24 fw-semibold">
                        <a href="service-single.html" class="text-white link-hover-primary transition">Home Renovations &amp; Additions</a>
                    </h3>
                    <p class="text-alto">Whether you're remodeling a kitchen or adding deliver seamless upgrades integrate perfectly</p>
                    <a href="services.html" class="link style-one fw-semibold">
                        Read More
                        <img src="assets/img/icons/right-arrow-small.svg" alt="Icon">
                    </a>
                </div>
                <div class="service-card style-three mb-30" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <img src="assets/img/icons/project-management.svg" alt="Icon">
                    <h3 class="fs-24 fw-semibold">
                        <a href="service-single.html" class="text-white link-hover-primary transition">Full-Service Project Management</a>
                    </h3>
                    <p class="text-alto">We handle scheduling, budgeting, permits, and quality control — you peace of mind</p>
                    <a href="services.html" class="link style-one fw-semibold">
                        Read More
                        <img src="assets/img/icons/right-arrow-small.svg" alt="Icon">
                    </a>
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
