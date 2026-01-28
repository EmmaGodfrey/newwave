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
                    <div class="btn-link"> <a href="mailto:{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}">{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}</a> <span
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
                    @forelse($services as $index => $service)
                    <div class="item">
                        <a href="{{ route('services') }}"> <img src="{{ asset('assets/frontend/images/icons/icon-' . (($index % 5) + 1) . '.svg') }}" alt="">
                            <h5>{{ $service->name }}</h5>
                            <p>{{ $service->description ?? 'Specialized motorsport service tailored to capture the essence of your event.' }}</p>
                            <div class="numb">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        </a>
                    </div>
                    @empty
                    <div class="item">
                        <p class="text-center">No services available.</p>
                    </div>
                    @endforelse
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
            @forelse($pricing->take(3) as $index => $service)
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
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center">
                    <p>No pricing packages available at the moment.</p>
                </div>
            @endforelse
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
                        <div class="btn-link"><a href="mailto:{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}">{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}</a><span
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
</section>
@endsection