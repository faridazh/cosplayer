@extends('template.auth.page')

@section('content')
    <div class="mb-5 text-center">
        <a href="{{ route('login') }}">Login</a>
    </div>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="text-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}">
            @error('username')
            <span class="text-error">{{ $errors->first('username') }}</span>
            @enderror
        </div>
        <div class="text-group">
            <label for="email">Email</label>
            <input class="textbox" type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
            <span class="text-error">{{ $errors->first('email') }}</span>
            @enderror
        </div>
        <div class="text-group">
            <label for="password">Password</label>
            <input class="textbox" type="password" name="password" id="password">
            @error('password')
            <span class="text-error">{{ $errors->first('password') }}</span>
            @enderror
        </div>
        <div class="text-group">
            <label for="password_confirmation">Confirm Password</label>
            <input class="textbox" type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <div class="button-group">
            <button class="btn btn-primary">Register</button>
        </div>
    </form>
@endsection
