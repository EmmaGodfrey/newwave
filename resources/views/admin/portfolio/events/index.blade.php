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

@endsection

@section('script')
{!! $dataTable->scripts() !!}
@endsection
