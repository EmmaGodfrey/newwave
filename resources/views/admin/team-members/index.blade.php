@extends('layouts.master')

@section('title') Team Members @endsection

@section('content')

@component('common-components.breadcrumb')
    @slot('pagetitle') Content @endslot
    @slot('title') Team Members @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Team Members List</h4>
                    <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus mr-2"></i> Add New Member
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
{!! $dataTable->scripts() !!}
@endsection
