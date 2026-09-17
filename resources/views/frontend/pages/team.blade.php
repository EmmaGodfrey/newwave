@extends('frontend.layouts.app')

@section('content')
<!-- Team -->
<section class="team section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-45 text-center">
                <h6 class="wow" data-splitting>The crew behind the action</h6>
                <h1 class="wow" data-splitting>Our team</h1>
            </div>
        </div>
        <div class="row">
            @forelse($teamMembers as $member)
                <div class="col-lg-4 col-md-12 mb-45">
                    <div class="item">
                        <div class="img">
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" loading="lazy">
                        </div>
                        <div class="bg"></div>
                        <div class="con">
                            <div class="title"><span>{{ $member->name }}</span></div>
                            <div class="subtitle"><span>{{ $member->position }}</span></div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center mt-60 mb-60">
                    <p class="wow fadeInUp" style="font-size: 18px; color: #777;">No team members available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@include('frontend.partials.testimonials')@endsection
