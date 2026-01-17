@extends('frontend.layouts.app')

@section('content')
<!-- Parallax Image Header -->
<section class="parallax-header section-padding valign bg-img bg-imgfixed bg-position-top" data-overlay-dark="3"
    data-background="{{ asset('assets/frontend/images/slider/01.jpg') }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <h1>Every frame tells a story</h1>
                <h6 class="wow" data-splitting>Life’s most beautiful moments through our lens.</h6>
                <div class="btn-wrap mt-30">
                    <div class="btn-link"> <a href="portfolio.html">Discover more</a> <span
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
                <h6 class="wow" data-splitting>About Us</h6>
                <h1 class="wow" data-splitting>Behind the lens</h1>
                <p class="mt-30 wow fadeInUp" data-wow-delay="0.3s"> We believe every image has a soul. Through light,
                    emotion, and timing, we frame stories that speak without words. Photography is not just craft — it’s
                    connection. Moments pass, but memories we create last forever. </p>
                <p class="wow fadeInUp" data-wow-delay="0.6s"> Fusce suere quis sem quis efficitur. Etiam ac cursus
                    lacus a retium arus crase eratodio congue a nulla quis iaculis laoreet risus. Orci varius natoque
                    penatis magnis miss the duru parturient montes, nascetur ridiculus in the fermen. </p>
                <div class="btn-wrap wow fadeInUp text-left mt-30 mb-30" data-wow-delay="0.9s">
                    <div class="btn-link"> <a href="mailto:hello@gloom.com">hello@gloom.com</a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="reveal-effect"> <img src="{{ asset('assets/frontend/images/about.jpg') }}" class="img-fluid br-10px" alt="Gloom"
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
                <h6 class="wow" data-splitting>Time stands still in every shot</h6>
                <h1 class="wow" data-splitting>Portfolio</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio fade-in section-padding">
                    <div class="item">
                        <a href="portfolio.html" class="img portrait"
                            style="background-image: url('{{ asset('assets/frontend/images/portfolio/1.jpg') }}');">
                            <div class="overlay"></div> <span class="hover-text">Wedding Photography</span>
                        </a>
                        <a href="portfolio.html" class="img landscape"
                            style="background-image: url('{{ asset('assets/frontend/images/portfolio/2.jpg') }}');">
                            <div class="overlay"></div> <span class="hover-text">Art Photography</span>
                        </a>
                        <a href="portfolio.html" class="img landscape"
                            style="background-image: url('{{ asset('assets/frontend/images/portfolio/3.jpg') }}');">
                            <div class="overlay"></div> <span class="hover-text">Travel Photography</span>
                        </a>
                        <a href="portfolio.html" class="img portrait"
                            style="background-image: url('{{ asset('assets/frontend/images/portfolio/4.jpg') }}');">
                            <div class="overlay"></div> <span class="hover-text">Fashion Photography</span>
                        </a> <img class="canvas-1" src="{{ asset('assets/frontend/images/canvas-1.png') }}" width="373" alt="Canvas 1" /> <img
                            class="canvas-2" src="{{ asset('assets/frontend/images/canvas-2.png') }}" width="373" alt="Canvas 2" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 justify-align-center">
                <div class="btn-wrap wow fadeInUp text-center" data-wow-delay=".3s">
                    <div class="btn-link"> <a href="portfolio.html">View portfolio </a> <span
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
                <h6 class="wow" data-splitting>Capture the Moment</h6>
                <h1 class="wow" data-splitting>Services</h1>
            </div>
            <div class="col-md-7 offset-md-1 mt-45">
                <p class="wow fadeInUp" data-wow-delay=".6s">Discover my professional services including photography,
                    videography, retouching, aerials, lighting, and grading — crafted to capture your moments with
                    precision and creativity.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="services-page.html"> <img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="">
                            <h5>Photography</h5>
                            <p>We capture your story with artistic vision and professional precision, turning every
                                moment into timeless visual memories.</p>
                            <div class="numb">01</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="services-page.html"> <img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="">
                            <h5>Videography</h5>
                            <p>We capture your story with artistic vision and professional precision, turning every
                                moment into timeless visual memories.</p>
                            <div class="numb">02</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="services-page.html"> <img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="">
                            <h5>Retouching</h5>
                            <p>We capture your story with artistic vision and professional precision, turning every
                                moment into timeless visual memories.</p>
                            <div class="numb">03</div>
                        </a>
                    </div>
                    <div class="item quicklinks">
                        <a href="services-page.html"> <img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="">
                            <h5>Drone</h5>
                            <p>We capture your story with artistic vision and professional precision, turning every
                                moment into timeless visual memories.</p>
                            <div class="numb">04</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="services-page.html"> <img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="">
                            <h5>Lighting</h5>
                            <p>We capture your story with artistic vision and professional precision, turning every
                                moment into timeless visual memories.</p>
                            <div class="numb">05</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="services-page.html"> <img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="">
                            <h5>Grading</h5>
                            <p>We capture your story with artistic vision and professional precision, turning every
                                moment into timeless visual memories.</p>
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
                            <h2><a href="services.html">Wedding Photography</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner" data-index="1">
                    <div class="cont">
                        <div class="text">
                            <h2><a href="services.html">Fine Art Photography</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner" data-index="2">
                    <div class="cont">
                        <div class="text">
                            <h2><a href="services.html">Travel & Nature Photography</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="inner" data-index="3">
                    <div class="cont">
                        <div class="text">
                            <h2><a href="services.html">Fashion Photography</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="process2-list-image">
            <div class="process2-image img-0 show" data-bg="{{ asset('assets/frontend/images/slider/01.jpg') }}"
                style="background-image: url('{{ asset('assets/frontend/images/slider/01.jpg') }}');"></div>
            <div class="process2-image img-1" data-bg="{{ asset('assets/frontend/images/slider/02.jpg') }}"
                style="background-image: url('{{ asset('assets/frontend/images/slider/02.jpg') }}');"></div>
            <div class="process2-image img-2" data-bg="{{ asset('assets/frontend/images/slider/04.jpg') }}"
                style="background-image: url('{{ asset('assets/frontend/images/slider/04.jpg') }}');"></div>
            <div class="process2-image img-3" data-bg="{{ asset('assets/frontend/images/slider/03.jpg') }}"
                style="background-image: url('{{ asset('assets/frontend/images/slider/03.jpg') }}');"></div>
        </div>
    </div>
