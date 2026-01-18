@extends('frontend.layouts.app')

@section('content')

<!-- Blog -->
<section class="blog section-padding">
    <div class="container">
        <div class="row mb-45">
            <div class="col-md-12">
                <h6 class="wow" data-splitting>Recent Articles</h6>
                <h1 class="wow" data-splitting>Blogs</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="item">
                            <div class="post-img br-5px">
                                <a href="{{ route('blog-detail') }}"> <img src="{{ asset('assets/frontend/images/slider/03.jpg') }}" alt="" loading="lazy"> </a>
                                <div class="date">
                                    <a href="{{ route('blog-detail') }}"> <span>Dec</span> <i>14</i> </a>
                                </div>
                            </div>
                            <div class="post-cont">
                                <div class="blog-post-categorydate-wrapper">
                                    <a href="blog.html">
                                        <div>Blog</div>
                                    </a>
                                    <div class="blog-post-categorydate-divider"></div>
                                    <div>Wedding</div>
                                </div>
                                <h4><a href="{{ route('blog-detail') }}">Love in Every Frame</a></h4>
                                <p>Photography potenti fringilla pretium ipsum non blandit. Vivamus eget nisi non mi
                                    iaculis iaculis imserie quiseros sevin elentesque habitant morbi tristique senectus
                                    et netus et malesuada fames actur fermen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="item">
                            <div class="post-img br-5px">
                                <a href="{{ route('blog-detail') }}"> <img src="{{ asset('assets/frontend/images/slider/08.jpg') }}" alt="" loading="lazy"> </a>
                                <div class="date">
                                    <a href="{{ route('blog-detail') }}"> <span>Dec</span> <i>18</i> </a>
                                </div>
                            </div>
                            <div class="post-cont">
                                <div class="blog-post-categorydate-wrapper">
                                    <a href="blog.html">
                                        <div>Blog</div>
                                    </a>
                                    <div class="blog-post-categorydate-divider"></div>
                                    <div>Fashion</div>
                                </div>
                                <h4><a href="{{ route('blog-detail') }}">The Art of Style</a></h4>
                                <p>Photography potenti fringilla pretium ipsum non blandit. Vivamus eget nisi non mi
                                    iaculis iaculis imserie quiseros sevin elentesque habitant morbi tristique senectus
                                    et netus et malesuada fames actur fermen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="item">
                            <div class="post-img br-5px">
                                <a href="{{ route('blog-detail') }}"> <img src="{{ asset('assets/frontend/images/slider/02.jpg') }}" alt="" loading="lazy"> </a>
                                <div class="date">
                                    <a href="{{ route('blog-detail') }}"> <span>Dec</span> <i>18</i> </a>
                                </div>
                            </div>
                            <div class="post-cont">
                                <div class="blog-post-categorydate-wrapper">
                                    <a href="blog.html">
                                        <div>Blog</div>
                                    </a>
                                    <div class="blog-post-categorydate-divider"></div>
                                    <div>Art</div>
                                </div>
                                <h4><a href="{{ route('blog-detail') }}">Through the Creative Lens</a></h4>
                                <p>Photography potenti fringilla pretium ipsum non blandit. Vivamus eget nisi non mi
                                    iaculis iaculis imserie quiseros sevin elentesque habitant morbi tristique senectus
                                    et netus et malesuada fames actur fermen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="item">
                            <div class="post-img br-5px">
                                <a href="{{ route('blog-detail') }}"> <img src="{{ asset('assets/frontend/images/slider/01.jpg') }}" alt="" loading="lazy"> </a>
                                <div class="date">
                                    <a href="{{ route('blog-detail') }}"> <span>Dec</span> <i>18</i> </a>
                                </div>
                            </div>
                            <div class="post-cont">
                                <div class="blog-post-categorydate-wrapper">
                                    <a href="blog.html">
                                        <div>Blog</div>
                                    </a>
                                    <div class="blog-post-categorydate-divider"></div>
                                    <div>Travel</div>
                                </div>
                                <h4><a href="{{ route('blog-detail') }}">Wandering with a Camera</a></h4>
                                <p>Photography potenti fringilla pretium ipsum non blandit. Vivamus eget nisi non mi
                                    iaculis iaculis imserie quiseros sevin elentesque habitant morbi tristique senectus
                                    et netus et malesuada fames actur fermen.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- Pagination -->
                        <ul class="pagination-wrap align-center mb-30 mt-30">
                            <li><a href="blog2.html#"><i class="ti-angle-left"></i></a></li>
                            <li><a href="blog2.html#">1</a></li>
                            <li><a href="blog2.html#" class="active">2</a></li>
                            <li><a href="blog2.html#">3</a></li>
                            <li><a href="blog2.html#"><i class="ti-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="row blog-sidebar">
                    <div class="col-md-12">
                        <div class="widget search">
                            <form>
                                <input type="text" name="search" placeholder="Type here ...">
                                <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h5>Recent Posts</h5>
                            </div>
                            <ul class="recent">
                                <li>
                                    <div class="thum br-5px"> <img src="{{ asset('assets/frontend/images/slider/08.jpg') }}" alt="" loading="lazy">
                                    </div> <a href="{{ route('blog-detail') }}"> The Art of Style</a>
                                </li>
                                <li>
                                    <div class="thum br-5px"> <img src="{{ asset('assets/frontend/images/slider/02.jpg') }}" alt="" loading="lazy">
                                    </div> <a href="{{ route('blog-detail') }}">Through the Creative Lens</a>
                                </li>
                                <li>
                                    <div class="thum br-5px"> <img src="{{ asset('assets/frontend/images/slider/01.jpg') }}" alt="" loading="lazy">
                                    </div> <a href="{{ route('blog-detail') }}">Wandering with a Camera</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h5>Archives</h5>
                            </div>
                            <ul>
                                <li><a href="{{ route('blog-detail') }}">December 2026</a></li>
                                <li><a href="{{ route('blog-detail') }}">November 2026</a></li>
                                <li><a href="{{ route('blog-detail') }}">October 2026</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <ul>
                                <li><a href="blog.html"><i class="ti-angle-right"></i>Wedding</a></li>
                                <li><a href="blog.html"><i class="ti-angle-right"></i>Portraits</a></li>
                                <li><a href="blog.html"><i class="ti-angle-right"></i>Travel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-title">
                                <h5>Tags</h5>
                            </div>
                            <ul class="tags">
                                <li><a href="{{ route('blog-detail') }}">Nature</a></li>
                                <li><a href="{{ route('blog-detail') }}">Portraits</a></li>
                                <li><a href="{{ route('blog-detail') }}">Wedding</a></li>
                                <li><a href="{{ route('blog-detail') }}">Art</a></li>
                                <li><a href="{{ route('blog-detail') }}">Photography</a></li>
                                <li><a href="{{ route('blog-detail') }}">Fashion</a></li>
                            </ul>
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
</section>
@endsection