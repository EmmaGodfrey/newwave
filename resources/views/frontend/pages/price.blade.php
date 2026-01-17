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
                            <div class="item">
                                <p>Working with Gloom was an unforgettable experience. Their attention to detail and
                                    creative vision brought our special day to life in the most beautiful way.</p> <span
                                    class="quote"><img src="images/quot.png" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="images/team/1.jpg" alt="" loading="lazy"> </div>
                                    <div class="cont">
                                        <h6>Emily Brown</h6> <span>Customer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <p>Working with Gloom was an unforgettable experience. Their attention to detail and
                                    creative vision brought our special day to life in the most beautiful way.</p> <span
                                    class="quote"><img src="images/quot.png" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="images/team/2.jpg" alt="" loading="lazy"> </div>
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
</section>@endsection
