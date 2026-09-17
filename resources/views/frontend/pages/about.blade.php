@extends('frontend.layouts.app')

@section('content')
<!-- About  -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h6 class="wow" data-splitting>Who We Are</h6>
                <h1 class="wow" data-splitting>New Wave Motorsport</h1>
                <p class="mt-30 wow fadeInUp" data-wow-delay="0.3s"> New Wave Motorsport is a motorsport-focused photography and videography brand built to capture speed, culture, and community. More than just visuals, we document the energy of the motorsport scene and give both established and upcoming enthusiasts a platform to be seen. </p>
                <p class="wow fadeInUp" data-wow-delay="0.6s">Based in Zambia, we photograph motorsport events, vehicles and the people behind the local car community.</p>
                <div class="btn-wrap wow fadeInUp text-left mt-30 mb-30" data-wow-delay="0.9s">
                    <div class="btn-link"> <a href="mailto:{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}">{{ $contactSettings->email ?? 'info@newwavemotorsport.com' }}</a> <span
                            class="btn-block color1 animation-bounce"></span> </div>
                </div>
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="reveal-effect"><img src="{{ asset('assets/frontend/images/car_pics/spinning-action-01.jpg') }}" class="img-fluid br-10px" alt="Spinning action photographed by NewWave"
                        loading="lazy"></div>
            </div>
        </div>
    </div>
</section>
<!-- Expertise -->
<section class="section-padding">
    <div class="container">
        <h6>What we capture</h6>
        <h2>Motorsport, from every angle</h2>
        <div class="row mt-30">
            <div class="col-md-4"><h4>Trackside action</h4><p>Photography and video that bring the speed and atmosphere of an event into focus.</p></div>
            <div class="col-md-4"><h4>Car culture</h4><p>The vehicles, people, and details behind the motorsport community.</p></div>
            <div class="col-md-4"><h4>Brand stories</h4><p>Visual content built around your vehicle, event, or campaign.</p></div>
        </div>
    </div>
</section>
<!-- Team -->
@if($teamMembers->isNotEmpty())
<section class="team section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-45 text-center">
                <h6 class="wow" data-splitting>The Crew Behind the Action</h6>
                <h1 class="wow" data-splitting>Our Team</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme" id="about-team-carousel" data-team-count="{{ count($teamMembers) }}">
                    @forelse($teamMembers as $member)
                    <div class="item">
                        <div class="img"><div><img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}"
                                    loading="lazy"></div></div>
                        <div class="bg"></div>
                        <div class="con">
                            <div>
                                <div class="title"><span>{{ $member->name }}</span></div>
                                <div class="subtitle"><span>{{ $member->position }}</span></div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="item">
                        <p class="text-center">No team members available.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@include('frontend.partials.testimonials')
@endsection