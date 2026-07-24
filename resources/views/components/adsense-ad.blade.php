@props([
    'adSlot' => null,
    'format' => 'auto',
    'layout' => null,
    'fullWidthResponsive' => true,
    'class' => '',
])

@php
    $site = $currentSite ?? null;
    $clientId = $site?->getSetting('google_adsense_client_id')
        ?: config('services.google_adsense.client_id');
    $slotId = $adSlot
        ? ($site?->getSetting($adSlot)
            ?: $site?->getSetting("google_adsense_{$adSlot}")
            ?: config("services.google_adsense.{$adSlot}"))
        : null;

    if (! $slotId && is_string($adSlot) && preg_match('/^\d+$/', $adSlot)) {
        $slotId = $adSlot;
    }
@endphp

@if ($clientId && $slotId)
    <div class="adsense-slot {{ $class }}">
        <ins class="adsbygoogle" style="display:block" data-ad-client="{{ $clientId }}" data-ad-slot="{{ $slotId }}"
            data-ad-format="{{ $format }}"
            @if ($layout) data-ad-layout="{{ $layout }}" @endif
            @if ($fullWidthResponsive) data-full-width-responsive="true" @endif></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
@endif
