@php
    $site = $currentSite ?? null;
    $measurementId = $site?->getSetting('google_analytics_id')
        ?: config('services.google_analytics.measurement_id');
@endphp

@if ($measurementId)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ urlencode($measurementId) }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', @json($measurementId));
    </script>
@endif
