@extends('template.global.page')

@section('main')
    <section>
        <div class="cosplayer-section">
            @foreach($cosplayers as $cosplayer)
                <div class="cos-card">
                    <img class="thumb" src="{{ asset($cosplayer->cover) }}" loading="lazy"/>
                    <div class="flex items-center -mt-7 px-4">
                        <img class="w-14 h-14 rounded-full border-2" src="{{ asset($cosplayer->avatar) }}" loading="lazy">
                    </div>
                    <div class="title">
                        <a href="{{ route('public.cosplayer.showWithSlug', [$cosplayer->id, $cosplayer->slug]) }}">{{ $cosplayer->name }}</a>
                    </div>
                    <div class="body"></div>
                    <div class="information">
                        <div class="cosplay">
                            <div class="overflow-hidden">
                                <div class="text-xs text-gray-400">Latest Cosplay</div>
                                <div class="text-sm font-semibold truncate">
                                    <a href="{{ route('public.cosplay.showWithSlug', [$cosplayer->posts()->latest()->first()->id, $cosplayer->posts()->latest()->first()->slug]) }}">{{ $cosplayer->posts()->latest()->first()->title }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="stats">
                            <div class="count">
                                <i class="fas fa-mask text-indigo-400"></i>
                                <p class="font-medium">{{ number_format($cosplayer->posts) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
