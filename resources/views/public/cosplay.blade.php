@extends('template.global.page')

@section('main')
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @forelse($posts as $post)
            <div class="cos-card">
                <img class="thumb" src="{{ asset($post->cover) }}" loading="lazy"/>
                <div class="tags">
                    <span class="tag">Tag</span>
                    <span class="tag">Tag</span>
                    <span class="tag">Tag</span>
                    <span class="tag">Tag</span>
                </div>
                <div class="title">
                    <a href="#">{{ $post->title }}</a>
                </div>
                <div class="information">
                    <div class="cosplayer">
                        <a href="#">
                            <img src="{{ asset($post->cosplayer->avatar) }}" loading="lazy"/>
                        </a>
                        <div class="overflow-hidden">
                            <div class="text-sm font-semibold truncate">
                                <a href="#">{{ $post->cosplayer->name }}</a>
                            </div>
                            <div class="text-xs text-gray-400">{{ $post->created_at }}</div>
                        </div>
                    </div>
                    <div class="stats">
                        <div class="count">
                            <i class="far fa-heart text-red-400"></i>
                            <p class="font-medium">{{ number_format(10) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="font-mono tracking-widest text-sm">Nothing Here</div>
        @endforelse
    </section>
    <section>{{ $posts->links() }}</section>
@endsection
