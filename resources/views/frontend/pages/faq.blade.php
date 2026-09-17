@extends('frontend.layouts.app')

@section('title', 'FAQs - ' . config('app.name'))

@section('content')
<!-- FAQs -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center mb-45">
            <div class="col-md-12 text-center">
                <h6 class="wow" data-splitting>Frequently Asked Questions</h6>
                <h1 class="wow" data-splitting>Common Questions</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                @if($faqs->count() > 0)
                @foreach($faqs as $faq)
                <details class="faq-item">
                    <summary>{{ $faq->question }}</summary>
                    <p>{!! nl2br(e($faq->answer)) !!}</p>
                </details>
                @endforeach
                @else
                <div class="text-center">
                    <p>No FAQs available at the moment.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

@include('frontend.partials.testimonials')


<!-- Scrolling -->
<div class="scrolling scrolling-ticker">
    <div class="wrapper">
        <div class="content">
            <span><img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="" loading="lazy">Speed</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="" loading="lazy">Action</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="" loading="lazy">Motion</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="" loading="lazy">Racing</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="" loading="lazy">Power</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="" loading="lazy">Drift</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="" loading="lazy">Track</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="" loading="lazy">Wheels</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="" loading="lazy">Engine</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="" loading="lazy">Capture</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="" loading="lazy">Moment</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="" loading="lazy">Passion</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="" loading="lazy">Adrenaline</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="" loading="lazy">Victory</span>
        </div>
        <div class="content">
            <span><img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="" loading="lazy">Speed</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="" loading="lazy">Action</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="" loading="lazy">Motion</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="" loading="lazy">Racing</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="" loading="lazy">Power</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="" loading="lazy">Drift</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="" loading="lazy">Track</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="" loading="lazy">Wheels</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="" loading="lazy">Engine</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="" loading="lazy">Capture</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="" loading="lazy">Moment</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="" loading="lazy">Passion</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="" loading="lazy">Adrenaline</span>
            <span><img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="" loading="lazy">Victory</span>
        </div>
    </div>
</div>
@endsection
