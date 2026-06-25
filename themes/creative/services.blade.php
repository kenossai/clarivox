@extends('creative::layouts.app')

@section('title', 'Services - ' . config('app.name'))
@section('content')
    <div class="sec-1-services overflow-hidden">
        <div class="bg-neutral-50">
            <div class="container">
                <div class="row align-items-center p-relative">
                    <div class="col-xxl-5 col-lg-6 pt-lg-0 pt-100">
                        <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                            <span class="text-uppercase">
                                <span class="text-1">Clarivox Creatives</span>
                                <span class="text-2">Clarivox Creatives</span>
                            </span>
                            <i>
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                        fill="currentColor"></path>
                                </svg>
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                        </span>
                        <div>
                            <h1 class="section-title d-flex fw-600 fz-200 reveal-text mb-0 text-nowrap"
                                style="font-size: 50px">
                                Strategic Communications
                            </h1>
                            <h1 class="section-title d-flex fw-600 fz-200 reveal-text mb-0 text-nowrap"
                                style="font-size: 50px">
                                & Brand Building</h1>
                        </div>
                        <div class="col-lg-12">
                            <h2 class="h6 fw-500 fz-font-lg reveal-text mb-0 py-5">We help ambitious brands craft powerful
                                narratives, build meaningful connections, and earn visibility where it matters most. Through
                                integrated communication strategies, we position our clients to stand out in competitive
                                markets, strengthen their reputation, and engage audiences across multiple touchpoints.
                            </h2>
                        </div>
                    </div>

                    <div class="col-xxl-7 col-lg-6 scene at_fade_anim" data-speed=".8" data-delay=".4"
                        data-fade-from="bottom" data-ease="bounce">
                        <div data-speed=".8">
                            <img class="layer" data-depth="0.8" src="assets/imgs/pages/img-155.webp" alt="orisa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Services Section --}}
    <div class="sec-2-services overflow-hidden pt-120 pb-120">
        <div class="container">
            <div class="row g-3">
                @forelse ($services as $service)
                    @php
                        $cardNumber = ($loop->index % 3) + 1;
                        $fallbackImages = [
                            "assets/imgs/pages/img-76.webp",
                            "assets/imgs/pages/img-77.webp",
                            "assets/imgs/pages/img-78.webp",
                            "assets/imgs/pages/img-80.webp",
                        ];
                        $image = $service->image ? asset("storage/" . $service->image) : asset($fallbackImages[$loop->index % count($fallbackImages)]);
                        $isDark = in_array($cardNumber, [1, 3], true);
                    @endphp

                    <div class="col-lg-3 col-md-6">
                        <div class="at-service-card card-{{ $cardNumber }} rounded-4 overflow-hidden p-relative {{ $isDark ? "bg-cover" : "bg-neutral-50" }}"
                            @if ($isDark) data-background="{{ $image }}" @endif>
                            <a href="{{ route("creative.services.show", $service->slug) }}" class="p-absolute top-0 left-0 w-100 h-100" aria-label="{{ $service->title }}"></a>

                            @unless ($isDark)
                                <a href="{{ route("creative.services.show", $service->slug) }}" class="p-absolute bottom-0 start-0 end-0">
                                    <img class="img-cover" src="{{ $image }}" alt="{{ $service->title }}">
                                </a>
                            @endunless

                            <div class="at-service-card-content {{ $isDark ? "text-white" : "" }} p-absolute {{ $cardNumber === 1 ? "bottom-0 start-0 end-0" : ($cardNumber === 2 ? "top-0 left-0" : "top-50 left-0 translate-middle-y") }} m-xxl-5 m-4">
                                <div class="at-service-card-icon">
                                    @if ($service->icon)
                                        <span class="h4 mb-0">{{ $service->icon }}</span>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                            <path d="M7.5 15C11.6421 15 15 11.6421 15 7.5C15 11.6412 18.3563 14.9984 22.4971 15C18.3563 15.0016 15 18.3588 15 22.5C15 18.3579 11.6421 15 7.5 15Z" fill="currentColor" />
                                        </svg>
                                    @endif
                                </div>
                                <h3 class="h6 {{ $isDark ? "text-white" : "" }} mt-3"><a href="{{ route("creative.services.show", $service->slug) }}">{{ $service->title }}</a></h3>
                                <div class="at-service-card-description">
                                    <p class="{{ $isDark ? "text-white" : "" }} mb-0">{{ $service->excerpt }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="mb-0">No services have been published yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="sec-2-about pt-120 p-relative bg-neutral-50">
        <div class="position-absolute w-100 h-100 d-grid top-0 md:grid-cols-7 gap-0 z-0 opacity-10">
            <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
            </div>
            <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
            </div>
            <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
            </div>
            <div class="position-relative h-100 border-r border-dark/01 md:border-none">
                <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
                <div
                    class="absolute top-[20%] left-0 right-0 h-[30%] bg-gradient-to-b from-white/5 to-transparent pointer-events-none">
                </div>
            </div>
            <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
            </div>
            <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
            </div>
            <div class="position-relative h-100 overflow-hidden d-md-block border-dark/01">
                <div class="absolute bottom-0 left-0 right-0 border-white/10"></div>
            </div>
        </div>
        <div class="container p-relative z-1">
            <div class="row pb-50 align-items-end">
                <div class="col-lg-4 col-md-4">
                    <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                        <span class="text-uppercase">
                            <span class="text-1">Step by step</span>
                            <span class="text-2">Step by step</span>
                        </span>
                        <i>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                    fill="currentColor"></path>
                            </svg>
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                    fill="currentColor"></path>
                            </svg>
                        </i>
                    </span>
                    <h2 class="h3 reveal-text">Creative Experiences & Event Production</h2>
                </div>
                <div class="col-xxl-5 col-lg-8 text-lg-end ms-auto">
                    <h3 class="h6 fw-600 fz-font-lg">Our Creative Studio serves as the innovation hub behind bold ideas,
                        immersive experiences, and memorable brand moments. We transform concepts into compelling campaigns
                        that resonate with audiences, spark conversations, and leave lasting impressions.
                        From developing distinctive brand identities and producing multimedia campaigns to curating
                        high-impact events and cultural activations, we create experiences that bring brands to life. Every
                        project is designed to inspire engagement, foster community, and turn audiences into advocates,
                        ensuring that every interaction becomes part of a larger, meaningful story.
                    </h3>
                </div>
            </div>
        </div>
    @endsection
