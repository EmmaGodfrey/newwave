@extends('frontend.layouts.app')
@section('content')
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-45">
            <h6>{{ $event->category->name }}</h6>
            <h1>{{ $event->title }}</h1>
            @if($event->location || $event->event_date)
                <div class="event-meta mt-3">
                    @if($event->event_date)<span>{{ $event->event_date->format('F j, Y') }}</span>@endif
                    @if($event->location)<span>{{ $event->location }}</span>@endif
                </div>
            @endif
            @if($event->description)<p class="mt-4">{{ $event->description }}</p>@endif
        </div>
        <a href="{{ route('portfolio') }}" class="event-back">&larr; Back to portfolio</a>
        @if($event->images->isNotEmpty())
            <div class="image-wall" data-image-wall>
                @foreach($event->images as $image)
                    <figure class="image-tile">
                        <button class="photo-open image-frame" type="button" data-bs-toggle="modal" data-bs-target="#imageModal{{ $image->id }}" aria-label="View {{ $image->title ?: $event->title }} full size">
                            <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title ?: $event->title }}" decoding="async">
                        </button>
                        @if($image->title || $image->description)
                            <figcaption class="image-caption">
                                @if($image->title)<h3>{{ $image->title }}</h3>@endif
                                @if($image->description)<p>{{ $image->description }}</p>@endif
                            </figcaption>
                        @endif
                    </figure>
                @endforeach
            </div>
            @foreach($event->images as $image)
                <div class="modal fade photo-modal" id="imageModal{{ $image->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $image->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel{{ $image->id }}">{{ $image->title ?: $event->title }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close image"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title ?: $event->title }}" loading="lazy">
                                @if($image->description)<p class="mt-3">{{ $image->description }}</p>@endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">Images for this event will be shared soon.</p>
        @endif
        @php($relatedEvents = $event->category->activeEvents->where('id', '!=', $event->id)->take(6))
        @if($relatedEvents->isNotEmpty())
            <h2 class="text-center mt-60 mb-45">More from {{ $event->category->name }}</h2>
            <div class="image-wall" data-image-wall>
                @foreach($relatedEvents as $relatedEvent)
                    @include('frontend.partials.event-tile', ['event' => $relatedEvent])
                @endforeach
            </div>
        @endif
    </div>
</section>
@include('frontend.partials.testimonials')
@endsection
