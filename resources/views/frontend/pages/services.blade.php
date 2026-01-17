@extends('frontend.layouts.app')

@section('content')
<!-- Services  -->
<section class="services section-padding">
    <div class="container">
        <div class="row mb-45">
            <div class="col-md-4">
                <h6 class="wow" data-splitting>Services That I Provide</h6>
                <h1 class="wow" data-splitting>Services</h1>
            </div>
            <div class="col-md-6 offset-md-2 mt-45 wow fadeInUp" data-wow-delay="0.3s">
                <p>Phasellus et lacus suscipit congue nisl the volutpat magna. donec miss the drana risus tincidunt
                    convallis velit orci congue tortor eu dignissim ipsum suam non odio. Pellenta esuntion miss the
                    imperdiet metus ornare.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="0.5s">
                <a href="services-page.html">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-1.svg') }}" alt="">
                        <h5>Photography</h5>
                        <p>We capture your story with artistic vision and professional precision, turning every moment
                            into timeless visual memories.</p>
                        <div class="numb">01</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="0.7s">
                <a href="services-page.html">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-2.svg') }}" alt="">
                        <h5>Videography</h5>
                        <p>We capture your story with artistic vision and professional precision, turning every moment
                            into timeless visual memories.</p>
                        <div class="numb">02</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="0.9s">
                <a href="services-page.html">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-3.svg') }}" alt="">
                        <h5>Photo Retouching</h5>
                        <p>We capture your story with artistic vision and professional precision, turning every moment
                            into timeless visual memories.</p>
                        <div class="numb">03</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="1.1s">
                <a href="services-page.html">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-4.svg') }}" alt="">
                        <h5>Aerial Photography</h5>
                        <p>We capture your story with artistic vision and professional precision, turning every moment
                            into timeless visual memories.</p>
                        <div class="numb">04</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="1.3s">
                <a href="services-page.html">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-5.svg') }}" alt="">
                        <h5>Lightning Setup</h5>
                        <p>We capture your story with artistic vision and professional precision, turning every moment
                            into timeless visual memories.</p>
                        <div class="numb">05</div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="1.5s">
                <a href="services-page.html">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-6.svg') }}" alt="">
                        <h5>Video Color Grading</h5>
                        <p>We capture your story with artistic vision and professional precision, turning every moment
                            into timeless visual memories.</p>
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
</section>@endsection
