@extends('frontend.layouts.app')

@section('content')
<!-- Event Detail -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center mb-45">
            <div class="col-md-12 text-center">
                <h6 class="wow" data-splitting>{{ $event->category->name }}</h6>
                <h1 class="wow" data-splitting>{{ $event->title }}</h1>
                @if($event->location || $event->event_date)
                    <div class="event-meta mt-3">
                        @if($event->event_date)
                            <span class="date"><i class="ti-calendar"></i> {{ $event->event_date->format('F j, Y') }}</span>
                        @endif
                        @if($event->location)
                            <span class="location"><i class="ti-location-pin"></i> {{ $event->location }}</span>
                        @endif
                    </div>
                @endif
                @if($event->description)
                    <p class="mt-4">{{ $event->description }}</p>
                @endif
            </div>
        </div>

        <!-- Back to Portfolio -->
        <div class="row mb-30">
            <div class="col-12">
                <a href="{{ route('portfolio') }}" class="btn-back">
                    <i class="ti-arrow-left"></i> Back to Portfolio
                </a>
            </div>
        </div>

        <!-- Event Images Gallery -->
        <div class="row">
            @forelse($event->images as $image)
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="gallery-box">
                        <div class="gallery-img"> 
                            <img src="{{ asset('storage/' . $image->image_path) }}" 
                                 class="img-fluid mx-auto d-block" 
                                 alt="{{ $image->title ?: $event->title }}"
                                 data-bs-toggle="modal" 
                                 data-bs-target="#imageModal{{ $image->id }}"
                                 style="cursor: pointer; width: 100%; height: 300px; object-fit: cover;"> 
                        </div>
                        @if($image->title || $image->description)
                            <div class="gallery-detail">
                                @if($image->title)
                                    <h5>{{ $image->title }}</h5>
                                @endif
                                @if($image->description)
                                    <p>{{ $image->description }}</p>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="mb-4">
                        <i class="ti-image" style="font-size: 64px; color: #c9a96e; opacity: 0.5;"></i>
                    </div>
                    <h4 class="wow" data-splitting>No Images Available</h4>
                    <p class="text-muted">Images for this event will be uploaded soon.</p>
                </div>
            @endforelse
        </div>

        <!-- Image Modals -->
        @foreach($event->images as $image)
            <div class="modal fade" id="imageModal{{ $image->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $image->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel{{ $image->id }}">
                                {{ $image->title ?: $event->title }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('storage/' . $image->image_path) }}" 
                                 class="img-fluid" 
                                 alt="{{ $image->title ?: $event->title }}">
                            @if($image->description)
                                <p class="mt-3">{{ $image->description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Related Events -->
        @if($event->category->activeEvents->count() > 1)
            <div class="row mt-60">
                <div class="col-12">
                    <h3 class="text-center mb-45">More from {{ $event->category->name }}</h3>
                </div>
            </div>
            <div class="row">
                @foreach($event->category->activeEvents->where('id', '!=', $event->id)->take(3) as $relatedEvent)
                    <div class="col-lg-4 col-md-6 mb-25">
                        <a href="{{ route('portfolio.event', $relatedEvent->slug) }}" class="gallery-masonry-item-img-link">
                            <div class="gallery-box">
                                <div class="gallery-img img-grayscale"> 
                                    @if($relatedEvent->featured_image)
                                        <img src="{{ asset('storage/' . $relatedEvent->featured_image) }}" class="img-fluid mx-auto d-block" alt="{{ $relatedEvent->title }}"> 
                                    @elseif($relatedEvent->featuredImage)
                                        <img src="{{ asset('storage/' . $relatedEvent->featuredImage->image_path) }}" class="img-fluid mx-auto d-block" alt="{{ $relatedEvent->title }}">
                                    @else
                                        <img src="{{ asset('assets/frontend/images/portfolio/default.jpg') }}" class="img-fluid mx-auto d-block" alt="{{ $relatedEvent->title }}">
                                    @endif
                                </div>
                                <div class="gallery-detail">
                                    <h4>{{ $relatedEvent->title }}</h4>
                                    <p>{{ Str::limit($relatedEvent->description, 60) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Contact Section -->
<section id="testimonials" class="testimonials">
    <div class="background bg-img bg-imgfixed section-padding" data-overlay-dark="5"
        data-background="images/slider/01.jpg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 offset-md-3 text-center">
                    <h4 class="wow" data-splitting>Love what you see?</h4>
                    <p class="mb-4">Let's create something beautiful together for your special event.</p>
                    <div class="btn-wrap mt-30 text-center wow fadeInUp" data-wow-delay=".6s">
                        <div class="btn-link">
                            <a href="{{ route('contact') }}">Get in Touch</a>
                            <span class="btn-block color3 animation-bounce"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
.btn-back {
    color: #333;
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-back:hover {
    color: #c9a96e;
    text-decoration: none;
}

.event-meta span {
    margin: 0 15px;
    color: #666;
}

.event-meta i {
    margin-right: 5px;
}

.gallery-img img {
    transition: transform 0.3s ease;
}

.gallery-img img:hover {
    transform: scale(1.05);
}

.modal-content {
    border: none;
    border-radius: 15px;
}

.modal-header {
    border-bottom: 1px solid #e9ecef;
    background-color: #f8f9fa;
    border-radius: 15px 15px 0 0;
}
</style>
