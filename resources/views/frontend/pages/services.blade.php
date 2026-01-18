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
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="0.5s">
                <a href="{{ route('portfolio') }}">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="">
                        <h5>Motorsport Photography</h5>
                        <p>High-energy action shots capturing drift sessions, track days, car meets, and spinning events. We document the authentic culture of motorsport with professional precision.</p>
                        <div class="numb">01</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="0.7s">
                <a href="{{ route('portfolio') }}">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="">
                        <h5>Motorsport Videography</h5>
                        <p>Dynamic video content for events, promotional campaigns, and branded content. From event coverage to driver features, we create engaging visual stories.</p>
                        <div class="numb">02</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="0.9s">
                <a href="{{ route('portfolio') }}">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="">
                        <h5>Photo Enhancement</h5>
                        <p>Professional editing and color grading to make every shot pop. We enhance the raw energy of motorsport while maintaining authentic visual integrity.</p>
                        <div class="numb">03</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="1.1s">
                <a href="{{ route('portfolio') }}">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="">
                        <h5>Event Coverage</h5>
                        <p>Complete event documentation from setup to finish. We've covered major events like Mike's Spin Bash, Woza Spin Fest, and ZedGear Spin Fest with comprehensive visual storytelling.</p>
                        <div class="numb">04</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="1.3s">
                <a href="{{ route('contact') }}">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="">
                        <h5>Brand Collaborations</h5>
                        <p>Promotional shoots, reviews, and visual campaigns for automotive brands. Our engaged following of 300k-400k views helps amplify your brand message.</p>
                        <div class="numb">05</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="1.5s">
                <a href="{{ route('contact') }}">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-6.svg') }}" alt="">
                        <h5>Content Strategy</h5>
                        <p>Complete content creation and distribution strategy. From car spotting to street culture coverage, we help build authentic connections with motorsport communities.</p>
                        <div class="numb">06</div>
                    </div>
                </a>
            </div>
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
                            <div class="item">
                                <p>New Wave Motorsport captured the raw energy and passion of our event perfectly. Their dedication to authentic storytelling and professional quality made our spin bash unforgettable. The content reached thousands and truly represented our community.</p> <span
                                    class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="{{ asset('assets/frontend/images/team/1.jpg') }}" alt="" loading="lazy"> </div>
                                    <div class="cont">
                                        <h6>Mike Johnson</h6> <span>Event Organizer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <p>The team at New Wave Motorsport understands car culture like no other. Their coverage of our track day captured not just the action, but the soul of what we do. Professional, passionate, and authentic—exactly what motorsport content should be.</p> <span
                                    class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="{{ asset('assets/frontend/images/team/2.jpg') }}" alt="" loading="lazy"> </div>
                                    <div class="cont">
                                        <h6>David Rodriguez</h6> <span>Professional Driver</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@endsection
