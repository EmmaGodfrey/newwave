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
                                <div class="post-img br-5px blog-listing-image">
                                    <a href="{{ route('blog.show', $blog->slug) }}">
                                        @if($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" loading="lazy" style="max-height: 450px; width: 100%; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('assets/frontend/images/car_pics/track-action-01.jpg') }}" alt="{{ $blog->title }}" loading="lazy" style="max-height: 450px; width: 100%; object-fit: cover;">
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
                                    <li><a href="{{ $blogs->previousPageUrl() }}" aria-label="Previous page"><i class="ti-angle-left"></i></a></li>
                                @endif

                                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                    @if ($page == $blogs->currentPage())
                                        <li><a href="{{ $url }}" class="active" aria-current="page">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                @if ($blogs->hasMorePages())
                                    <li><a href="{{ $blogs->nextPageUrl() }}" aria-label="Next page"><i class="ti-angle-right"></i></a></li>
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
                                <label class="visually-hidden" for="blog-search">Search blog posts</label><input id="blog-search" type="search" name="search" placeholder="Type here ..." value="{{ request('search') }}">
                                <button type="submit" aria-label="Search blog posts"><i class="ti-search" aria-hidden="true"></i></button>
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
                                                    <img src="{{ asset('storage/' . $recentPost->image) }}" alt="{{ $recentPost->title }}" loading="lazy" style="width: 80px; height: 80px; object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('assets/frontend/images/car_pics/track-action-01.jpg') }}" alt="{{ $recentPost->title }}" loading="lazy" style="width: 80px; height: 80px; object-fit: cover;">
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
@include('frontend.partials.testimonials')
@endsection