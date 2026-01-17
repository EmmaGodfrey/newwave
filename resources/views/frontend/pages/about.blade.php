@extends('frontend.layouts.app')

@section('content')
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
                <div class="reveal-effect"><img src="{{ asset('assets/frontend/images/about.jpg') }}" class="img-fluid br-10px" alt="Gloom"
                        loading="lazy"></div>
            </div>
        </div>
    </div>
</section>
<!-- Skills -->
<section id="skills" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h6 class="wow" data-splitting>Mastery in every frame</h6>
                <h1 class="wow" data-splitting>Skills</h1>
                <p class="mt-30 wow fadeInUp" data-wow-delay="0.3s"> Pellentesque magna magna semper dapibus felis neca
                    aliuen risus. Pellentesque habitant morbi tristique senectus et netus malesuada fames ac turpis
                    egestas in the fermen. </p>
                <div class="btn-wrap wow fadeInUp text-left mt-30 mb-30" data-wow-delay="0.6s">
                    <div class="btn-link"> <a href="#">View services</a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
                <p class="bar-title wow fadeInUp" data-wow-delay="0.9s"> Photoshop <span class="percent">90%</span> </p>
                <div class="bar wow fadeInUp" data-wow-delay="1.2s">
                    <div class="bar-fill"></div>
                </div>
                <p class="bar-title wow fadeInUp" data-wow-delay="1.5s"> Lightroom <span class="percent">80%</span> </p>
                <div class="bar wow fadeInUp" data-wow-delay="1.8s">
                    <div class="bar-fill"></div>
                </div>
                <p class="bar-title wow fadeInUp" data-wow-delay="2.1s"> Composition <span class="percent">95%</span>
                </p>
                <div class="bar wow fadeInUp" data-wow-delay="2.4s">
                    <div class="bar-fill"></div>
                </div>
                <p class="bar-title wow fadeInUp" data-wow-delay="2.7s"> Lighting <span class="percent">85%</span> </p>
                <div class="bar wow fadeInUp" data-wow-delay="3.0s">
                    <div class="bar-fill"></div>
                </div>
                <p class="bar-title wow fadeInUp" data-wow-delay="3.3s"> Retouching <span class="percent">90%</span>
                </p>
                <div class="bar wow fadeInUp" data-wow-delay="3.6s">
                    <div class="bar-fill"></div>
                </div>
            </div>
        </div>
    </div>
</section>
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
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/1.jpg') }}" alt=""
                                    loading="lazy"></a></div>
                        <div class="bg"></div>
                        <div class="con">
                            <a href="team-details.html">
                                <div class="title"><span>Olivia</span></div>
                                <div class="subtitle"><span>Lead Photographer</span></div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/2.jpg') }}" alt=""
                                    loading="lazy"></a></div>
                        <div class="bg"></div>
                        <div class="con">
                            <a href="team-details.html">
                                <div class="title"><span>James</span></div>
                                <div class="subtitle"><span>Fashion Photographer</span></div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/3.jpg') }}" alt=""
                                    loading="lazy"></a></div>
                        <div class="bg"></div>
                        <div class="con">
                            <a href="team-details.html">
                                <div class="title"><span>Sophia</span></div>
                                <div class="subtitle"><span>Wedding Photographer</span></div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/4.jpg') }}" alt=""
                                    loading="lazy"></a></div>
                        <div class="bg"></div>
                        <div class="con">
                            <a href="team-details.html">
                                <div class="title"><span>Frank</span></div>
                                <div class="subtitle"><span>Portrait Photographer</span></div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/5.jpg') }}" alt=""
                                    loading="lazy"></a></div>
                        <div class="bg"></div>
                        <div class="con">
                            <a href="team-details.html">
                                <div class="title"><span>Emma</span></div>
                                <div class="subtitle"><span>Lighting Specialist</span></div>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img"><a href="team-details.html"><img src="{{ asset('assets/frontend/images/team/6.jpg') }}" alt=""
                                    loading="lazy"></a></div>
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
                    <div class="btn-wrap mt-30 text-left wow fadeInUp" data-wow-delay=".9s">
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