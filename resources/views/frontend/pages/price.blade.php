@extends('frontend.layouts.app')

@section('content')
<!-- Pricing -->
<section class="price section-padding">
    <div class="container">
        <div class="row justify-content-center mb-45">
            <div class="col-md-12 text-center">
                <h6 class="wow" data-splitting>Choose the package that fits your story</h6>
                <h1 class="wow" data-splitting>Price plan</h1>
            </div>
        </div>
        <div class="row">
            @forelse($pricing as $service)
                <div class="col-md-4">
                    <div class="item">
                        <h6>{{ $service->price_label ?? 'Get a quote' }}</h6>
                        <h3>{{ $service->name }}</h3>
                        <div class="cont">
                            <ul class="dot-list">
                                @if($service->features)
                                    @foreach($service->features as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="btn-wrap text-left mt-15">
                                <div class="btn-link"> <a href="{{ route('contact') }}">Get in touch </a> <span
                                        class="btn-block color1 animation-bounce"></span> </div>
                            </div>
                        </div>
                        <div class="numb">{{ $service->category ?? 'Service' }}</div>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#0"
                            class="rmore{{ $service->is_featured ? ' active' : '' }}">
                            <div class="arrow"> <span>$</span>{{ number_format($service->price, 0) }}</div>
                            <div class="br-left-top">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path
                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                        fill="#1b1b1b"></path>
                                </svg>
                            </div>
                            <div class="br-right-bottom">
                                <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                    <path
                                        d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                        fill="#1b1b1b"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-md-12 text-center">
                    <p>No pricing packages available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Testiominals -->
<section id="testimonials" class="testimonials">
    <div class="background bg-img bg-imgfixed section-padding" data-overlay-dark="5"
        data-background="images/slider/01.jpg">
        <div class="container">
            <div class="row align-items-center">
                <!-- Work together -->
                <div class="col-md-5 mb-30">
                    <h4 class="wow" data-splitting>Let’s capture the perfect shots together.</h4>
                    <div class="btn-wrap mt-30 text-left wow fadeInUp" data-wow-delay=".6s">
                        <div class="btn-link"><a href="mailto:info@newwavemotorsport.com">info@newwavemotorsport.com</a><span
                                class="btn-block color3 animation-bounce"></span></div>
                    </div>
                </div>
                <!-- Testiominals -->
                <div class="col-md-5 offset-md-2">
                    <div class="testimonials-box">
                        <h5>What Are Clients Saying?</h5>
                        <div class="owl-carousel owl-theme">
                            @foreach($testimonials as $testimonial)
                                <div class="item">
                                    <p>{{ $testimonial->testimonial }}</p> 
                                    <span class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                    <div class="info">
                                        <div class="author-img">
                                            <i class="ti-user" style="font-size: 40px; color: #aa8453;"></i>
                                        </div>
                                        <div class="cont">
                                            <h6>{{ $testimonial->client_name }}</h6> 
                                            <span>{{ $testimonial->client_position ?? 'Customer' }}</span>
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
    </div>
</section>@endsection
