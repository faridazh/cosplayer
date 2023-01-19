@extends('template.auth.page')

@section('content')
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            A new email verification link has been emailed to you!
        </div>
    @endif
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <div class="text-group">
            <label for="email">Email</label>
            <input class="textbox" type="email" name="email" id="email" value="{{ auth()->user() ? auth()->user()->email : old('email') }}">
        </div>
        <div class="button-group">
            <button class="btn btn-primary" type="submit">Send Verification</button>
        </div>
    </form>
@endsection
