@extends('layouts.master')

@section('title') @lang('translation.Users') @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Dashboard @endslot
@slot('title') Users @endslot
@endcomponent

<!-- Toast Container -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1055;">
    <div id="toastContainer"></div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Users Management</h4>
                        <p class="card-title-desc">Manage all users in the system</p>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" id="addNewUser">
                            <i class="bx bx-plus"></i> Add New User
                        </button>
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
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection

@section('script')
{!! $dataTable->scripts() !!}

<!-- User Modals -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div id="modalContent">
                <!-- Modal content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="mdi mdi-alert-circle-outline text-warning" style="font-size: 72px;"></i>
                    <h4 class="mt-3">Are you sure?</h4>
                    <p class="text-muted">You are about to delete the user "<span id="deleteUserName"></span>". This action cannot be undone.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete User</button>
            </div>
        </div>
    </div>
</div>

<script>
function showToast(type, message) {
    const toastId = 'toast-' + Date.now();
    const bgClass = type === 'success' ? 'bg-success' : type === 'danger' ? 'bg-danger' : 'bg-info';
    const iconClass = type === 'success' ? 'check-circle' : type === 'danger' ? 'exclamation-triangle' : 'info-circle';
    
    const toastHtml = `
        <div id="${toastId}" class="toast align-items-center text-white ${bgClass} border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="mdi mdi-${iconClass} me-2"></i>${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;
    
    $('#toastContainer').append(toastHtml);
    
    // Initialize and show the toast
    const toastElement = document.getElementById(toastId);
    if (toastElement && typeof bootstrap !== 'undefined') {
        const toast = new bootstrap.Toast(toastElement);
        toast.show();
        
        // Remove toast from DOM after it's hidden
        toastElement.addEventListener('hidden.bs.toast', function () {
            toastElement.remove();
        });
    } else {
        // Fallback: show for 5 seconds if Bootstrap is not available
        setTimeout(function() {
            $('#' + toastId).fadeOut(function() {
                $(this).remove();
            });
        }, 5000);
    }
}

// Function to clear form validation errors
function clearValidationErrors(form) {
    $(form).find('.is-invalid').removeClass('is-invalid');
    $(form).find('.invalid-feedback').text('');
}

// Function to display validation errors
function displayValidationErrors(form, errors) {
    $.each(errors, function(field, messages) {
        const input = $(form).find('[name="' + field + '"]');
        input.addClass('is-invalid');
        input.siblings('.invalid-feedback').text(messages[0]);
    });
}

$(document).ready(function() {
    // Add New User
    $('#addNewUser').on('click', function() {
        $.get('{{ route("admin.users.create") }}', function(data) {
            $('#modalContent').html(data.html);
            $('#userModal').modal('show');
        });
    });

    // Edit User
    $(document).on('click', '.edit-user', function() {
        let userId = $(this).data('id');
        $.get(`{{ url('admin/users') }}/${userId}/edit`, function(data) {
            $('#modalContent').html(data.html);
            $('#userModal').modal('show');
        });
    });

    // Delete User
    $(document).on('click', '.delete-user', function() {
        const button = $(this);
        const userId = button.data('id');
        const userName = button.data('name') || 'this user';
        const originalHtml = button.html();
        
        // Show the user name in the modal
        $('#deleteUserName').text(userName);
        $('#deleteUserModal').modal('show');
        
        // Handle confirmation
        $('#confirmDeleteBtn').off('click').on('click', function() {
            const confirmBtn = $(this);
            const originalConfirmText = confirmBtn.html();
            
            // Disable confirm button and show loading
            confirmBtn.prop('disabled', true).html('<i class="mdi mdi-loading mdi-spin me-1"></i> Deleting...');
            
            // Get fresh CSRF token
            const token = $('meta[name="csrf-token"]').attr('content');
            
            $.ajax({
                url: `{{ url('admin/users') }}/${userId}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                success: function(response) {
                    $('#deleteUserModal').modal('hide');
                    if (response.success) {
                        showToast('success', response.message);
                        $('#users-table').DataTable().ajax.reload();
                    } else {
                        showToast('danger', response.message || 'Error deleting user');
                    }
                },
                error: function(xhr) {
                    $('#deleteUserModal').modal('hide');
                    if (xhr.status === 419) {
                        showToast('danger', 'Session expired. Please refresh the page and try again.');
                    } else {
                        showToast('danger', 'Error deleting user');
                    }
                },
                complete: function() {
                    // Re-enable confirm button
                    confirmBtn.prop('disabled', false).html(originalConfirmText);
                }
            });
        });
    });

    // Handle Form Submission
    $(document).on('submit', '#userForm', function(e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let method = form.attr('method');
        
        clearValidationErrors(form);
        
        const submitBtn = form.find('button[type="submit"]');
        const originalText = submitBtn.html();
        
        // Disable button and show loading state
        submitBtn.prop('disabled', true).html('<i class="mdi mdi-loading mdi-spin me-1"></i> Saving...');
        
        // Get fresh CSRF token
        const token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: url,
            type: method,
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            success: function(response) {
                if (response.success) {
                    $('#userModal').modal('hide');
                    showToast('success', response.message);
                    $('#users-table').DataTable().ajax.reload();
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    displayValidationErrors(form, errors);
                    showToast('danger', 'Please fix the validation errors.');
                } else {
                    showToast('danger', 'Error processing request');
                }
            },
            complete: function() {
                // Re-enable button and restore original text
                submitBtn.prop('disabled', false).html(originalText);
            }
        });
    });
});
</script>
@endsection