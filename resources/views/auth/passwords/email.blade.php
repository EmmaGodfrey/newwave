@extends('layouts.auth')
@section('title', 'Forgot your password?')
@section('intro', 'Enter your account email and we will send you a password reset link.')
@section('content')
@if(session('status'))
    <div class="auth-status" role="status">{{ session('status') }}</div>
@endif
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    @include('auth.partials.field', ['name' => 'email', 'label' => 'Email address', 'type' => 'email', 'autocomplete' => 'email', 'value' => old('email')])
    <button class="auth-submit" type="submit">Send reset link</button>
</form>
<p class="auth-login-link"><a href="{{ route('login') }}">Back to login</a></p>
@endsection
