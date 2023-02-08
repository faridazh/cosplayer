@extends('template.global.page')

@section('main')
    <section class="cosplay-section">
        @foreach($posts as $post)
            @include('template.components.cos-card')
        @endforeach
    </section>
    <section>{{ $posts->links() }}</section>
@endsection
