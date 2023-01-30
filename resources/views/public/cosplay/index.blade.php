@extends('template.global.page')

@section('main')
    <section class="cosplay-section">
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
                    <a href="{{ route('public.cosplay.showWithSlug', [$post->id, $post->slug]) }}">{{ $post->title }}</a>
                </div>
                <div class="information">
                    <div class="cosplayer">
                        <a href="{{ route('public.cosplayer.showWithSlug', [$post->cosplayer->id, $post->cosplayer->slug]) }}">
                            <img src="{{ asset($post->cosplayer->avatar) }}" loading="lazy"/>
                        </a>
                        <div class="overflow-hidden">
                            <div class="text-sm font-semibold truncate">
                                <a href="{{ route('public.cosplayer.showWithSlug', [$post->cosplayer->id, $post->cosplayer->slug]) }}">{{ $post->cosplayer->name }}</a>
                            </div>
                            <div class="text-xs text-gray-400">{{ $post->created_at }}</div>
                        </div>
                    </div>
                    <div class="stats">
                        <div class="count">
                            <i class="far fa-heart text-red-400"></i>
                            <p class="font-medium">{{ number_format($post->likes) }}</p>
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
