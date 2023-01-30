@extends('template.global.page')

@section('main')
    <section>
        <div class="flex flex-col mx-auto bg-white rounded-lg">
            <div class="bg-white rounded-lg border shadow pb-10">
                <img class="w-full h-36 md:h-52 object-cover rounded-t-lg" src="{{ asset($cosplayer->cover) }}" loading="lazy">
                <div class="flex flex-col items-center -mt-12 md:-mt-20">
                    <img class="w-24 h-24 md:w-40 md:h-40 rounded-full border-4 border-white" src="{{ asset($cosplayer->avatar) }}" loading="lazy">
                    <div class="text-center mt-5">
                        <div class="font-semibold text-xl md:text-2xl">{{ $cosplayer->name }}</div>
                        @if(!empty($cosplayer->getRoleNames()->first()))
                            <div class="mt-3">
                                @foreach($cosplayer->getRoleNames() as $role)
                                    <div class="inline-flex items-center py-0.5 px-2 border border-primary text-primary rounded text-xs md:text-sm capitalize">{{ $role }}</div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-center space-x-5 mt-5">
                        @foreach($cosplayer->social as $key => $social)
                            <a href="{{ $social }}" target="_blank"><i class="fab {{ 'fa-'.$key }} fa-fw"></i></a>
                        @endforeach
                    </div>
                </div>
                <div class="border-b mt-5"></div>
                <div class="flex flex-col items-center mt-5">
                    <div class="font-semibold uppercase mb-2">Content Shop</div>
                    <div class="flex items-center justify-center space-x-5">
                        @foreach($cosplayer->shop as $key => $shop)
                            @if(!empty($shop))
                                <a href="{{ $shop }}" class="text-sm md:text-base" target="_blank">{{ Str::title($key) }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-16">
        <div class="font-semibold text-2xl tracking-wide mb-3 uppercase">Cosplay</div>
        <div class="cosplay-section">
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
        </div>
    </section>
    <section>{{ $posts->links() }}</section>
    <section class="grid grid-cols-1 md:grid-cols-4 gap-5">
        <div class="col-span-1 md:col-span-3">

        </div>
        <div class="col-span-1 relative">
            <div class="sticky top-20">

            </div>
        </div>
    </section>
@endsection
