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
                    @foreach($categories as $category)
                        <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row gallery-items">
            @foreach($categories as $category)
                @foreach($category->activeEvents as $event)
                    <div class="col-lg-4 col-md-6 single-item {{ $category->slug }} mb-25">
                        <a href="{{ route('portfolio.event', $event->slug) }}" title="{{ $event->title }}" class="gallery-masonry-item-img-link">
                            <div class="gallery-box">
                                <div class="gallery-img img-grayscale"> 
                                    @if($event->featured_image)
                                        <img src="{{ asset('storage/' . $event->featured_image) }}" class="img-fluid mx-auto d-block" alt="{{ $event->title }}"> 
                                    @elseif($event->featuredImage)
                                        <img src="{{ asset('storage/' . $event->featuredImage->image_path) }}" class="img-fluid mx-auto d-block" alt="{{ $event->title }}">
                                    @else
                                        <img src="{{ asset('assets/frontend/images/portfolio/default.jpg') }}" class="img-fluid mx-auto d-block" alt="{{ $event->title }}">
                                    @endif
                                </div>
                                <div class="gallery-detail">
                                    <h4>{{ $event->title }}</h4>
                                    <p>{{ Str::limit($event->description ?: $category->description, 60) }}</p>
                                    @if($event->location)
                                        <small class="text-muted">{{ $event->location }}</small>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endforeach
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
                    <h4 class="wow" data-splitting>Letâ€™s capture the perfect shots together.</h4>
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

