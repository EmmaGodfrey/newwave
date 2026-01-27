@extends('layouts.master')

@section('title') Edit Service Pricing @endsection

@section('content')

@component('common-components.breadcrumb')
    @slot('pagetitle') Service Pricing @endslot
    @slot('title') Edit Service @endslot
@endcomponent

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Service Information</h4>

                <form action="{{ route('admin.service-pricing.update', $servicePricing) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Service Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $servicePricing->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                               id="slug" name="slug" value="{{ old('slug', $servicePricing->slug) }}" required>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4">{{ old('description', $servicePricing->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price', $servicePricing->price) }}" step="0.01" min="0" required>
                            </div>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price_label" class="form-label">Price Label</label>
                            <input type="text" class="form-control @error('price_label') is-invalid @enderror" 
                                   id="price_label" name="price_label" value="{{ old('price_label', $servicePricing->price_label) }}" 
                                   placeholder="e.g., Starting from">
                            @error('price_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="text" class="form-control @error('duration') is-invalid @enderror" 
                                   id="duration" name="duration" value="{{ old('duration', $servicePricing->duration) }}" 
                                   placeholder="e.g., Per event, Per day">
                            @error('duration')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" 
                                   id="category" name="category" value="{{ old('category', $servicePricing->category) }}" 
                                   placeholder="e.g., Photography, Video">
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Features</label>
                        <div id="features-container">
                            @php
                                $features = old('features', $servicePricing->features ?? []);
                            @endphp
                            @if($features)
                                @foreach($features as $feature)
                                <div class="input-group mb-2 feature-row">
                                    <input type="text" class="form-control" name="features[]" 
                                           value="{{ $feature }}" placeholder="Enter feature">
                                    <button type="button" class="btn btn-danger remove-feature">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-sm btn-secondary mt-2" id="add-feature">
                            <i class="mdi mdi-plus"></i> Add Feature
                        </button>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Service</button>
                        <a href="{{ route('admin.service-pricing.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Settings</h4>

                <div class="mb-3">
                    <label for="order" class="form-label">Display Order</label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror" 
                           id="order" name="order" value="{{ old('order', $servicePricing->order) }}" min="0">
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Lower numbers appear first</small>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="is_featured" 
                               name="is_featured" value="1" {{ old('is_featured', $servicePricing->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Featured Service</label>
                    </div>
                    <small class="text-muted">Featured services are highlighted</small>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="is_active" 
                               name="is_active" value="1" {{ old('is_active', $servicePricing->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Tips</h4>
                <ul class="text-muted mb-0" style="font-size: 0.875rem;">
                    <li>Use clear, descriptive service names</li>
                    <li>Add 4-6 key features per service</li>
                    <li>Featured services appear with special styling</li>
                    <li>Use categories to group similar services</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('blur', function() {
        const slugField = document.getElementById('slug');
        const generatedSlug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        
        // Only update if slug is empty or matches the old auto-generated pattern
        if (!slugField.dataset.modified) {
            slugField.value = generatedSlug;
        }
    });

    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.modified = 'true';
    });

    // Features management
    let featureIndex = {{ $servicePricing->features ? count($servicePricing->features) : 0 }};

    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const row = document.createElement('div');
        row.className = 'input-group mb-2 feature-row';
        row.innerHTML = `
            <input type="text" class="form-control" name="features[]" placeholder="Enter feature">
            <button type="button" class="btn btn-danger remove-feature">
                <i class="mdi mdi-delete"></i>
            </button>
        `;
        container.appendChild(row);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-feature') || 
            e.target.closest('.remove-feature')) {
            e.target.closest('.feature-row').remove();
        }
    });
</script>
@endsection
