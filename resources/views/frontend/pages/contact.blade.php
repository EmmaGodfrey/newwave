@extends('frontend.layouts.app')

@section('content')
<!-- Contact  -->
<section class="contact section-padding">
    <div class="container">
        <div class="row mb-45">
            <div class="col-md-12">
                <h6 class="wow" data-splitting>Let’s Connect and Create</h6>
                <h1 class="wow" data-splitting>Contact</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-45">
                <div class="item">
                    <div class="wrap-block"> <span class="icon et-phone"></span>
                        <div class="text-block">
                            <h5>Phone</h5>
                            <p>{{ $contactSettings->phone ?? '+260 XXX XXX XXX' }}</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="wrap-block"> <span class="icon et-map-pin"></span>
                        <div class="text-block">
                            <h5>Address</h5>
                            <p>{{ $contactSettings->address ?? 'Lusaka, Zambia' }}</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="wrap-block"> <span class="icon et-notebook"></span>
                        <div class="text-block">
                            <h5>E-Mail</h5>
                            <p>{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <h5>Get in touch!</h5>
                <form method="post" class="contact__form" id="contactForm">
                    @csrf
                    <!-- Form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert"> 
                                Your message was sent successfully. 
                            </div>
                            <div class="alert alert-danger contact__error" style="display: none" role="alert"> 
                                Something went wrong. Please try again. 
                            </div>
                        </div>
                    </div>
                    <!-- Form elements -->
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input name="name" type="text" placeholder="Name *" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="email" type="email" placeholder="Email Address *" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <input name="phone" type="text" placeholder="Phone *" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <input name="subject" type="text" placeholder="Subject *" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea name="message" id="message" cols="30" rows="4"
                                placeholder="How can we help you? Feel free to get in touch! *" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="btn-wrap">
                                <div class="btn-link">
                                    <input type="submit" value="Get in touch"> <span
                                        class="btn-block color1 animation-bounce"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Maps -->
<div class="full-width">
    <div class="google-map">
        @if($contactSettings && $contactSettings->map_url)
            <iframe
                src="{{ $contactSettings->map_url }}"
                style="width: 100%; height: 500px; border: 0;" allowfullscreen="" loading="lazy"></iframe>
        @else
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str"
                style="width: 100%; height: 500px; border: 0;" allowfullscreen="" loading="lazy"></iframe>
        @endif
    </div>
</div>
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
                        <div class="btn-link"><a href="mailto:{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}">{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}</a><span
                                class="btn-block color3 animation-bounce"></span></div>
                    </div>
                </div>
                <!-- Testiominals -->
                <div class="col-md-5 offset-md-2">
                    <div class="testimonials-box">
                        <h5>What Are Clients Saying?</h5>
                        <div class="owl-carousel owl-theme">
                            @forelse($testimonials as $testimonial)
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
                            @empty
                                <div class="item">
                                    <p>Working with New Wave Motorsport was an unforgettable experience. Their attention to detail and
                                        creative vision brought our event to life in the most beautiful way.</p> 
                                    <span class="quote"><img src="{{ asset('assets/frontend/images/quot.png') }}" alt="" loading="lazy"></span>
                                    <div class="info">
                                        <div class="author-img">
                                            <i class="ti-user" style="font-size: 40px; color: #aa8453;"></i>
                                        </div>
                                        <div class="cont">
                                            <h6>Sample Client</h6> 
                                            <span>Customer</span>
                                        </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var submitBtn = form.find('input[type="submit"]');
        var originalBtnText = submitBtn.val();
        
        // Disable submit button and show loading
        submitBtn.prop('disabled', true).val('Sending...');
        
        // Hide previous messages
        $('.contact__msg, .contact__error').hide();
        
        $.ajax({
            url: '{{ route("contact.submit") }}',
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if (response.success) {
                    $('.contact__msg').fadeIn().delay(5000).fadeOut();
                    form[0].reset();
                }
            },
            error: function(xhr) {
                $('.contact__error').fadeIn().delay(5000).fadeOut();
            },
            complete: function() {
                submitBtn.prop('disabled', false).val(originalBtnText);
            }
        });
    });
});
</script>
@endpush