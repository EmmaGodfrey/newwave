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
                            <p>{{ filled($contactSettings?->phone) && !str_contains(strtolower($contactSettings->phone), 'x') ? $contactSettings->phone : 'Please use the contact form below.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="wrap-block"> <span class="icon et-map-pin"></span>
                        <div class="text-block">
                            <h5>Address</h5>
                            <p>{{ $contactSettings->address ?? 'Zambia' }}</p>
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
                <form method="post" action="{{ route('contact.submit') }}" class="contact__form" id="contactForm">
                    @csrf
                    <!-- Form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert" tabindex="-1">
                                Your message was sent successfully.
                            </div>
                            <div class="alert alert-danger contact__error" style="display: none" role="alert" tabindex="-1">
                                Something went wrong. Please try again.
                            </div>
                        </div>
                    </div>
                    <!-- Form elements -->
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="contact-name">Name (required)</label><input id="contact-name" name="name" type="text" autocomplete="name" maxlength="255" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="contact-email">Email (required)</label><input id="contact-email" name="email" type="email" autocomplete="email" maxlength="255" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="contact-phone">Phone (optional)</label><input id="contact-phone" name="phone" type="tel" autocomplete="tel" maxlength="20">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="contact-subject">Subject (required)</label><input id="contact-subject" name="subject" type="text" maxlength="255" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="message">Message (required)</label><textarea maxlength="10000" aria-describedby="contact-help" name="message" id="message" cols="30" rows="4"
                                placeholder="How can we help you? Feel free to get in touch! *" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <p id="contact-help">Please share only what we need to answer your enquiry. Do not include payment details, identity documents or sensitive personal information. Sending this form does not confirm a booking.</p>
                            <div class="consent-field">
                                <input type="checkbox" id="privacy-consent" name="privacy_consent" value="1" required>
                                <label for="privacy-consent">I consent to NewWave using my details to respond to this enquiry as described in the <a href="{{ route('privacy') }}">privacy policy</a>. This is not consent to marketing.</label>
                            </div>
                            <div class="btn-wrap">
                                <div class="btn-link">
                                    <input type="submit" value="Send enquiry"> <span
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
@include('frontend.partials.testimonials')
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
                    window.dispatchEvent(new Event('newwave:enquiry-sent'));
                    $('.contact__msg').show().trigger('focus');
                    form[0].reset();
                }
            },
            error: function(xhr) {
                var message = xhr.status === 429 ? 'Please wait a minute before sending another message.' : 'Unable to send your message. Please try again.';
                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                    message = Object.values(xhr.responseJSON.errors).flat().join(' ');
                }
                $('.contact__error').text(message).show().trigger('focus');
            },
            complete: function() {
                submitBtn.prop('disabled', false).val(originalBtnText);
            }
        });
    });
});
</script>
@endpush
