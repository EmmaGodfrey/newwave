@extends('layouts.auth')
@section('title', 'Admin login')
@section('intro', 'Sign in to manage NewWave Motorsport.')
@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    @include('auth.partials.field', ['name' => 'email', 'label' => 'Email address', 'type' => 'email', 'autocomplete' => 'username', 'value' => old('email')])
    @include('auth.partials.field', ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'autocomplete' => 'current-password'])
    <p class="auth-help"><a href="{{ route('password.request') }}">Forgot your password?</a></p>
    <button class="auth-submit" type="submit">Log in</button>
</form>
@endsection
