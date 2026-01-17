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
            <div class="col-lg-4 col-md-12 mb-45">
                <div class="item">
                    <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/1.jpg') }}" alt="" loading="lazy"></a>
                    </div>
                    <div class="bg"></div>
                    <div class="con">
                        <a href="team-details.html">
                            <div class="title"><span>Olivia</span></div>
                            <div class="subtitle"><span>Lead Photographer</span></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-45">
                <div class="item">
                    <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/2.jpg') }}" alt="" loading="lazy"></a>
                    </div>
                    <div class="bg"></div>
                    <div class="con">
                        <a href="team-details.html">
                            <div class="title"><span>James</span></div>
                            <div class="subtitle"><span>Fashion Photographer</span></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-45">
                <div class="item">
                    <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/3.jpg') }}" alt="" loading="lazy"></a>
                    </div>
                    <div class="bg"></div>
                    <div class="con">
                        <a href="team-details.html">
                            <div class="title"><span>Sophia</span></div>
                            <div class="subtitle"><span>Wedding Photographer</span></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-45">
                <div class="item">
                    <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/4.jpg') }}" alt="" loading="lazy"></a>
                    </div>
                    <div class="bg"></div>
                    <div class="con">
                        <a href="team-details.html">
                            <div class="title"><span>Frank</span></div>
                            <div class="subtitle"><span>Portrait Photographer</span></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-45">
                <div class="item">
                    <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/5.jpg') }}" alt="" loading="lazy"></a>
                    </div>
                    <div class="bg"></div>
                    <div class="con">
                        <a href="team-details.html">
                            <div class="title"><span>Emma</span></div>
                            <div class="subtitle"><span>Lighting Specialist</span></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mb-45">
                <div class="item">
                    <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/6.jpg') }}" alt="" loading="lazy"></a>
                    </div>
                    <div class="bg"></div>
                    <div class="con">
                        <a href="team-details.html">
                            <div class="title"><span>Emily</span></div>
                            <div class="subtitle"><span>Drone Photographer</span></div>
                        </a>
                    </div>
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
