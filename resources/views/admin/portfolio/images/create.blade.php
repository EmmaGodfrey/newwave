@extends('layouts.master')
@section('title', 'Upload portfolio images')
@section('content')
<div class="card"><div class="card-body">
    <h4>Upload portfolio images</h4>
    @include('admin.portfolio.images.form', ['editing' => false])
</div></div>
@endsection
