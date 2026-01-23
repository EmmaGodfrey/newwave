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
                        <img src="{{ asset('storage/' . $blog->image) }}" class="br-5px mb-60 img-fluid" alt="{{ $blog->title }}" loading="lazy">
                    </div>
                @endif
            </div>
            {!! $blog->content !!}
            <div class="blog-comment-section">
                <div class="row">
                    <!-- Comment -->
                    <div class="col-md-6">
                        <div class="blog-post-comment-wrap">
                            <div class="blog-post-user-comment"> <img src="images/team/1.jpg" alt="" loading="lazy"> </div>
                            <div class="blog-post-user-content">
                                <h3>Polina Viola &nbsp;&nbsp;<span>29 Dec 2026</span></h3>
                                <p>Design in the ultricies nibh non dolor maximus miss inte duru faubs neque nec tincidunte aliquam eraten fermen. </p>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Form -->
                    <div class="col-md-5 offset-md-1">
                        <h3>Leave a Reply</h3>
                        <form method="post" class="contact__form" action="#">
                            <!-- Form message -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your message was sent successfully. </div>
                                </div>
                            </div>
                            <!-- Form elements -->
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input name="name" type="text" placeholder="Full Name *" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input name="email" type="email" placeholder="Email Address *" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <textarea name="message" id="message" cols="30" rows="4" placeholder="Your Comment *" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-wrap">
                                        <div class="btn-link">
                                            <input type="submit" value="Send Comment"> <span class="btn-block color1 animation-bounce"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <!-- Testiominals -->
    <section id="testimonials" class="testimonials">
        <div class="background bg-img bg-imgfixed section-padding" data-overlay-dark="5" data-background="images/slider/01.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Work together -->
                    <div class="col-md-5 mb-30">
                        <h4 class="wow" data-splitting>Let’s capture the perfect shots together.</h4>
                        <div class="btn-wrap mt-30 text-left wow fadeInUp" data-wow-delay=".6s">
                            <div class="btn-link"><a href="mailto:hello@gloom.com">hello@gloom.com</a><span class="btn-block color3 animation-bounce"></span></div>
                        </div>
                    </div>
                    <!-- Testiominals -->
                    <div class="col-md-5 offset-md-2">
                        <div class="testimonials-box">
                            <h5>What Are Clients Saying?</h5>
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <p>Working with Gloom was an unforgettable experience. Their attention to detail and creative vision brought our special day to life in the most beautiful way.</p> <span class="quote"><img src="images/quot.png" alt="" loading="lazy"></span>
                                    <div class="info">
                                        <div class="author-img"> <img src="images/team/1.jpg" alt="" loading="lazy"> </div>
                                        <div class="cont">
                                            <h6>Emily Brown</h6> <span>Customer</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <p>Working with Gloom was an unforgettable experience. Their attention to detail and creative vision brought our special day to life in the most beautiful way.</p> <span class="quote"><img src="images/quot.png" alt="" loading="lazy"></span>
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