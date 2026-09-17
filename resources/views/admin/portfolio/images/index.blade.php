@extends('layouts.master')
@section('title', 'Portfolio images')
@section('content')
<div class="card"><div class="card-body">
    <div class="d-flex justify-content-between mb-4"><h4>Portfolio images</h4><a class="btn btn-primary" href="{{ route('admin.portfolio.images.create') }}">Upload images</a></div>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    @if($images->isNotEmpty())
    <div class="image-wall" data-image-wall>
        @forelse($images as $image)
            <div class="image-tile">
                <img class="img-fluid rounded mb-2" src="{{ asset('storage/'.$image->image_path) }}" alt="{{ $image->title ?? $image->event?->title }}">
                <h5>{{ $image->title ?: $image->event?->title }}</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.portfolio.images.edit', $image) }}">Edit</a>
                <form class="d-inline" method="POST" action="{{ route('admin.portfolio.images.destroy', $image) }}" onsubmit="return confirm('Delete this image?')">
                    @csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                </form>
            </div>
        @empty
            <p>No images uploaded yet.</p>
        @endforelse
    </div>
    @else<p>No images uploaded yet.</p>@endif
</div></div>
@endsection
