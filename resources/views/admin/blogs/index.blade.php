@extends('layouts.master')

@section('title') Blog Posts @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Content @endslot
@slot('title') Blog Posts @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Blog Posts</h4>
                        <p class="card-title-desc">Manage blog posts and articles</p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                            <i class="bx bx-plus"></i> Add New Blog
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
                <p>Are you sure you want to delete the blog post <strong id="blogTitle"></strong>?</p>
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
{!! $dataTable->scripts() !!}

<script>
function confirmDelete(blogId, blogTitle) {
    document.getElementById('blogTitle').textContent = blogTitle || 'this blog post';
    document.getElementById('deleteForm').action = '{{ url("admin/blogs") }}/' + blogId;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

// Wait for DataTable to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Handle DataTable delete buttons
    $(document).on('click', '[onclick^="confirmDelete"]', function(e) {
        e.preventDefault();
    });
});
</script>
@endsection
