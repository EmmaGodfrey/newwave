@extends('layouts.auth')
@section('title', 'Confirm your password')
@section('intro', 'Enter your current password to continue.')
@section('content')
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    @include('auth.partials.field', ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'autocomplete' => 'current-password'])
    <p class="auth-help"><a href="{{ route('password.request') }}">Forgot your password?</a></p>
    <button class="auth-submit" type="submit">Confirm password</button>
</form>
@endsection
