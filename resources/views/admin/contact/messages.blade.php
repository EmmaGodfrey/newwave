@extends('layouts.master')

@section('title') Contact Messages @endsection

@section('content')

@component('common-components.breadcrumb')
    @slot('pagetitle') Contact @endslot
    @slot('title') Messages @endslot
@endcomponent

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Contact Messages</h4>
                
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
