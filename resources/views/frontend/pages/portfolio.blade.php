@extends('frontend.layouts.app')

@section('content')
<!-- Portfolio -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center mb-45">
            <div class="col-md-12 text-center">
                <h6 class="wow" data-splitting>Time stands still in every shot</h6>
                <h1 class="wow" data-splitting>Portfolio</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <ul class="gallery-filter">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".weddings">Weddings</li>
                    <li data-filter=".portraits">Portraits</li>
                    <li data-filter=".sports">Sports</li>
                </ul>
            </div>
        </div>
        <div class="row gallery-items">
            <div class="col-lg-4 col-md-6 single-item weddings mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/w1.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Weddings</h4>
                            <p>Capturing love, one moment at a time.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 single-item portraits mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/p1.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Portraits</h4>
                            <p>Every face tells a story — let’s tell yours.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 single-item sports mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/s1.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Sports</h4>
                            <p>The art of athletic moments.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 single-item weddings mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/w2.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Weddings</h4>
                            <p>Capturing love, one moment at a time.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 single-item portraits mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/p2.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Portraits</h4>
                            <p>Every face tells a story — let’s tell yours.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 single-item sports mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/s2.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Sports</h4>
                            <p>The art of athletic moments.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 single-item portraits mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/p3.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Portraits</h4>
                            <p>Every face tells a story — let’s tell yours.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 single-item sports mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/s3.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Sports</h4>
                            <p>The art of athletic moments.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 single-item weddings mb-25">
                <a href="portfolio-page.html" title="" class="gallery-masonry-item-img-link">
                    <div class="gallery-box">
                        <div class="gallery-img img-grayscale"> <img src="{{ asset('assets/frontend/images/portfolio/w3.jpg') }}"
                                class="img-fluid mx-auto d-block" alt=""> </div>
                        <div class="gallery-detail">
                            <h4>Weddings</h4>
                            <p>Capturing love, one moment at a time.</p>
                        </div>
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
