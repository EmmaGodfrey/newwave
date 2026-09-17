@extends('frontend.layouts.app')

@section('content')
<!-- Services  -->
<section class="services section-padding">
    <div class="container">
        <div class="row mb-45">
            <div class="col-md-4">
                <h6 class="wow" data-splitting>Services That We Provide</h6>
                <h1 class="wow" data-splitting>Our Services</h1>
            </div>
            <div class="col-md-6 offset-md-2 mt-45 wow fadeInUp" data-wow-delay="0.3s">
                <p>New Wave Motorsport specializes in authentic motorsport content creation, capturing the energy and culture of the automotive scene. From grassroots events to professional shoots, we deliver high-quality visuals that tell your story with passion and precision.</p>
            </div>
        </div>
        <div class="row">
            @forelse($services as $index => $service)
            <div class="col-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-delay="{{ 0.5 + ($index * 0.2) }}s">
                <a href="{{ route('portfolio') }}">
                    <div class="item mb-30"> <img src="{{ asset('assets/frontend/images/icons/icon-' . (($index % 6) + 1) . '.svg') }}" alt="">
                        <h5>{{ $service->name }}</h5>
                        <p>{{ $service->description ?? 'Professional motorsport service tailored to your needs.' }}</p>
                        <div class="numb">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Tell us about your event or project. We will help you plan the photography and video coverage.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@include('frontend.partials.testimonials')@endsection
