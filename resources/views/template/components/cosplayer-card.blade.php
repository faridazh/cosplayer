<div class="cos-card">
    <img class="thumb" src="{{ asset($cosplayer->cover) }}" loading="lazy"/>
    <div class="flex items-center -mt-7 px-4">
        <img class="w-14 h-14 rounded-full border-2" src="{{ asset($cosplayer->avatar) }}" loading="lazy">
    </div>
    <div class="title">
        <a href="{{ route('public.cosplayer.showWithSlug', [$cosplayer->id, $cosplayer->slug]) }}">{{ $cosplayer->name }}</a>
    </div>
    <div class="body">
        <div class="desc truncate">{{ $cosplayer->description }}</div>
    </div>
    <div class="information">
        <div class="cosplay">
            <div>
                <div class="text-xs font-medium text-gray-400">Latest Cosplay</div>
                <div class="text-sm font-semibold">
                    @if(!empty($cosplayer->posts()->latest()->first()->id))
                        <a href="{{ route('public.cosplay.showWithSlug', [$cosplayer->posts()->latest()->first()->id, $cosplayer->posts()->latest()->first()->slug]) }}">{{ $cosplayer->posts()->latest()->first()->title }}</a>
                    @else
                        <span class="text-gray-300">Nothing</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="stats">
            <div class="count">
                <span class="font-medium">{{ number_format($cosplayer->posts) }}</span><i class="fas fa-mask fa-fw text-indigo-500"></i>
            </div>
            <div class="count">
                <span class="font-medium">{{ number_format($cosplayer->stars) }}</span><i class="fas fa-star fa-fw text-yellow-500"></i>
            </div>
        </div>
    </div>
</div>
