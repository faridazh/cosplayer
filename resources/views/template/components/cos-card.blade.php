<div class="cos-card">
    <img class="thumb" src="{{ asset($post->cover) }}" loading="lazy"/>
    <div class="title">
        <a href="{{ route('public.cosplay.showWithSlug', [$post->id, $post->slug]) }}">{{ $post->title }}</a>
    </div>
    <div class="body">
        <div class="tags overflow-hidden">
            @forelse(array_slice($post->tags, 0, 5) as $tag)
                <span class="tag whitespace-nowrap"><a href="#">#{{ $tag }}</a></span>
            @empty
            @endforelse
        </div>
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
                <i class="far fa-thumbs-up text-primary"></i>
                <p class="font-medium">{{ number_format($post->likes) }}</p>
            </div>
        </div>
    </div>
</div>
