@extends('frontend.layouts.app')

@section('content')
<!-- Parallax Image Header -->
<section class="parallax-header section-padding valign bg-img bg-imgfixed bg-position-top" data-overlay-dark="5"
    data-background="{{ asset('assets/frontend/images/car_pics/sunset_duo.jpg') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <p class="hero-kicker">NewWave Motorsport</p>
                <h1><span class="hero-title-accent">Every rev</span><br>tells a story</h1>
                <p class="hero-description">Capturing speed, culture, and community through our lens.</p>
                <div class="hero-actions">
                    <div class="btn-link"> <a href="{{ route('portfolio') }}">Discover our work</a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                    <a class="hero-secondary" href="{{ route('contact') }}">Enquire about a shoot &rarr;</a>
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
                <h2 class="wow" data-splitting>New Wave Motorsport</h2>
                <p class="mt-30 wow fadeInUp" data-wow-delay="0.3s"> New Wave Motorsport is a motorsport-focused photography and videography brand built to capture speed, culture, and community. More than just visuals, we document the energy of the motorsport scene and give both established and upcoming enthusiasts a platform to be seen. </p>
                <p class="wow fadeInUp" data-wow-delay="0.6s">Based in Zambia, we photograph motorsport events, vehicles and the people behind the local car community.</p>
                <div class="btn-wrap wow fadeInUp text-left mt-30 mb-30" data-wow-delay="0.9s">
                    <div class="btn-link"> <a href="mailto:{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}">{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}</a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="reveal-effect"> <img src="{{ asset('assets/frontend/images/car_pics/event-coverage-01.jpg') }}" class="img-fluid br-10px" alt="Motorsport event coverage by NewWave"
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
                <h2 class="wow" data-splitting>Portfolio</h2>
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
                        </a> <img class="canvas-1" src="{{ asset('assets/frontend/images/canvas-1.png') }}" width="373" alt="" /> <img
                            class="canvas-2" src="{{ asset('assets/frontend/images/canvas-2.png') }}" width="373" alt="" />
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
@if($services->isNotEmpty())
<section class="services section-padding">
    <div class="container">
        <div class="row mb-45">
            <div class="col-md-4">
                <h6 class="wow" data-splitting>Capture the Speed</h6>
                <h2 class="wow" data-splitting>Services</h2>
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
@endif
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
<!-- Process -->
<section class="process section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-45 text-center">
                <h6 class="wow" data-splitting>Your Event Coverage, Step by Step</h6>
                <h2 class="wow" data-splitting>Our Process</h2>
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
                            <p class="desc">Our team photographs the action and atmosphere, turning your
                                special day into timeless memories.</p>
                        </div>
                    </div>
                    <div class="process-item wow fadeInLeft" data-wow-delay=".6s">
                        <div class="process-step"> <span>03</span> </div>
                        <div class="process-content">
                            <h4 class="title">Edit & Deliver</h4>
                            <p class="desc">Post-production is handled with care, editing the selected photographs
                                before delivering your final collection promptly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.partials.testimonials')
@endsection