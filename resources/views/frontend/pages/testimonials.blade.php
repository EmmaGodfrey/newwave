@extends('frontend.layouts.app')

@section('content')
<!-- Testimonials -->
<section class="section-padding testimonials">
    <div class="container">
        <div class="row justify-content-center mb-45">
            <div class="col-md-12 text-center">
                <h6 class="wow" data-splitting>What Are Clients Saying?</h6>
                <h1 class="wow" data-splitting>Testimonials</h1>
            </div>
        </div>
        <div class="row">
            @forelse($testimonials as $index => $testimonial)
                <div class="col-lg-4 col-md-12 mb-30 wow fadeInUp" data-wow-delay=".{{ $index + 1 }}s">
                    <div class="testimonials-box">
                        <div class="item">
                            <p>{{ $testimonial->testimonial }}</p> 
                            <span class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                            <div class="info">
                                <div class="author-img">
                                    <i class="ti-user" style="font-size: 40px; color: #aa8453;"></i>
                                </div>
                                <div class="cont">
                                    <h6>{{ $testimonial->client_name }}</h6> 
                                    <span>{{ $testimonial->client_position ?? 'Customer' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center mt-60 mb-60">
                    <p class="wow fadeInUp" style="font-size: 18px; color: #777;">No testimonials available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection