@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Admin @endslot
@slot('title') Dashboard @endslot
@endcomponent

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Total Users</p>
                        <h4 class="mb-2">1,235</h4>
                        <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-user-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
    
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Blog Posts</p>
                        <h4 class="mb-2">42</h4>
                        <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>12.5%</span>from previous period</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-success rounded-3">
                            <i class="ri-article-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Portfolio Items</p>
                        <h4 class="mb-2">28</h4>
                        <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>3.2%</span>from previous period</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-info rounded-3">
                            <i class="ri-folder-image-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Team Members</p>
                        <h4 class="mb-2">12</h4>
                        <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>2.1%</span>from previous period</p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-warning rounded-3">
                            <i class="ri-team-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Recent Activities</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Activity</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>New blog post "Laravel Best Practices" created</td>
                                <td><span class="badge bg-primary-subtle text-primary">Blog</span></td>
                                <td>Jan 18, 2026</td>
                                <td><span class="badge bg-success-subtle text-success">Published</span></td>
                            </tr>
                            <tr>
                                <td>Portfolio item "Modern Website Design" added</td>
                                <td><span class="badge bg-info-subtle text-info">Portfolio</span></td>
                                <td>Jan 17, 2026</td>
                                <td><span class="badge bg-success-subtle text-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>New user registration</td>
                                <td><span class="badge bg-warning-subtle text-warning">User</span></td>
                                <td>Jan 16, 2026</td>
                                <td><span class="badge bg-success-subtle text-success">Verified</span></td>
                            </tr>
                            <tr>
                                <td>Team member profile updated</td>
                                <td><span class="badge bg-secondary-subtle text-secondary">Team</span></td>
                                <td>Jan 15, 2026</td>
                                <td><span class="badge bg-success-subtle text-success">Updated</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Quick Actions</h4>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                        <i class="ri-user-add-line me-2"></i>Add New User
                    </a>
                    <button class="btn btn-success">
                        <i class="ri-article-line me-2"></i>Create Blog Post
                    </button>
                    <button class="btn btn-info">
                        <i class="ri-image-add-line me-2"></i>Add Portfolio Item
                    </button>
                    <button class="btn btn-warning">
                        <i class="ri-team-line me-2"></i>Add Team Member
                    </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">System Info</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Laravel Version</span>
                    <span class="fw-bold">{{ app()->version() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>PHP Version</span>
                    <span class="fw-bold">{{ PHP_VERSION }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Environment</span>
                    <span class="fw-bold text-capitalize">{{ app()->environment() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection