@extends('template.auth.page')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
        <div class="text-group">
            <label for="email">Email</label>
            <input class="textbox" type="email" name="email" id="email" value="{{ request()->get('email') }}">
        </div>
        <div class="text-group">
            <label for="password">Password</label>
            <input class="textbox" type="password" name="password" id="password">
        </div>
        <div class="text-group">
            <label for="password_confirmation">Confirm Password</label>
            <input class="textbox" type="password" name="password_confirmation" id="password_confirmation">
        </div>
        <div class="button-group">
            <button class="btn btn-primary" type="submit">Change Password</button>
        </div>
    </form>
@endsection
