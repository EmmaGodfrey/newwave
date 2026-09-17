<section id="testimonials" class="testimonials">
    <div class="background bg-img bg-imgfixed section-padding" data-overlay-dark="5"
        data-background="{{ asset('assets/frontend/images/car_pics/motorsport-event-01.jpg') }}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mb-30">
                    <h4>Let's capture your motorsport story.</h4>
                    <div class="btn-wrap mt-30 text-left">
                        <div class="btn-link"><a href="{{ route('contact') }}">Talk to us about your event</a><span class="btn-block color3 animation-bounce"></span></div>
                    </div>
                </div>
                @if(config('site.testimonials_verified') && isset($testimonials) && $testimonials->isNotEmpty())
                    <div class="col-md-5 offset-md-2">
                        <div class="testimonials-box">
                            <h5>What our clients say</h5>
                            <div class="owl-carousel owl-theme">
                                @foreach($testimonials as $testimonial)
                                    <div class="item">
                                        <p>{{ $testimonial->testimonial }}</p>
                                        <div class="info"><div class="cont">
                                            <h6>{{ $testimonial->client_name }}</h6>
                                            @if($testimonial->client_position)<span>{{ $testimonial->client_position }}</span>@endif
                                        </div></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
