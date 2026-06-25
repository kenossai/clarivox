@extends('creative::layouts.app')

@section('title', $service->title . ' - ' . config('app.name'))

@section('content')
    @php
        $image = $service->image ? asset('storage/' . $service->image) : asset('assets/imgs/pages/img-155.webp');
    @endphp

    <div class="sec-1-services overflow-hidden">
        <div class="bg-neutral-50">
            <div class="container">
                <div class="row align-items-center p-relative">
                    <div class="col-xxl-5 col-lg-6 pt-lg-0 pt-100">
                        <a href="{{ route('creative.services.index') }}" class="at-btn common-black bg-transparent mb-10 rounded-0 p-0">
                            <span class="text-uppercase">
                                <span class="text-1">Services</span>
                                <span class="text-2">Services</span>
                            </span>
                        </a>

                        <h1 class="section-title fw-600 reveal-text mb-4" style="font-size: 64px">
                            {{ $service->title }}
                        </h1>

                        @if ($service->excerpt)
                            <h2 class="h6 fw-500 fz-font-lg reveal-text mb-0 py-3">
                                {{ $service->excerpt }}
                            </h2>
                        @endif
                    </div>

                    <div class="col-xxl-7 col-lg-6 scene at_fade_anim" data-speed=".8" data-delay=".4"
                        data-fade-from="bottom" data-ease="bounce">
                        <div data-speed=".8">
                            <img class="layer" data-depth="0.8" src="{{ $image }}" alt="{{ $service->title }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sec-2-services overflow-hidden pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="fz-font-lg">
                        {!! $service->description ?: '<p>' . e($service->excerpt) . '</p>' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
