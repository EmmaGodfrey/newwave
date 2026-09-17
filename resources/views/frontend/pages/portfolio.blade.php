@extends('frontend.layouts.app')
@section('content')
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-45">
            <h6>Speed, culture, and community</h6>
            <h1>Portfolio</h1>
        </div>
        @if($categories->contains(fn ($category) => $category->activeEvents->isNotEmpty()))
            <div class="image-filters" data-image-filters="portfolio-wall" aria-label="Filter portfolio">
                <button type="button" data-filter="*" aria-pressed="true">All</button>
                @foreach($categories as $category)
                    @if($category->activeEvents->isNotEmpty())
                        <button type="button" data-filter="{{ $category->id }}" aria-pressed="false">{{ $category->name }}</button>
                    @endif
                @endforeach
            </div>
            <div id="portfolio-wall" class="image-wall" data-image-wall>
                @foreach($categories as $category)
                    @foreach($category->activeEvents as $event)
                        @include('frontend.partials.event-tile', ['event' => $event])
                    @endforeach
                @endforeach
            </div>
        @else
            <p class="text-center">New work will be shared here soon.</p>
        @endif
    </div>
</section>
@include('frontend.partials.testimonials')
@endsection
