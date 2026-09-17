@extends('layouts.master')
@section('title', 'Edit portfolio image')
@section('content')
<div class="card"><div class="card-body">
    <h4>Edit portfolio image</h4>
    <img class="img-fluid rounded mb-3" style="max-height:240px" src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title }}">
    @include('admin.portfolio.images.form', ['editing' => true])
</div></div>
@endsection
