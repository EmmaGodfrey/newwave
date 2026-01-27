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
                    @forelse($blogs as $blog)
                        <div class="col-md-12">
                            <div class="item">
                                <div class="post-img br-5px">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" loading="lazy">
                                        @else
                                            <img src="{{ asset('assets/frontend/images/slider/03.jpg') }}" alt="{{ $blog->title }}" loading="lazy">
                                        @endif
                                    </a>
                                    <div class="date">
                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                            <span>{{ $blog->published_at->format('M') }}</span>
                                            <i>{{ $blog->published_at->format('d') }}</i>
                                        </a>
                                    </div>
                                </div>
                                <div class="post-cont">
                                    <div class="blog-post-categorydate-wrapper">
                                        <a href="{{ route('blog') }}">
                                            <div>Blog</div>
                                        </a>
                                        <div class="blog-post-categorydate-divider"></div>
                                        @if($blog->category)
                                            <div><a href="{{ route('blog.category', $blog->category->slug) }}">{{ $blog->category->name }}</a></div>
                                        @else
                                            <div>Uncategorized</div>
                                        @endif
                                    </div>
                                    <h4><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h4>
                                    <p>{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 200) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="ti-write" style="font-size: 64px; color: #c9a96e; opacity: 0.5;"></i>
                                </div>
                                <h4 class="wow" data-splitting>No Blog Posts Available</h4>
                                <p class="text-muted">Check back soon for new articles.</p>
                            </div>
                        </div>
                    @endforelse
                    @if($blogs->hasPages())
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <ul class="pagination-wrap align-center mb-30 mt-30">
                                @if ($blogs->onFirstPage())
                                    <li class="disabled"><span><i class="ti-angle-left"></i></span></li>
                                @else
                                    <li><a href="{{ $blogs->previousPageUrl() }}"><i class="ti-angle-left"></i></a></li>
                                @endif

                                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                    @if ($page == $blogs->currentPage())
                                        <li><a href="{{ $url }}" class="active">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                @if ($blogs->hasMorePages())
                                    <li><a href="{{ $blogs->nextPageUrl() }}"><i class="ti-angle-right"></i></a></li>
                                @else
                                    <li class="disabled"><span><i class="ti-angle-right"></i></span></li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="row blog-sidebar">
                    <div class="col-md-12">
                        <div class="widget search">
                            <form action="{{ route('blog.search') }}" method="GET">
                                <input type="text" name="search" placeholder="Type here ..." value="{{ request('search') }}">
                                <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                    @if($recentPosts->count() > 0)
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Recent Posts</h5>
                                </div>
                                <ul class="recent">
                                    @foreach($recentPosts as $recentPost)
                                        <li>
                                            <div class="thum br-5px">
                                                @if($recentPost->image)
                                                    <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}" loading="lazy">
                                                @else
                                                    <img src="{{ asset('assets/frontend/images/slider/03.jpg') }}" alt="{{ $recentPost->title }}" loading="lazy">
                                                @endif
                                            </div>
                                            <a href="{{ route('blog.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if($archives->count() > 0)
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Archives</h5>
                                </div>
                                <ul>
                                    @foreach($archives as $archive)
                                        <li><a href="{{ route('blog') }}?month={{ $archive->month }}">{{ $archive->formatted_month }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    @if($categories->count() > 0)
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Categories</h5>
                                </div>
                                <ul>
                                    @foreach($categories as $cat)
                                        <li><a href="{{ route('blog.category', $cat->slug) }}"><i class="ti-angle-right"></i>{{ $cat->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
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
                        <div class="btn-link"><a href="mailto:info@newwavemotorsport.com">info@newwavemotorsport.com</a><span
                                class="btn-block color3 animation-bounce"></span></div>
                    </div>
                </div>
                <!-- Testiominals -->
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
                                            <i class="ti-user" style="font-size: 40px; color: #aa8453;"></i>
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
@endsection