@php
    $site = $currentSite ?? null;
    $clientId = $site?->getSetting('google_adsense_client_id')
        ?: config('services.google_adsense.client_id');
@endphp

@if ($clientId)
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ urlencode($clientId) }}"
        crossorigin="anonymous"></script>
@endif
