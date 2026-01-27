@extends('layouts.master')

@section('title') Edit Team Member @endsection

@section('content')

@component('common-components.breadcrumb')
    @slot('pagetitle') Team Members @endslot
    @slot('title') Edit Member @endslot
@endcomponent

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Team Member Information</h4>

                <form action="{{ route('admin.team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $teamMember->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror" 
                               id="position" name="position" value="{{ old('position', $teamMember->position) }}" required>
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" 
                                  id="bio" name="bio" rows="5">{{ old('bio', $teamMember->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email', $teamMember->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                               id="phone" name="phone" value="{{ old('phone', $teamMember->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Social Links</label>
                        <div id="social-links-container">
                            @php
                                $socialLinks = old('social_links', $teamMember->social_links ?? []);
                            @endphp
                            @if($socialLinks)
                                @foreach($socialLinks as $platform => $url)
                                <div class="row mb-2 social-link-row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="social_links[{{ $loop->index }}][platform]" 
                                               placeholder="Platform (e.g., Facebook)" value="{{ $platform }}">
                                    </div>
                                    <div class="col-md-7">
                                        <input type="url" class="form-control" name="social_links[{{ $loop->index }}][url]" 
                                               placeholder="URL" value="{{ $url }}">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger btn-sm remove-social-link">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-sm btn-secondary mt-2" id="add-social-link">
                            <i class="mdi mdi-plus"></i> Add Social Link
                        </button>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Team Member</button>
                        <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Image & Settings</h4>

                <div class="mb-3">
                    <label for="image" class="form-label">Profile Image</label>
                    
                    @if($teamMember->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $teamMember->image) }}" 
                             alt="{{ $teamMember->name }}" 
                             class="img-thumbnail" 
                             style="max-width: 200px;">
                        <p class="text-muted small mt-1">Current image</p>
                    </div>
                    @endif
                    
                    <input type="file" class="form-control @error('image') is-invalid @enderror" 
                           id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Leave empty to keep current image. Recommended: Square image, min 400x400px</small>
                    
                    <div id="image-preview" class="mt-3" style="display: none;">
                        <img src="" alt="Preview" class="img-thumbnail" style="max-width: 100%;">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">Display Order</label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror" 
                           id="order" name="order" value="{{ old('order', $teamMember->order) }}" min="0">
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Lower numbers appear first</small>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="is_active" 
                               name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('image-preview');
                preview.querySelector('img').src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Social links management
    let socialLinkIndex = {{ $teamMember->social_links ? count($teamMember->social_links) : 0 }};

    document.getElementById('add-social-link').addEventListener('click', function() {
        const container = document.getElementById('social-links-container');
        const row = document.createElement('div');
        row.className = 'row mb-2 social-link-row';
        row.innerHTML = `
            <div class="col-md-4">
                <input type="text" class="form-control" name="social_links[${socialLinkIndex}][platform]" 
                       placeholder="Platform (e.g., Facebook)">
            </div>
            <div class="col-md-7">
                <input type="url" class="form-control" name="social_links[${socialLinkIndex}][url]" 
                       placeholder="URL">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm remove-social-link">
                    <i class="mdi mdi-delete"></i>
                </button>
            </div>
        `;
        container.appendChild(row);
        socialLinkIndex++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-social-link') || 
            e.target.closest('.remove-social-link')) {
            e.target.closest('.social-link-row').remove();
        }
    });
</script>
@endsection
