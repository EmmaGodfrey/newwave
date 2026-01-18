@extends('frontend.layouts.app')

@section('content')
<!-- Parallax Image Header -->
<section class="parallax-header section-padding valign bg-img bg-imgfixed bg-position-top" data-overlay-dark="3"
    data-background="{{ asset('assets/frontend/images/car_pics/sunset_duo.jpg') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <h1>Every rev tells a story</h1>
                <h6 class="wow" data-splitting>Capturing speed, culture, and community through our lens.</h6>
                <div class="btn-wrap mt-30">
                    <div class="btn-link"> <a href="{{ route('portfolio') }}">Discover our work</a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About  -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h6 class="wow" data-splitting>Who We Are</h6>
                <h1 class="wow" data-splitting>New Wave Motorsport</h1>
                <p class="mt-30 wow fadeInUp" data-wow-delay="0.3s"> New Wave Motorsport is a motorsport-focused photography and videography brand built to capture speed, culture, and community. More than just visuals, we document the energy of the motorsport scene and give both established and upcoming enthusiasts a platform to be seen. </p>
                <p class="wow fadeInUp" data-wow-delay="0.6s"> Founded in 2023 with a simple vision: to tell motorsport stories authentically. We started with nothing more than a phone, passion, and consistency—covering local car culture, spinning sessions, practice runs, and events while learning and improving with every shoot. </p>
                <div class="btn-wrap wow fadeInUp text-left mt-30 mb-30" data-wow-delay="0.9s">
                    <div class="btn-link"> <a href="mailto:info@newwavemotorsport.com">info@newwavemotorsport.com</a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="reveal-effect"> <img src="{{ asset('assets/frontend/images/car_pics/event-coverage-01.jpg') }}" class="img-fluid br-10px" alt="New Wave Motorsport"
                        loading="lazy" /> </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center mb-60">
            <div class="col-md-12 text-center">
                <h6 class="wow" data-splitting>Speed captured in every frame</h6>
                <h1 class="wow" data-splitting>Portfolio</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio fade-in section-padding">
                    <div class="item">
                        <a href="{{ route('portfolio') }}" class="img portrait"
                            style="background-image: url('{{ asset('assets/frontend/images/car_pics/spinning-event-01.jpg') }}');">
                            <div class="overlay"></div> <span class="hover-text">Event Coverage</span>
                        </a>
                        <a href="{{ route('portfolio') }}" class="img landscape"
                            style="background-image: url('{{ asset('assets/frontend/images/car_pics/car-meet-01.jpg') }}');">
                            <div class="overlay"></div> <span class="hover-text">Drift Photography</span>
                        </a>
                        <a href="{{ route('portfolio') }}" class="img landscape"
                            style="background-image: url('{{ asset('assets/frontend/images/car_pics/track-action-01.jpg') }}');">
                            <div class="overlay"></div> <span class="hover-text">Track Action</span>
                        </a>
                        <a href="{{ route('portfolio') }}" class="img portrait"
                            style="background-image: url('{{ asset('assets/frontend/images/car_pics/drift-competition-01.jpg') }}');">
                            <div class="overlay"></div> <span class="hover-text">Car Shows</span>
                        </a> <img class="canvas-1" src="{{ asset('assets/frontend/images/canvas-1.png') }}" width="373" alt="Canvas 1" /> <img
                            class="canvas-2" src="{{ asset('assets/frontend/images/canvas-2.png') }}" width="373" alt="Canvas 2" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 justify-align-center">
                <div class="btn-wrap wow fadeInUp text-center" data-wow-delay=".3s">
                        <div class="btn-link"> <a href="{{ route('portfolio') }}">View portfolio </a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services -->
