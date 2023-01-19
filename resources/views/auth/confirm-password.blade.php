@extends('template.auth.page')

@section('content')
    <form action="{{ route('password.confirm') }}" method="post">
        @csrf
        <div class="textbox-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="text-center">
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Confirm</button>
        </div>
    </form>
@endsection
