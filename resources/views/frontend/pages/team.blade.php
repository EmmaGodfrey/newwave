@extends('frontend.layouts.app')

@section('content')
<!-- Team -->
<section class="team section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-45 text-center">
                <h6 class="wow" data-splitting>The Soul Behind the Lens</h6>
                <h1 class="wow" data-splitting>Pro-team</h1>
            </div>
        </div>
        <div class="row">
            @forelse($teamMembers as $member)
                <div class="col-lg-4 col-md-12 mb-45">
                    <div class="item">
                        <div class="img">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" loading="lazy">
                        </div>
                        <div class="bg"></div>
                        <div class="con">
                            <div class="title"><span>{{ $member->name }}</span></div>
                            <div class="subtitle"><span>{{ $member->position }}</span></div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center mt-60 mb-60">
                    <p class="wow fadeInUp" style="font-size: 18px; color: #777;">No team members available at the moment.</p>
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
                        <div class="btn-link"><a href="mailto:hello@gloom.com">hello@gloom.com</a><span
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
</section>@endsection