<section class="services section-padding">
    <div class="container">
        <div class="row mb-45">
            <div class="col-md-4">
                <h6 class="wow" data-splitting>Capture the Speed</h6>
                <h1 class="wow" data-splitting>Services</h1>
            </div>
            <div class="col-md-7 offset-md-1 mt-45">
                <p class="wow fadeInUp" data-wow-delay=".6s">Discover our specialized motorsport services including event coverage,
                    automotive photography, drone work, content creation, and brand storytelling — crafted to capture the energy and passion of motorsport culture.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="{{ route('services') }}"> <img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="">
                            <h5>Event Coverage</h5>
                            <p>Complete motorsport event documentation capturing the adrenaline, competition, and community atmosphere that makes each event unique.</p>
                            <div class="numb">01</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('services') }}"> <img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="">
                            <h5>Automotive Photography</h5>
                            <p>Professional car photography showcasing vehicles in their best light, from static studio shots to dynamic action captures.</p>
                            <div class="numb">02</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('services') }}"> <img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="">
                            <h5>Content Creation</h5>
                            <p>Social media content, promotional materials, and branded campaigns designed to connect with the motorsport community.</p>
                            <div class="numb">03</div>
                        </a>
                    </div>
                    <div class="item quicklinks">
                        <a href="{{ route('services') }}"> <img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="">
                            <h5>Drone Work</h5>
                            <p>Aerial perspectives that showcase the scale and excitement of motorsport events from unique vantage points.</p>
                            <div class="numb">04</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('services') }}"> <img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="">
                            <h5>Brand Storytelling</h5>
                            <p>Authentic narratives that connect brands with the motorsport community through compelling visual content.</p>
                            <div class="numb">05</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="{{ route('services') }}"> <img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="">
                            <h5>Video Production</h5>
                            <p>Dynamic video content from event highlights to promotional campaigns that capture the energy of motorsport.</p>
                            <div class="numb">06</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Process 2 -->
<section class="interactive process2">
    <div class="process2-content">
        <div class="process2-content-inner">
            <div class="item">
                <div class="inner activate" data-index="0">
                    <div class="cont">
                        <div class="text">
                            <h2><a href="{{ route('services') }}">Event Coverage</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner" data-index="1">
                    <div class="cont">
                        <div class="text">
                            <h2><a href="{{ route('services') }}">Drift Photography</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner" data-index="2">
                    <div class="cont">
                        <div class="text">
                            <h2><a href="{{ route('services') }}">Track Action</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner" data-index="3">
                    <div class="cont">
                        <div class="text">
                            <h2><a href="{{ route('services') }}">Car Shows & Meets</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="process2-list-image">
            <div class="process2-image img-0 show" data-bg="{{ asset('assets/frontend/images/car_pics/sunset-duo-cars.jpg') }}"
                style="background-image: url('{{ asset('assets/frontend/images/car_pics/sunset-duo-cars.jpg') }}');"></div>
            <div class="process2-image img-1" data-bg="{{ asset('assets/frontend/images/car_pics/drift-action-01.jpg') }}"
                style="background-image: url('{{ asset('assets/frontend/images/car_pics/drift-action-01.jpg') }}');"></div>
            <div class="process2-image img-2" data-bg="{{ asset('assets/frontend/images/car_pics/car-show-01.jpg') }}"
                style="background-image: url('{{ asset('assets/frontend/images/car_pics/car-show-01.jpg') }}');"></div>
            <div class="process2-image img-3" data-bg="{{ asset('assets/frontend/images/car_pics/spinning-action-01.jpg') }}"
                style="background-image: url('{{ asset('assets/frontend/images/car_pics/spinning-action-01.jpg') }}');"></div>
        </div>
    </div>
