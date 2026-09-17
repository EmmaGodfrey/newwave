@extends('layouts.auth')
@section('title', 'Set a new password')
@section('intro', 'Choose a new password for your NewWave account.')
@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    @include('auth.partials.field', ['name' => 'email', 'label' => 'Email address', 'type' => 'email', 'autocomplete' => 'email', 'value' => $email ?? old('email')])
    @include('auth.partials.field', ['name' => 'password', 'label' => 'New password', 'type' => 'password', 'autocomplete' => 'new-password'])
    @include('auth.partials.field', ['name' => 'password_confirmation', 'label' => 'Confirm new password', 'type' => 'password', 'autocomplete' => 'new-password'])
    <button class="auth-submit" type="submit">Reset password</button>
</form>
<p class="auth-login-link"><a href="{{ route('login') }}">Back to login</a></p>
@endsection
