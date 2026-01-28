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
                <ul class="accordion-box clearfix">
                    @foreach($faqs as $index => $faq)
                    <li class="accordion block {{ $index === 0 ? 'active-block' : '' }}">
                        <div class="acc-btn"><span class="count">{{ $index + 1 }}.</span> {{ $faq->question }}</div>
                        <div class="acc-content {{ $index === 0 ? 'current' : '' }}">
                            <div class="content">
                                <div class="text">{!! nl2br(e($faq->answer)) !!}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                <div class="text-center">
                    <p>No FAQs available at the moment.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
@if($testimonials->count() > 0)
<section id="testimonials" class="testimonials">
    <div class="background bg-img bg-imgfixed section-padding" data-overlay-dark="5" data-background="{{ asset('assets/frontend/images/car_pics/sunset_duo.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <!-- Work together -->
                <div class="col-md-5 mb-30">
                    <h4 class="wow" data-splitting>Let's capture the perfect shots together.</h4>
                    @if($globalContactSettings && $globalContactSettings->email)
                    <div class="btn-wrap mt-30 text-left wow fadeInUp" data-wow-delay=".6s">
                        <div class="btn-link"><a href="mailto:{{ $globalContactSettings->email }}">{{ $globalContactSettings->email }}</a><span class="btn-block color3 animation-bounce"></span></div>
                    </div>
                    @endif
                </div>
                <!-- Testimonials -->
                <div class="col-md-5 offset-md-2">
                    <div class="testimonials-box">
                        <h5>What Are Clients Saying?</h5>
                        <div class="owl-carousel owl-theme">
                            @foreach($testimonials as $testimonial)
                            <div class="item">
                                <p>{{ $testimonial->content }}</p>
                                <span class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                <div class="info">
                                    @if($testimonial->image)
                                    <div class="author-img">
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" loading="lazy">
                                    </div>
                                    @endif
                                    <div class="cont">
                                        <h6>{{ $testimonial->name }}</h6>
                                        <span>{{ $testimonial->position ?? 'Customer' }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

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
