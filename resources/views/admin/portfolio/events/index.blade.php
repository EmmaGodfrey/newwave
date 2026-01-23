@extends('layouts.master')

@section('title') Portfolio Events @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Portfolio @endslot
@slot('title') Events @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Portfolio Events</h4>
                        <p class="card-title-desc">Manage portfolio events and photoshoots</p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.portfolio.events.create') }}" class="btn btn-primary">
                            <i class="bx bx-plus"></i> Add New Event
                        </a>
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

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {!! $dataTable->table(['class' => 'table table-striped table-bordered dt-responsive nowrap', 'width' => '100%']) !!}
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
                <p>Are you sure you want to delete the event <strong id="eventName"></strong>?</p>
                <p class="text-danger"><small>This action cannot be undone and will also delete all associated images.</small></p>
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
{!! $dataTable->scripts() !!}

<script>
function confirmDelete(eventId, eventName) {
    document.getElementById('eventName').textContent = eventName;
    document.getElementById('deleteForm').action = '{{ url("admin/portfolio/events") }}/' + eventId;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}

$(document).ready(function() {
    // Handle DataTable delete buttons
    $(document).on('click', '.delete-event', function() {
        const button = $(this);
        const eventId = button.data('id');
        const eventName = button.data('name') || 'this event';
        
        confirmDelete(eventId, eventName);
    });
});
</script>
@endsection
