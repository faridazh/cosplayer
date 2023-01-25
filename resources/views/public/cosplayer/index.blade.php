@extends('template.global.page')

@section('main')
    <section>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach($cosplayers as $cosplayer)
                <div class="cos-card">
                    <img class="thumb" src="{{ asset($cosplayer->cover) }}" loading="lazy"/>
                    <div class="flex items-center -mt-7 px-4">
                        <img class="w-14 h-14 rounded-full border-2" src="{{ asset($cosplayer->avatar) }}" loading="lazy">
                    </div>
                    <div class="title">
                        <a href="{{ route('public.cosplayer.showWithSLug', [$cosplayer->id, $cosplayer->slug]) }}">{{ $cosplayer->name }}</a>
                    </div>
                    <div class="body"></div>
                    <div class="information">
                        <div class="cosplayer">

                        </div>
                        <div class="stats">
                            <div class="count">
                                <i class="far fa-heart text-red-400"></i>
                                <p class="font-medium">{{ number_format(10) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