</section>
<!-- Pricing -->
<section class="price section-padding">
    <div class="container">
        <div class="row justify-content-center mb-45">
            <div class="col-md-12 text-center">
                <h6 class="wow" data-splitting>Choose the package that fits your event</h6>
                <h1 class="wow" data-splitting>Packages</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="item">
                    <h6>Get a quote</h6>
                    <h3>Event Coverage</h3>
                    <div class="cont">
                        <ul class="dot-list">
                            <li>Full event documentation</li>
                            <li>200+ edited photos</li>
                            <li>Highlight reel video</li>
                            <li>Social media content</li>
                            <li>2 photographers</li>
                            <li>Online gallery</li>
                        </ul>
                        <div class="btn-wrap text-left mt-15">
                            <div class="btn-link"> <a href="{{ route('contact') }}">Get in touch </a> <span
                                    class="btn-block color1 animation-bounce"></span> </div>
                        </div>
                    </div>
                    <div class="numb">Event</div>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#0"
                        class="rmore">
                        <div class="arrow"> <span>$</span>900</div>
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
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <h6>Get a quote</h6>
                    <h3>Brand Campaign</h3>
                    <div class="cont">
                        <ul class="dot-list">
                            <li>Custom content strategy</li>
                            <li>50 branded photos</li>
                            <li>Promotional video</li>
                            <li>Social media assets</li>
                            <li>Brand storytelling</li>
                            <li>Usage rights included</li>
                        </ul>
                        <div class="btn-wrap text-left mt-15">
                            <div class="btn-link"> <a href="{{ route('contact') }}">Get in touch </a> <span
                                    class="btn-block color1 animation-bounce"></span> </div>
                        </div>
                    </div>
                    <div class="numb">Brand</div>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#0"
                        class="rmore active">
                        <div class="arrow"> <span>$</span>800</div>
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
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item">
                    <h6>Get a quote</h6>
                    <h3>Car Photography</h3>
                    <div class="cont">
                        <ul class="dot-list">
                            <li>Studio or location shoot</li>
                            <li>Multiple angles covered</li>
                            <li>30 edited photos</li>
                            <li>Detail & action shots</li>
                            <li>Drone footage available</li>
                            <li>Commercial usage rights</li>
                        </ul>
                        <div class="btn-wrap text-left mt-15">
                            <div class="btn-link"> <a href="{{ route('contact') }}">Get in touch </a> <span
                                    class="btn-block color1 animation-bounce"></span> </div>
                        </div>
                    </div>
                    <div class="numb">Auto</div>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#0"
                        class="rmore">
                        <div class="arrow"> <span>$</span>700</div>
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
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Process -->
<section class="process section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-45 text-center">
                <h6 class="wow" data-splitting>Your Event Coverage, Step by Step</h6>
                <h1 class="wow" data-splitting>Our Process</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="process-area">
                    <div class="process-item wow fadeInLeft" data-wow-delay=".2s">
                        <div class="process-step"> <span>01</span> </div>
                        <div class="process-content">
                            <h4 class="title">Consult & Plan</h4>
                            <p class="desc">We start by understanding your vision and goals, ensuring every detail is
                                aligned with your expectations for a seamless shoot.</p>
                        </div>
                    </div>
                    <div class="process-item wow fadeInLeft" data-wow-delay=".4s">
                        <div class="process-step"> <span>02</span> </div>
                        <div class="process-content">
                            <h4 class="title">Shoot Day</h4>
                            <p class="desc">Our team captures every moment with precision and creativity, turning your
                                special day into timeless memories.</p>
                        </div>
                    </div>
                    <div class="process-item wow fadeInLeft" data-wow-delay=".6s">
                        <div class="process-step"> <span>03</span> </div>
                        <div class="process-content">
                            <h4 class="title">Edit & Deliver</h4>
                            <p class="desc">Post-production is handled with care, enhancing each photo to perfection
                                before delivering your final collection promptly.</p>
                        </div>
                    </div>
                </div>
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
                    <h4 class="wow" data-splitting>Let's build the global motorsport community together.</h4>
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
                                <p>New Wave Motorsport captured the energy and passion of our spinning event perfectly. Their authentic approach to motorsport storytelling made our brand shine in ways we never expected.</p> <span
                                    class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="{{ asset('assets/frontend/images/team/1.jpg') }}" alt="" loading="lazy"> </div>
                                    <div class="cont">
                                        <h6>Marcus Johnson</h6> <span>Event Organizer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <p>From grassroots coverage to professional campaigns, New Wave Motorsport delivers content that truly connects with the car community. Their growth speaks for itself.</p> <span
                                    class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="{{ asset('assets/frontend/images/team/2.jpg') }}" alt="" loading="lazy"> </div>
                                    <div class="cont">
                                        <h6>Sarah Mitchell</h6> <span>Brand Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection