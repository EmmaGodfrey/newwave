@extends('frontend.layouts.app')
@section('content')
<section class="section-padding">
    <div class="container">
        <h6>Plan your shoot</h6>
        <h1>A quote for your project</h1>
        <p>Tell us about your event, location, and the photos or video you need. We will discuss the scope and provide a quote.</p>
        <div class="btn-wrap mt-30"><div class="btn-link"><a href="{{ route('contact') }}">Request a quote</a><span class="btn-block color1 animation-bounce"></span></div></div>
    </div>
</section>
@endsection
