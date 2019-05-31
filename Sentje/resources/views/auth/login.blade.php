@extends('layouts.app')

@section('content')
<div id="loginform">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <img src="{{ asset('images/logo.png') }}" class="logo">
        <input id="email" name="email" type="email" class="input" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>
        <input id="password" name="password" type="password" class="input" placeholder="Password" required autocomplete="current-password">
        <label>Remember me:</label>
        <input type="checkbox" class="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <a href="{{route('register')}}" class="register">Register</a>
        <div class="loginbutton"><button type="submit" >{{ __('Login') }}</button></div>
    </form>
</div>
@endsection

@push('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush
