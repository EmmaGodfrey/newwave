@extends('layouts.master')

@section('title') Edit Event @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Portfolio @endslot
@slot('title') Edit Event @endslot
@endcomponent

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Portfolio Event</h4>
                <p class="card-title-desc">Update event details and manage gallery</p>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.portfolio.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id') ?? $event->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') ?? $event->title }}" required>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4">{{ old('description') ?? $event->description }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="event_date" class="form-label">Event Date</label>
                                <input type="date" class="form-control @error('event_date') is-invalid @enderror" 
                                       id="event_date" name="event_date" value="{{ old('event_date') ?? $event->event_date?->format('Y-m-d') }}">
                                @error('event_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror" 
                                       id="location" name="location" value="{{ old('location') ?? $event->location }}">
                                @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    @if($event->featured_image)
                    <div class="mb-3">
                        <label class="form-label">Current Featured Image</label>
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $event->featured_image) }}" alt="{{ $event->title }}" 
                                 class="img-thumbnail" style="max-height: 200px;">
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="featured_image" class="form-label">
                            {{ $event->featured_image ? 'Replace Featured Image' : 'Featured Image' }}
                        </label>
                        <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                               id="featured_image" name="featured_image" accept="image/*">
                        @error('featured_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">
                            {{ $event->featured_image ? 'Leave empty to keep current image' : 'This image will be used as the thumbnail for the event' }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" name="sort_order" value="{{ old('sort_order') ?? $event->sort_order ?? 0 }}" min="0">
                        @error('sort_order')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">Order in which events are displayed (0 = first)</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured" 
                                           name="is_featured" value="1" {{ (old('is_featured') ?? $event->is_featured) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_featured">
                                        Featured Event
                                    </label>
                                </div>
                                <div class="form-text">Featured events appear prominently on the website</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_active" 
                                           name="is_active" value="1" {{ (old('is_active') ?? $event->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-text">Only active events will be displayed on the website</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.portfolio.events.index') }}" class="btn btn-secondary">
                            <i class="bx bx-x"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-save"></i> Update Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Event Images</h5>
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadImageModal">
                    <i class="bx bx-plus"></i> Add Images
                </button>
            </div>
            <div class="card-body">
                @if($event->images->count() > 0)
                    <div class="row g-2">
                        @foreach($event->images as $image)
                            <div class="col-6">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                                         alt="{{ $image->title }}" 
                                         class="img-fluid rounded" 
                                         style="height: 100px; object-fit: cover; width: 100%;">
                                    <div class="position-absolute top-0 end-0 p-1">
                                        <button type="button" class="btn btn-danger btn-sm" 
                                                onclick="deleteImage({{ $image->id }})" 
                                                title="Delete Image">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                    @if($image->title)
                                        <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-1 text-center small">
                                            {{ Str::limit($image->title, 20) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center text-muted">
                        <i class="bx bx-image-add display-4"></i>
                        <p class="mt-2">No images added yet</p>
                        <small>Click "Add Images" to upload photos for this event</small>
                    </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Event Info</h5>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Created:</dt>
                    <dd class="col-sm-8">{{ $event->created_at->format('M j, Y') }}</dd>
                    
                    <dt class="col-sm-4">Images:</dt>
                    <dd class="col-sm-8">{{ $event->images->count() }} uploaded</dd>
                    
                    <dt class="col-sm-4">Status:</dt>
                    <dd class="col-sm-8">
                        <span class="badge bg-{{ $event->is_active ? 'success' : 'secondary' }}">
                            {{ $event->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        @if($event->is_featured)
                            <span class="badge bg-warning">Featured</span>
                        @endif
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- Upload Image Modal -->
<div class="modal fade" id="uploadImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Event Images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.portfolio.images.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="hidden" name="from_event_edit" value="1">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="images" class="form-label">Select Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" 
                               accept="image/*" multiple required>
                        <div class="form-text">You can select multiple images at once</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="default_title" class="form-label">Default Title (optional)</label>
                        <input type="text" class="form-control" id="default_title" name="default_title">
                        <div class="form-text">This will be used as title for all uploaded images</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload Images</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
function deleteImage(imageId) {
    if (confirm('Are you sure you want to delete this image?')) {
        fetch(`/admin/portfolio/images/${imageId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error deleting image: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting image');
        });
    }
}
</script>
@endsection