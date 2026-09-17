@php($measurementId = config('analytics.measurement_id'))
@if(!auth()->check() && is_string($measurementId) && preg_match('/^G-[A-Z0-9]+$/', $measurementId))
<section id="analytics-consent" class="analytics-consent" role="region" aria-labelledby="analytics-consent-title" hidden
    data-measurement-id="{{ $measurementId }}"
    data-page-url="{{ \App\Support\Seo::url(request()->path() === '/' ? '' : request()->path()) }}"
    data-page-title="{{ request()->route()?->getName() }}">
    <h2 id="analytics-consent-title">Your privacy choices</h2>
    <p>Essential cookies keep this site working. With your permission, Google Analytics uses cookies to help us understand visits, popular pages and enquiries. Google receives usage and device data. Analytics is optional; rejecting it will not affect the site.</p>
    <p><a href="{{ route('cookies') }}">Cookie policy</a> &middot; <a href="{{ route('privacy') }}">Privacy policy</a></p>
    <div class="analytics-actions">
        <button type="button" data-analytics-choice="denied">Reject analytics</button>
        <button type="button" data-analytics-choice="granted">Accept analytics</button>
        <button type="button" id="analytics-close" hidden>Keep current choice</button>
    </div>
</section>
<script src="{{ asset('assets/js/analytics-consent.js') }}" defer></script>
@endif