</section>
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
            <div class="col-md-4">
                <div class="item">
                    <h6>Get a quote</h6>
                    <h3>Wedding Package</h3>
                    <div class="cont">
                        <ul class="dot-list">
                            <li>Full-day coverage</li>
                            <li>100+ edited photos</li>
                            <li>Premium album</li>
                            <li>Pre-wedding shoot</li>
                            <li>2 photographers</li>
                            <li>Online gallery</li>
                        </ul>
                        <div class="btn-wrap text-left mt-15">
                            <div class="btn-link"> <a href="contact.html">Get in touch </a> <span
                                    class="btn-block color1 animation-bounce"></span> </div>
                        </div>
                    </div>
                    <div class="numb">Wedding</div>
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
                    <h3>Drone Add-on</h3>
                    <div class="cont">
                        <ul class="dot-list">
                            <li>30 min aerial shoot</li>
                            <li>5 edited drone photos</li>
                            <li>4K video clips</li>
                            <li>Insured operator</li>
                            <li>Cinematic flyovers</li>
                            <li>Outdoor ready</li>
                        </ul>
                        <div class="btn-wrap text-left mt-15">
                            <div class="btn-link"> <a href="contact.html">Get in touch </a> <span
                                    class="btn-block color1 animation-bounce"></span> </div>
                        </div>
                    </div>
                    <div class="numb">Drone</div>
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
                    <h3>Travel Session</h3>
                    <div class="cont">
                        <ul class="dot-list">
                            <li>Outdoor location</li>
                            <li>50 miles travel</li>
                            <li>20 edited photos</li>
                            <li>Mini album</li>
                            <li>2 outfit changes</li>
                            <li>Sunset timing</li>
                        </ul>
                        <div class="btn-wrap text-left mt-15">
                            <div class="btn-link"> <a href="contact.html">Get in touch </a> <span
                                    class="btn-block color1 animation-bounce"></span> </div>
                        </div>
                    </div>
                    <div class="numb">Travel</div>
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
                <h6 class="wow" data-splitting>Your Session, Step by Step</h6>
                <h1 class="wow" data-splitting>Process</h1>
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
        data-background="{{ asset('assets/frontend/images/slider/01.jpg') }}">
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
                            <div class="item">
                                <p>Working with Gloom was an unforgettable experience. Their attention to detail and
                                    creative vision brought our special day to life in the most beautiful way.</p> <span
                                    class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="{{ asset('assets/frontend/images/team/1.jpg') }}" alt="" loading="lazy"> </div>
                                    <div class="cont">
                                        <h6>Emily Brown</h6> <span>Customer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <p>Working with Gloom was an unforgettable experience. Their attention to detail and
                                    creative vision brought our special day to life in the most beautiful way.</p> <span
                                    class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="{{ asset('assets/frontend/images/team/2.jpg') }}" alt="" loading="lazy"> </div>
                                    <div class="cont">
                                        <h6>Jason White</h6> <span>Customer</span>
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