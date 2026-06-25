@extends('creative::layouts.app')

@section('title', 'About Us - ' . config('app.name'))
@section('content')
    <div class="sec-1-about pt-150 overflow-hidden">
        <div class="container pb-100">
            <div class="row align-items-center g-4">
                <div class="col-12">
                    <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                        <span class="text-uppercase">
                            <span class="text-1">About Us</span>
                            <span class="text-2">About Us</span>
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
                </div>
                <div class="col-lg-7 h-100">
                    <h2 class="section-title fw-600 lh-1 reveal-text">We are a creative digital agency shaping meaningful
                        experiences</h2>
                </div>
                <div class="col-lg-5 ms-auto">
                    <h3 class="h6 mb-4 fw-600">At CLARIVOX Creatives, we tell the stories shaping Africa's future. As a
                        modern communications and experiential agency, we connect culture with commerce, helping visionary
                        brands, influential personalities, creative industries, governments, and institutions build
                        relevance, spark conversations, and expand their influence across borders.
                    </h3>

                </div>
            </div>
        </div>
        <div class="at-item-anime-area">
            <div class="swiper about-me-slider-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="about-me-slider-thumb at-item-anime marque">
                            <img class="w-100 rounded-4" src="assets/imgs/pages/img-117.webp" alt="orisa">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="about-me-slider-thumb at-item-anime marque">
                            <img class="w-100 rounded-4" src="assets/imgs/pages/img-118.webp" alt="orisa">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="about-me-slider-thumb at-item-anime marque">
                            <img class="w-100 rounded-4" src="assets/imgs/pages/img-119.webp" alt="orisa">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="about-me-slider-thumb at-item-anime marque">
                            <img class="w-100 rounded-4" src="assets/imgs/pages/img-120.webp" alt="orisa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- About Team Section --}}

    <div class="home-3-section-9 p-relative">
        <div class="position-absolute w-100 h-100 d-grid top-0 md:grid-cols-7 gap-0 z-n1 opacity-10">
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
        <div class="pt-120 overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <span class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                            <span class="text-uppercase">
                                <span class="text-1">MEET OUR TEAM</span>
                                <span class="text-2">MEET OUR TEAM</span>
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
                    </div>
                    <div class="col-lg-5 h-100">
                        <h1 class="section-title fw-500 fz-ds-1 lh-1 reveal-text">Behind the Visionaries</h1>
                    </div>

                    <div class="col-lg-5 ms-auto">
                        <p class="fz-font-3xl mb-4">Creative experts designing meaningful digital experiences that help
                            ambitious brands grow faster and lead their markets.</p>
                        <div class="at-btn-group at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                            <a class="at-btn-circle" href="team.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15"
                                    fill="none">
                                    <path
                                        d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                            <a class="at-btn z-index-1" href="team.html">Join our Team</a>
                            <a class="at-btn-circle" href="team.html">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"
                                    viewBox="0 0 16 15" fill="none">
                                    <path
                                        d="M0.0001297 8.99993L0 3.00407e-05L2 0L2.0001 6.99993L12.1719 7.00003L8.22224 3.05027L9.63644 1.63606L16.0003 8.00003L9.63644 14.364L8.22224 12.9497L12.1719 9.00003L0.0001297 8.99993Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row pt-80 g-4">
                    <!-- beautify ignore:start -->
                            <div class="col-lg-3 col-md-6 pt-md-5 changeless">
                <div class="team-card">
                    <div class="team-card-image">
                        <div class="anim-zoomin">
                            <img src="assets/imgs/pages/img-17.webp" alt="Darrell Steward" class="img-cover">
                        </div>
                    </div>
                    <a href="team-details.html" class="team-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                            <path d="M7.85986 2.43872L1.7123 8.58629L0.702148 7.57614L6.84971 1.42857H1.43131V0H9.28843V7.85714H7.85986V2.43872Z" fill="currentColor" />
                        </svg>
                    </a>
                    <div class="team-card-content">
                        <a href="team-details.html" class="team-card-name">
                            <h2 class="h6 fz-font-2xl">Darrell Steward</h2>
                        </a>
                        <p class="team-card-position fz-font-sm m-0 common-white">UI/UX Designer</p>
                    </div>
                </div>
            </div><div class="col-lg-3 col-md-6 changeless">
                <div class="team-card">
                    <div class="team-card-image">
                        <div class="anim-zoomin">
                            <img src="assets/imgs/pages/img-18.webp" alt="Amelia Courtney" class="img-cover">
                        </div>
                    </div>
                    <a href="team-details.html" class="team-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                            <path d="M7.85986 2.43872L1.7123 8.58629L0.702148 7.57614L6.84971 1.42857H1.43131V0H9.28843V7.85714H7.85986V2.43872Z" fill="currentColor" />
                        </svg>
                    </a>
                    <div class="team-card-content">
                        <a href="team-details.html" class="team-card-name">
                            <h2 class="h6 fz-font-2xl">Amelia Courtney</h2>
                        </a>
                        <p class="team-card-position fz-font-sm m-0 common-white">Project Manager</p>
                    </div>
                </div>
            </div><div class="col-lg-3 col-md-6 pt-md-5 changeless">
                <div class="team-card">
                    <div class="team-card-image">
                        <div class="anim-zoomin">
                            <img src="assets/imgs/pages/img-19.webp" alt="Esther Howard" class="img-cover">
                        </div>
                    </div>
                    <a href="team-details.html" class="team-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                            <path d="M7.85986 2.43872L1.7123 8.58629L0.702148 7.57614L6.84971 1.42857H1.43131V0H9.28843V7.85714H7.85986V2.43872Z" fill="currentColor" />
                        </svg>
                    </a>
                    <div class="team-card-content">
                        <a href="team-details.html" class="team-card-name">
                            <h2 class="h6 fz-font-2xl">Esther Howard</h2>
                        </a>
                        <p class="team-card-position fz-font-sm m-0 common-white">Software Developer</p>
                    </div>
                </div>
            </div><div class="col-lg-3 col-md-6 changeless">
                <div class="team-card">
                    <div class="team-card-image">
                        <div class="anim-zoomin">
                            <img src="assets/imgs/pages/img-20.webp" alt="Jacob Jones" class="img-cover">
                        </div>
                    </div>
                    <a href="team-details.html" class="team-card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                            <path d="M7.85986 2.43872L1.7123 8.58629L0.702148 7.57614L6.84971 1.42857H1.43131V0H9.28843V7.85714H7.85986V2.43872Z" fill="currentColor" />
                        </svg>
                    </a>
                    <div class="team-card-content">
                        <a href="team-details.html" class="team-card-name">
                            <h2 class="h6 fz-font-2xl">Jacob Jones</h2>
                        </a>
                        <p class="team-card-position fz-font-sm m-0 common-white">Marketing CEO</p>
                    </div>
                </div>
            </div>

            {{-- Brand Section --}}
            <div class="sec-3-home-3 pt-130 pb-130 bg-neutral-50">
                <div class="container">
                    <div class="row g-xxl-5 g-4">
                        <div class="col-3xl-6 col-xxl-5 col-lg-3 col-12">
                            <div class="row g-xxl-5 g-4">
                                <div class="col-xxl-5 col-lg-12 col-md-5 col-12 d-lg-none d-xxl-block">
                                    <div class="img-left ripple-image ripples">
                                        <img src="assets/imgs/pages/img-56.webp" alt="orisa">
                                    </div>
                                </div>
                                <div class="col-xxl-7 col-lg-12 col-md-7 col-12">
                                    <div class="d-flex flex-column gap-3">
                                        <div class="d-flex gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="43" viewBox="0 0 34 43" fill="none">
                                                <path d="M12.5 26.66L3.00442 26.66C0.68247 26.66 -0.759179 24.4843 0.420807 22.761L14.986 1.48852C16.7967 -1.15609 21.5 -0.0494029 21.5 3.02127L21.5 16.34L30.9956 16.34C33.3175 16.34 34.7592 18.5157 33.5792 20.239L19.014 41.5115C17.2033 44.1561 12.5 43.0494 12.5 39.9787L12.5 26.66Z" fill="currentColor" />
                                            </svg>
                                            <h1 class="h4 reveal-text">Trusted by fast-growing brands worldwide</h1>
                                        </div>
                                        <div class="img-right">
                                            <img src="assets/imgs/pages/img-57.webp" alt="orisa">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3xl-6 col-xxl-7 col-lg-9 col-12">
                            <div class="d-inline-flex">
                                <div class="at-brand-scroll">
                                    <div class="at-brand-scroll-wrap d-flex flex-wrap justify-content-end gap-2">
                                        <div class="at-brand-item at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="01"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-01.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="02"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-02.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="03"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-03.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="at-brand-item at_fade_anim" data-delay=".4" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="05"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-05.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="06"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-06.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="07"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-07.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="at-brand-item at_fade_anim" data-delay=".6" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="03"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-03.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="04"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-04.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="05"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-05.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="at-brand-item at_fade_anim" data-delay=".7" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="04"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-04.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="05"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-05.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="06"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-06.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="at-brand-item at_fade_anim" data-delay=".5" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="06"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-06.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="07"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-07.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="08"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-08.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="at-brand-item at_fade_anim" data-delay=".6" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="07"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-07.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="08"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-08.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="09"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-09.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="at-brand-item at_fade_anim" data-delay=".7" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="08"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-08.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="09"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-09.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="10"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-10.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="at-brand-item at_fade_anim" data-delay=".5" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="02"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-02.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="03"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-03.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="04"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-04.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 text-center d-flex flex-column justify-content-center align-items-center ms-lg-5">
                                            <h2 class="mb-0">$<span class="odometer" data-count="850"></span>M+</h2>
                                            <p class="fz-font-lg text-start mb-0">in total revenue generated <br> for clients</p>
                                        </div>
                                        <div class="at-brand-item at_fade_anim" data-delay=".6" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="09"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-09.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="10"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-10.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="01"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-01.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                        <div class="at-brand-item at_fade_anim d-md-none d-lg-block" data-delay=".7" data-fade-from="bottom" data-ease="bounce">
                                            <div class="brand">
                                                <span class="brand-logo-slide" data-logo="10"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-10.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="01"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-01.webp" alt="orisa"></span>
                                                <span class="brand-logo-slide" data-logo="02"><img decoding="async" class="dark-mode-invert" src="assets/imgs/template/logo/logo-brand-02.webp" alt="orisa"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
@endsection
