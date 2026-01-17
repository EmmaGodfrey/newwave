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
                            <p>+1 800 845 00 00</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="wrap-block"> <span class="icon et-map-pin"></span>
                        <div class="text-block">
                            <h5>Address</h5>
                            <p>750 St, Office 1138, San Francisco, CA 94108</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="wrap-block"> <span class="icon et-notebook"></span>
                        <div class="text-block">
                            <h5>E-Mail</h5>
                            <p>hello@dbrown.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <h5>Get in touch!</h5>
                <form method="post" class="contact__form" action="https://duruthemes.com/demo/html/gloom/dark/mail.php">
                    <!-- Form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your
                                message was sent successfully. </div>
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
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1573147.7480448114!2d-74.84628175962355!3d41.04009641088412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25856139b3d33%3A0xb2739f33610a08ee!2s1616%20Broadway%2C%20New%20York%2C%20NY%2010019%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1646760525018!5m2!1str!2str"
            style="width: 100%; height: 500px; border: 0;" allowfullscreen="" loading="lazy"></iframe>
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
                                    class="quote"><img src="images/quot.png" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="images/team/1.jpg" alt="" loading="lazy"> </div>
                                    <div class="cont">
                                        <h6>Emily Brown</h6> <span>Customer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <p>Working with Gloom was an unforgettable experience. Their attention to detail and
                                    creative vision brought our special day to life in the most beautiful way.</p> <span
                                    class="quote"><img src="images/quot.png" alt="" loading="lazy"></span>
                                <div class="info">
                                    <div class="author-img"> <img src="images/team/2.jpg" alt="" loading="lazy"> </div>
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