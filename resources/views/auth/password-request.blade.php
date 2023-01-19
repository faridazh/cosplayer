@extends('template.auth.page')

@section('content')
    <div class="flex items-center justify-center space-x-3 mb-5">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="text-group">
            <label for="email">Email</label>
            <input class="textbox" type="email" name="email" id="email">
        </div>
        <div class="button-group">
            <button class="btn btn-primary">Reset Password</button>
        </div>
    </form>
@endsection
