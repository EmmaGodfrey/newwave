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
                    {!! \App\Support\PublicContent::render($blog->content) !!}
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
                <a href="{{ route('blog') }}" class="all-works d-flex align-items-center" aria-label="All blog posts">
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
@include('frontend.partials.testimonials')
@endsection
