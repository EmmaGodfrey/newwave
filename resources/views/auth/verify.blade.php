@extends('layouts.auth')
@section('title', 'Verify your email')
@section('intro', 'Check your inbox for a verification link before continuing.')
@section('content')
@if(session('resent'))<div class="auth-status" role="status">A new verification link has been sent.</div>@endif
@if(Route::has('verification.resend'))
<form method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button class="auth-submit" type="submit">Resend verification email</button>
</form>
@endif
@endsection
