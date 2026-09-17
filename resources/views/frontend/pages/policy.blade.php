@extends('frontend.layouts.app')
@section('content')
<section class="section-padding policy-page">
    <div class="container">
        <h1>{{ $policyTitle }}</h1>
        <p>Last updated: {{ config('site.policy_version') }}</p>
        @foreach($sections as $heading => $text)
            <h2>{{ $heading }}</h2>
            <p>{{ $text }}</p>
        @endforeach
        <h2>Contact</h2>
        <p>{{ config('site.business_name') }} &middot; Zambia</p>
        @if(filled($globalContactSettings?->address))<p>{{ $globalContactSettings->address }}</p>@endif
        <p><a href="mailto:{{ config('site.privacy_email') ?: ($globalContactSettings?->email ?: 'info@newwavemotorsport.com') }}">{{ config('site.privacy_email') ?: ($globalContactSettings?->email ?: 'info@newwavemotorsport.com') }}</a></p>
        <p><a href="{{ route('contact') }}">Contact NewWave</a></p>
    </div>
</section>
@endsection
