@extends('frontend.layouts.app')

@section('content')
 
<!-- Post Page  -->
<section class="section-padding post-page">
    <div class="container">
        <div class="row mb-45">
            <div class="col-md-12">
                <div class="blog-post-categorydate-wrapper">
                    <a href="{{ route('blog') }}">
                        <div>Blog{{ $blog->category ? ' / ' . $blog->category->name : '' }}</div>
                    </a>
                    <div class="blog-post-categorydate-divider"></div>
                    <div>{{ $blog->published_at->format('d M, Y') }}</div>
                </div>
                <h1>{{ $blog->title }}</h1>
            </div>
        </div>
        <div class="row">
            @if($blog->image)
                <div class="col-md-12">
                    <div class="blog-detail-image mb-60">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="br-5px img-fluid" alt="{{ $blog->title }}" loading="lazy" style="max-height: 600px; width: 100%; object-fit: cover;">
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Next & Prev -->
<section class="nex-prv">
    <div class="container">
        <div class="row">
            @if($previousPost)
                <div class="col-md-5 rest">
                    <div class="prv">
                        <div class="img bg-img" data-background="{{ $previousPost->image ? asset('storage/' . $previousPost->image) : asset('assets/frontend/images/slider/01.jpg') }}">
                            <div class="text-left ontop">
                                <h5><a href="{{ route('blog.show', $previousPost->slug) }}">{{ $previousPost->title }}</a></h5>
                                <span class="sub-title mb-0 mt-10">Prev Post</span>
                            </div>
                            <div class="overly"></div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-5 rest"></div>
            @endif
            <div class="col-md-2 text-center rest">
                <a href="{{ route('blog') }}" class="all-works d-flex align-items-center">
                    <span class="icon full-width ti-layout-grid3"></span>
                </a>
            </div>
            @if($nextPost)
                <div class="col-md-5 rest">
                    <div class="nxt">
                        <div class="img bg-img" data-background="{{ $nextPost->image ? asset('storage/' . $nextPost->image) : asset('assets/frontend/images/slider/02.jpg') }}">
                            <div class="text-right ontop">
                                <h5><a href="{{ route('blog.show', $nextPost->slug) }}">{{ $nextPost->title }}</a></h5>
                                <span class="sub-title mb-0 mt-10">Next Post</span>
                            </div>
                            <div class="overly"></div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-5 rest"></div>
            @endif
        </div>
    </div>
</section>
<!-- Testimonials -->
@if(isset($testimonials) && $testimonials->count() > 0)
<section id="testimonials" class="testimonials">
    <div class="background bg-img bg-imgfixed section-padding" data-overlay-dark="5" data-background="{{ asset('assets/frontend/images/car_pics/sunset_duo.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mb-30">
                    <h4 class="wow" data-splitting>Let's capture the perfect shots together.</h4>
                    <div class="btn-wrap mt-30 text-left wow fadeInUp" data-wow-delay=".6s">
                        <div class="btn-link"><a href="mailto:info@newwavemotorsport.com">info@newwavemotorsport.com</a><span class="btn-block color3 animation-bounce"></span></div>
                    </div>
                </div>
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
                                        @if($testimonial->client_image)
                                            <img src="{{ asset('storage/' . $testimonial->client_image) }}" alt="{{ $testimonial->client_name }}" loading="lazy">
                                        @else
                                            <i class="ti-user" style="font-size: 40px; color: #aa8453;"></i>
                                        @endif
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
@endif
@endsection
