@extends('layouts.master')

@section('title') View Message @endsection

@section('content')

@component('common-components.breadcrumb')
    @slot('pagetitle') Contact @endslot
    @slot('title') View Message @endslot
@endcomponent

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title mb-0">Message Details</h4>
                    <a href="{{ route('admin.contact.messages.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Messages
                    </a>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Name:</label>
                    <p>{{ $message->name }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email:</label>
                    <p><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Phone:</label>
                    <p><a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Subject:</label>
                    <p>{{ $message->subject }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Message:</label>
                    <div class="p-3 bg-light rounded">
                        {!! nl2br(e($message->message)) !!}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Status:</label>
                    <p>
                        @if($message->is_read)
                            <span class="badge bg-success">Read</span>
                        @else
                            <span class="badge bg-warning">Unread</span>
                        @endif
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Received:</label>
                    <p>{{ $message->created_at->format('F d, Y \a\t h:i A') }}</p>
                </div>

                <div class="mt-4">
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn btn-primary">
                        <i class="fas fa-reply"></i> Reply via Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
