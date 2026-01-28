@extends('layouts.master')

@section('title') Edit FAQ @endsection

@section('content')

@component('common-components.breadcrumb')
    @slot('pagetitle') FAQs @endslot
    @slot('title') Edit FAQ @endslot
@endcomponent

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">FAQ Information</h4>

                <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('question') is-invalid @enderror" 
                               id="question" name="question" value="{{ old('question', $faq->question) }}" required>
                        @error('question')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('answer') is-invalid @enderror" 
                                  id="answer" name="answer" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
                        @error('answer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="order" class="form-label">Display Order</label>
                        <input type="number" class="form-control @error('order') is-invalid @enderror" 
                               id="order" name="order" value="{{ old('order', $faq->order) }}">
                        @error('order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Lower numbers appear first</small>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" 
                               {{ old('is_active', $faq->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Update FAQ</button>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary w-md">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
