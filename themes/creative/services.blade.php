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
                <div class="col-lg-3 col-md-6">
                    <div class="at-service-card card-1 rounded-4 overflow-hidden p-relative bg-cover"
                        data-background="assets/imgs/pages/img-76.webp">
                        <a href="#" class="p-absolute top-0 left-0 w-100 h-100"></a>
                        <div class="at-service-card-content text-white p-absolute bottom-0 start-0 end-0 m-xxl-5 m-4">
                            <div class="at-service-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                    fill="none">
                                    <path
                                        d="M7.5 15C11.6421 15 15 11.6421 15 7.5C15 11.6412 18.3563 14.9984 22.4971 15C18.3563 15.0016 15 18.3588 15 22.5C15 18.3579 11.6421 15 7.5 15C3.35786 15 5.08894e-07 18.3579 3.27835e-07 22.5L0 30L7.5 30C11.6421 30 15 26.6421 15 22.5C15 26.6421 18.3579 30 22.5 30L30 30L30 22.5C30 18.3588 26.6437 15.0016 22.5029 15C26.6437 14.9984 30 11.6412 30 7.5L30 6.31805e-06L22.5 6.64589e-06C18.3579 6.82695e-06 15 3.35787 15 7.5C15 3.35787 11.6421 5.21315e-06 7.5 5.39421e-06L2.62268e-06 3.8147e-06L1.63918e-06 7.5C1.096e-06 11.6421 3.35786 15 7.5 15Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="h6 text-white mt-3"><a href="#">Strategy & Research</a></h3>
                            <div class="at-service-card-description">
                                <p class="text-white mb-0">Through research, analysis, and positioning, we build a clear
                                    foundation for meaningful digital growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="at-service-card card-2 rounded-4 overflow-hidden p-relative bg-neutral-50">
                        <a href="#" class="p-absolute bottom-0 start-0 end-0">
                            <img class="img-cover" src="assets/imgs/pages/img-77.webp" alt="orisa">
                        </a>
                        <div class="at-service-card-content p-absolute top-0 left-0 m-xxl-5 m-4">
                            <div class="at-service-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                    fill="none">
                                    <path d="M15 0H30V15L15 0Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15 15V0H7.5L0 7.5V15V30H15H22.5L30 22.5V15H15ZM15 15V30L0 15H15Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="h6 mt-3"><a href="#">Design & Experience</a></h3>
                            <div class="at-service-card-description">
                                <p class="mb-0">Every interaction is crafted to balance beauty, usability, and brand
                                    personality.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="at-service-card card-3 rounded-4 overflow-hidden p-relative">
                        <a href="#" class="p-absolute top-0 left-0">
                            <img class="img-cover" src="assets/imgs/pages/img-78.webp" alt="orisa">
                        </a>
                        <a href="#" class="p-absolute bottom-0 start-0 end-0">
                            <img class="img-cover" src="assets/imgs/pages/img-79.webp" alt="orisa">
                        </a>
                        <div
                            class="at-service-card-content text-white p-absolute top-50 left-0 mx-xxl-5 mx-4 translate-middle-y">
                            <div class="at-service-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M30 0L20 10L10 0L0 10V30L10 20L20 30L30 20V0ZM10 20V10H20V20H10Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="h6 text-white mt-3"><a href="#">Network Integration</a></h3>
                            <div class="at-service-card-description">
                                <p class="mb-0 text-white">From on-premise to cloud environments, we ensure seamless
                                    communication, scalability, and operational stability.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="at-service-card card-2 rounded-4 overflow-hidden p-relative bg-neutral-50">
                        <a href="#" class="p-absolute bottom-0 start-0 end-0">
                            <img class="img-cover" src="assets/imgs/pages/img-80.webp" alt="orisa">
                        </a>
                        <div class="at-service-card-content p-absolute top-50 left-0 mx-xxl-5 mx-4 translate-middle-y">
                            <div class="at-service-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" fill="none">
                                    <path d="M10 10L20 0H30V10L20 20V10H10Z" fill="currentColor" />
                                    <path d="M20 20H30V30H20V20Z" fill="currentColor" />
                                    <path d="M10 10L0 20V30H10L20 20H10V10Z" fill="currentColor" />
                                    <path d="M10 10H0V0H10V10Z" fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="h6 mt-3"><a href="#">Build & Launch</a></h3>
                            <div class="at-service-card-description">
                                <p class="mb-0">Bring ideas to life with clean, scalable, and performance-driven builds.
                                    From development to launch, we focus on reliability and long-term growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="at-service-card card-1 rounded-4 overflow-hidden p-relative bg-cover"
                        data-background="assets/imgs/pages/img-76.webp">
                        <a href="#" class="p-absolute top-0 left-0 w-100 h-100"></a>
                        <div class="at-service-card-content text-white p-absolute bottom-0 start-0 end-0 m-xxl-5 m-4">
                            <div class="at-service-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" fill="none">
                                    <path
                                        d="M7.5 15C11.6421 15 15 11.6421 15 7.5C15 11.6412 18.3563 14.9984 22.4971 15C18.3563 15.0016 15 18.3588 15 22.5C15 18.3579 11.6421 15 7.5 15C3.35786 15 5.08894e-07 18.3579 3.27835e-07 22.5L0 30L7.5 30C11.6421 30 15 26.6421 15 22.5C15 26.6421 18.3579 30 22.5 30L30 30L30 22.5C30 18.3588 26.6437 15.0016 22.5029 15C26.6437 14.9984 30 11.6412 30 7.5L30 6.31805e-06L22.5 6.64589e-06C18.3579 6.82695e-06 15 3.35787 15 7.5C15 3.35787 11.6421 5.21315e-06 7.5 5.39421e-06L2.62268e-06 3.8147e-06L1.63918e-06 7.5C1.096e-06 11.6421 3.35786 15 7.5 15Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="h6 text-white mt-3"><a href="#">Strategy & Research</a></h3>
                            <div class="at-service-card-description">
                                <p class="text-white mb-0">Through research, analysis, and positioning, we build a clear
                                    foundation for meaningful digital growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="at-service-card card-2 rounded-4 overflow-hidden p-relative bg-neutral-50">
                        <a href="#" class="p-absolute bottom-0 start-0 end-0">
                            <img class="img-cover" src="assets/imgs/pages/img-77.webp" alt="orisa">
                        </a>
                        <div class="at-service-card-content p-absolute top-0 left-0 m-xxl-5 m-4">
                            <div class="at-service-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" fill="none">
                                    <path d="M15 0H30V15L15 0Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15 15V0H7.5L0 7.5V15V30H15H22.5L30 22.5V15H15ZM15 15V30L0 15H15Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="h6 mt-3"><a href="#">Design & Experience</a></h3>
                            <div class="at-service-card-description">
                                <p class="mb-0">Every interaction is crafted to balance beauty, usability, and brand
                                    personality.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="at-service-card card-3 rounded-4 overflow-hidden p-relative">
                        <a href="#" class="p-absolute top-0 left-0">
                            <img class="img-cover" src="assets/imgs/pages/img-78.webp" alt="orisa">
                        </a>
                        <a href="#" class="p-absolute bottom-0 start-0 end-0">
                            <img class="img-cover" src="assets/imgs/pages/img-79.webp" alt="orisa">
                        </a>
                        <div
                            class="at-service-card-content text-white p-absolute top-50 left-0 mx-xxl-5 mx-4 translate-middle-y">
                            <div class="at-service-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M30 0L20 10L10 0L0 10V30L10 20L20 30L30 20V0ZM10 20V10H20V20H10Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="h6 text-white mt-3"><a href="#">Network Integration</a></h3>
                            <div class="at-service-card-description">
                                <p class="mb-0 text-white">From on-premise to cloud environments, we ensure seamless
                                    communication, scalability, and operational stability.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="at-service-card card-2 rounded-4 overflow-hidden p-relative bg-neutral-50">
                        <a href="#" class="p-absolute bottom-0 start-0 end-0">
                            <img class="img-cover" src="assets/imgs/pages/img-80.webp" alt="orisa">
                        </a>
                        <div class="at-service-card-content p-absolute top-50 left-0 mx-xxl-5 mx-4 translate-middle-y">
                            <div class="at-service-card-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 30 30" fill="none">
                                    <path d="M10 10L20 0H30V10L20 20V10H10Z" fill="currentColor" />
                                    <path d="M20 20H30V30H20V20Z" fill="currentColor" />
                                    <path d="M10 10L0 20V30H10L20 20H10V10Z" fill="currentColor" />
                                    <path d="M10 10H0V0H10V10Z" fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="h6 mt-3"><a href="#">Build & Launch</a></h3>
                            <div class="at-service-card-description">
                                <p class="mb-0">Bring ideas to life with clean, scalable, and performance-driven builds.
                                    From development to launch, we focus on reliability and long-term growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
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
