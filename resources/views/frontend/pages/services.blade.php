@extends('frontend.layouts.app')

@section('content')
<!-- Services  -->
<section class="services section-padding">
    <div class="container">
        <div class="row mb-45">
            <div class="col-md-4">
                <h6 class="wow" data-splitting>Services That We Provide</h6>
                <h1 class="wow" data-splitting>Our Services</h1>
            </div>
            <div class="col-md-6 offset-md-2 mt-45 wow fadeInUp" data-wow-delay="0.3s">
                <p>New Wave Motorsport specializes in authentic motorsport content creation, capturing the energy and culture of the automotive scene. From grassroots events to professional shoots, we deliver high-quality visuals that tell your story with passion and precision.</p>
            </div>
        </div>
        <div class="row">
            @forelse($services as $index => $service)
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="{{ 0.5 + ($index * 0.2) }}s">
                <a href="{{ route('portfolio') }}">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-' . (($index % 6) + 1) . '.svg') }}" alt="">
                        <h5>{{ $service->name }}</h5>
                        <p>{{ $service->description ?? 'Professional motorsport service tailored to your needs.' }}</p>
                        <div class="numb">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>No services available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Testiominals -->
<section id="testimonials" class="testimonials">
    <div class="background bg-img bg-imgfixed section-padding" data-overlay-dark="5"
        data-background="{{ asset('assets/frontend/images/car_pics/motorsport-event-01.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <!-- Work together -->
                <div class="col-md-5 mb-30">
                    <h4 class="wow" data-splitting>Let's capture your motorsport story together.</h4>
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
                            @forelse($testimonials as $testimonial)
                            <div class="item">
                                <p>{{ $testimonial->testimonial }}</p> <span
                                    class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img">
                                        <i class="ti-user" style="font-size: 40px; color: #aa8453;"></i>
                                    </div>
                                    <div class="cont">
                                        <h6>{{ $testimonial->client_name }}</h6> <span>{{ $testimonial->client_position ?? 'Customer' }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="item">
                                <p>No testimonials available.</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@endsection
