@extends('layouts.auth')
@section('title', 'Staff access only')
@section('intro', 'Accounts are managed by the NewWave Motorsport administrator.')
@section('content')
<p class="auth-login-link"><a href="{{ route('login') }}">Back to login</a></p>
@endsection
