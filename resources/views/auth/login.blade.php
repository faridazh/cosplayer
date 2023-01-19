@extends('template.auth.page')

@section('content')
    <div class="flex items-center justify-center space-x-3 mb-5">
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('password.request') }}">Forgot Password</a>
    </div>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="text-group">
            <label for="email">Email</label>
            <input class="textbox" type="email" name="email" id="email">
        </div>
        <div class="text-group">
            <label for="password">Password</label>
            <input class="textbox" type="password" name="password" id="password">
        </div>
        <div class="checkbox-group">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </div>
        <div class="button-group">
            <button class="btn btn-primary" type="submit">Login</button>
        </div>
    </form>
@endsection
