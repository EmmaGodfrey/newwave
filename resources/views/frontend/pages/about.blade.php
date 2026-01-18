@extends('frontend.layouts.app')

@section('content')
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
                <div class="reveal-effect"><img src="{{ asset('assets/frontend/images/car_pics/spinning-action-01.jpg') }}" class="img-fluid br-10px" alt="New Wave Motorsport"
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
                <h6 class="wow" data-splitting>Growth & Momentum</h6>
                <h1 class="wow" data-splitting>Our Expertise</h1>
                <p class="mt-30 wow fadeInUp" data-wow-delay="0.3s"> Through consistency and creative storytelling, our content quickly gained traction. Today, New Wave Motorsport averages 300,000–400,000 views across our content, reflecting audience trust and the demand for high-quality, authentic automotive content. </p>
                <div class="btn-wrap wow fadeInUp text-left mt-30 mb-30" data-wow-delay="0.6s">
                    <div class="btn-link"> <a href="{{ route('services') }}">View services</a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
                <p class="bar-title wow fadeInUp" data-wow-delay="0.9s"> Motorsport Photography <span class="percent">95%</span> </p>
                <div class="bar wow fadeInUp" data-wow-delay="1.2s">
                    <div class="bar-fill"></div>
                </div>
                <p class="bar-title wow fadeInUp" data-wow-delay="1.5s"> Event Videography <span class="percent">90%</span> </p>
                <div class="bar wow fadeInUp" data-wow-delay="1.8s">
                    <div class="bar-fill"></div>
                </div>
                <p class="bar-title wow fadeInUp" data-wow-delay="2.1s"> Content Creation <span class="percent">92%</span>
                </p>
                <div class="bar wow fadeInUp" data-wow-delay="2.4s">
                    <div class="bar-fill"></div>
                </div>
                <p class="bar-title wow fadeInUp" data-wow-delay="2.7s"> Brand Storytelling <span class="percent">88%</span> </p>
                <div class="bar wow fadeInUp" data-wow-delay="3.0s">
                    <div class="bar-fill"></div>
                </div>
                <p class="bar-title wow fadeInUp" data-wow-delay="3.3s"> Social Media Strategy <span class="percent">85%</span>
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
                <h6 class="wow" data-splitting>The Crew Behind the Action</h6>
                <h1 class="wow" data-splitting>Our Team</h1>
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
                                <div class="title"><span>Mr Unknown</span></div>
                                <div class="subtitle"><span>Founder & Lead Creator</span></div>
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
                                <div class="subtitle"><span>Event Photographer</span></div>
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
                                <div class="subtitle"><span>Videographer</span></div>
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
                                <div class="subtitle"><span>Track Photographer</span></div>
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
                                <div class="subtitle"><span>Content Strategist</span></div>
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
                                <div class="subtitle"><span>Drone Specialist</span></div>
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
        data-background="{{ asset('assets/frontend/images/car_pics/car-show-01.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <!-- Work together -->
                <div class="col-md-5 mb-30">
                    <h4 class="wow" data-splitting>Let's build the global motorsport community together.</h4>
                    <div class="btn-wrap mt-30 text-left wow fadeInUp" data-wow-delay=".9s">
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
                                <p>New Wave Motorsport captured the energy and passion of our event perfectly. Their authentic approach to motorsport storytelling made our brand shine in ways we never expected.</p> <span
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