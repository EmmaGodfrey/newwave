@extends('layouts.master')

@section('title') {{ $event->title }} - Event Images @endsection

@section('css')
<style>
.image-card {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.image-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.image-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.image-actions {
    position: absolute;
    top: 10px;
    right: 10px;
    display: flex;
    gap: 5px;
}

.image-badge {
    position: absolute;
    top: 10px;
    left: 10px;
}

.image-info {
    padding: 15px;
    background: white;
}

.upload-area {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 40px 20px;
    text-align: center;
    background: #f8f9fa;
    cursor: pointer;
    transition: all 0.3s ease;
}

.upload-area:hover {
    border-color: #556ee6;
    background: #f0f2ff;
}

.upload-area.dragover {
    border-color: #556ee6;
    background: #e8ebff;
}
</style>
@endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Portfolio Events @endslot
@slot('title') {{ $event->title }} - Images @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <!-- Event Info Card -->
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="mb-2">{{ $event->title }}</h4>
                        <p class="text-muted mb-2">
                            <span class="badge bg-info">{{ $event->category->name }}</span>
                            @if($event->event_date)
                                <span class="ms-2"><i class="bx bx-calendar"></i> {{ $event->event_date->format('F j, Y') }}</span>
                            @endif
                            @if($event->location)
                                <span class="ms-2"><i class="bx bx-map"></i> {{ $event->location }}</span>
                            @endif
                        </p>
                        @if($event->description)
                            <p class="text-muted mb-0">{{ $event->description }}</p>
                        @endif
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('admin.portfolio.events.edit', $event->id) }}" class="btn btn-primary">
                            <i class="bx bx-edit"></i> Edit Event
                        </a>
                        <a href="{{ route('admin.portfolio.events.index') }}" class="btn btn-secondary">
                            <i class="bx bx-arrow-back"></i> Back to Events
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Images Card -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Upload New Images</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.portfolio.images.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="from_event_show" value="1">
                    
                    <div class="upload-area" id="uploadArea">
                        <i class="bx bx-cloud-upload" style="font-size: 48px; color: #556ee6;"></i>
                        <h5 class="mt-3">Drop images here or click to browse</h5>
                        <p class="text-muted">Upload multiple images at once (JPG, PNG, GIF - Max 2MB each)</p>
                        <input type="file" class="d-none" id="imageInput" name="images[]" accept="image/*" multiple>
                        <button type="button" class="btn btn-primary mt-2" onclick="document.getElementById('imageInput').click()">
                            <i class="bx bx-upload"></i> Select Images
                        </button>
                    </div>

                    <div id="previewArea" class="mt-3 row" style="display: none;"></div>

                    <div class="mt-3" id="uploadControls" style="display: none;">
                        <div class="mb-3">
                            <label for="default_title" class="form-label">Default Title for All Images (Optional)</label>
                            <input type="text" class="form-control" id="default_title" name="default_title" placeholder="Enter a title to apply to all images">
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="bx bx-upload"></i> Upload All Images
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="resetUpload()">
                            <i class="bx bx-x"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Existing Images Card -->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title">Event Images ({{ $event->images->count() }})</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($event->images->count() > 0)
                    <div class="row">
                        @foreach($event->images as $image)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4" id="image-{{ $image->id }}">
                                <div class="card image-card">
                                    @if($image->is_featured)
                                        <span class="badge bg-warning image-badge">Featured</span>
                                    @endif
                                    <div class="image-actions">
                                        <a href="{{ route('admin.portfolio.images.edit', $image->id) }}" 
                                           class="btn btn-sm btn-primary" title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" 
                                                onclick="confirmDelete({{ $image->id }}, '{{ $image->title ?: 'this image' }}')" 
                                                title="Delete">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                    <a href="{{ asset('storage/' . $image->image_path) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}">
                                    </a>
                                    <div class="image-info">
                                        @if($image->title)
                                            <h6 class="mb-1">{{ $image->title }}</h6>
                                        @else
                                            <h6 class="mb-1 text-muted">Untitled</h6>
                                        @endif
                                        @if($image->description)
                                            <p class="text-muted small mb-2">{{ Str::limit($image->description, 50) }}</p>
                                        @endif
                                        <small class="text-muted">
                                            <i class="bx bx-sort"></i> Order: {{ $image->sort_order }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bx bx-image" style="font-size: 64px; color: #ccc;"></i>
                        <h5 class="mt-3 text-muted">No images uploaded yet</h5>
                        <p class="text-muted">Upload images using the form above</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong id="imageName"></strong>?</p>
                <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
// Drag and drop functionality
const uploadArea = document.getElementById('uploadArea');
const imageInput = document.getElementById('imageInput');
const previewArea = document.getElementById('previewArea');
const uploadControls = document.getElementById('uploadControls');

uploadArea.addEventListener('click', () => {
    imageInput.click();
});

uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('dragover');
});

uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('dragover');
});

uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('dragover');
    imageInput.files = e.dataTransfer.files;
    handleFiles(imageInput.files);
});

imageInput.addEventListener('change', (e) => {
    handleFiles(e.target.files);
});

function handleFiles(files) {
    if (files.length === 0) return;

    previewArea.innerHTML = '';
    previewArea.style.display = 'flex';
    uploadControls.style.display = 'block';

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        if (!file.type.startsWith('image/')) continue;

        const reader = new FileReader();
        reader.onload = (e) => {
            const col = document.createElement('div');
            col.className = 'col-lg-2 col-md-3 col-sm-4 col-6 mb-3';
            col.innerHTML = `
                <div class="card">
                    <img src="${e.target.result}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="${file.name}">
                    <div class="card-body p-2">
                        <small class="text-muted">${file.name}</small>
                    </div>
                </div>
            `;
            previewArea.appendChild(col);
        };
        reader.readAsDataURL(file);
    }
}

function resetUpload() {
    imageInput.value = '';
    previewArea.innerHTML = '';
    previewArea.style.display = 'none';
    uploadControls.style.display = 'none';
}

function confirmDelete(imageId, imageName) {
    document.getElementById('imageName').textContent = imageName;
    document.getElementById('deleteForm').action = '{{ url("admin/portfolio/images") }}/' + imageId;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

// Handle AJAX delete
document.getElementById('deleteForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('deleteModal')).hide();
            
            // Remove image card from DOM
            const imageId = form.action.split('/').pop();
            const imageCard = document.getElementById('image-' + imageId);
            if (imageCard) {
                imageCard.remove();
            }
            
            // Show success message
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show';
            alertDiv.innerHTML = `
                ${data.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            document.querySelector('.card-body').insertBefore(alertDiv, document.querySelector('.card-body').firstChild);
            
            // Update image count
            const imageCount = document.querySelectorAll('.image-card').length;
            document.querySelector('.card-title').textContent = `Event Images (${imageCount})`;
            
            // Reload page after 2 seconds to update count
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the image.');
    });
});
</script>
@endsection
