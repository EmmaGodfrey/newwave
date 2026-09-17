<article class="image-tile" data-category="{{ $event->category_id }}">
    <a class="image-link" href="{{ route('portfolio.event', $event->slug) }}">
        <div class="image-frame">
            <img src="{{ $event->featured_image ? asset('storage/'.$event->featured_image) : ($event->featuredImage ? asset('storage/'.$event->featuredImage->image_path) : asset('assets/frontend/images/car_pics/track-action-01.jpg')) }}"
                 alt="{{ $event->title }}" decoding="async">
        </div>
        <div class="image-caption">
            <h3>{{ $event->title }}</h3>
            @if($event->description)<p>{{ Str::limit($event->description, 100) }}</p>@endif
            @if($event->location)<small>{{ $event->location }}</small>@endif
        </div>
    </a>
</article>
