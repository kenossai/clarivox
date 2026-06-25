@extends('creative::layouts.app')

@section('title', 'Our Impact - ' . config('app.name'))
@section('content')
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-area position-relative z-1">
        <div class="container-fluid px-xxl-5">
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <h2 class="section-title style-one fw-black text-title">Our Impact</h2>
                    <ul class="br-menu list-unstyled">
                        <li><a href="{{ route('creative.home') }}">HOME</a></li>
                        <li>OUR IMPACT</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Impact Intro Start -->
    <div class="container ptb-120">
        <div class="row align-items-center mb-60">
            <div class="col-xl-6 pe-xxl-5 mb-md-30">
                <h6 class="section-subtitle style-two d-inline-block fs-13 ls-1 font-optional fw-semibold position-relative text_primary mb-20">
                    SHAPING CONVERSATIONS
                </h6>
                <h2 class="section-title style-one fw-normal text-title mb-25">Communication has the power to <span
                        class="fw-black">shape perceptions, inspire action, and create opportunities.</span></h2>
                <p>Our work is focused on helping organisations and individuals communicate with purpose while creating
                    experiences that foster genuine engagement.</p>
            </div>
            <div class="col-xl-6">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=1100&q=80"
                    alt="Crowd engaging with a cultural experience" class="round-20 w-100">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6">
                <div class="project-card style-four bg-1 position-relative overflow-hidden z-1 round-10 mb-45"
                    style="background-image: linear-gradient(rgba(10,18,32,.18), rgba(10,18,32,.7)), url('https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=900&q=80');">
                    <span class="project-status transition">Culture & Commerce</span>
                    <span class="project-counter text-center font-secondary fw-semibold d-block lh-1 transition">01</span>
                    <div class="project-title d-flex flex-wrap align-items-center justify-content-between">
                        <h3 class="fs-24 fw-semibold mb-0"><a href="{{ route('creative.contact.show') }}"
                                class="text-title hover-text-primary transition">Driving Cultural and Commercial Impact</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="project-card style-four bg-2 position-relative overflow-hidden z-1 round-10 mb-45"
                    style="background-image: linear-gradient(rgba(10,18,32,.18), rgba(10,18,32,.7)), url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=900&q=80');">
                    <span class="project-status transition">African Stories</span>
                    <span class="project-counter text-center font-secondary fw-semibold d-block lh-1 transition">02</span>
                    <div class="project-title d-flex flex-wrap align-items-center justify-content-between">
                        <h3 class="fs-24 fw-semibold mb-0"><a href="{{ route('creative.contact.show') }}"
                                class="text-title hover-text-primary transition">Amplifying African Stories Globally</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="project-card style-four bg-3 position-relative overflow-hidden z-1 round-10 mb-45"
                    style="background-image: linear-gradient(rgba(10,18,32,.18), rgba(10,18,32,.7)), url('https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&w=900&q=80');">
                    <span class="project-status transition">Experiences</span>
                    <span class="project-counter text-center font-secondary fw-semibold d-block lh-1 transition">03</span>
                    <div class="project-title d-flex flex-wrap align-items-center justify-content-between">
                        <h3 class="fs-24 fw-semibold mb-0"><a href="{{ route('creative.contact.show') }}"
                                class="text-title hover-text-primary transition">Creating Meaningful Experiences</a></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-60">
            <div class="col-lg-4 mb-30">
                <h3 class="fs-24 fw-semibold text-title">Beyond Visibility</h3>
                <p>By connecting creativity, culture, and strategic communication, we help clients achieve meaningful
                    outcomes that extend beyond being seen.</p>
            </div>
            <div class="col-lg-4 mb-30">
                <h3 class="fs-24 fw-semibold text-title">Presence With Purpose</h3>
                <p>We create opportunities for brands, institutions, and personalities to strengthen their presence and
                    engage diverse audiences.</p>
            </div>
            <div class="col-lg-4 mb-30">
                <h3 class="fs-24 fw-semibold text-title">Moments People Remember</h3>
                <p>Every campaign, event, and communication initiative is designed to inspire, engage, and create a sense of
                    belonging.</p>
            </div>
        </div>
    </div>
    <!-- Impact Section End -->
@endsection
