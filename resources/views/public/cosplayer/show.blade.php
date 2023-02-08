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
{{--        <div class="font-semibold text-2xl tracking-wide mb-3 uppercase">Cosplay</div>--}}
        <div class="cosplay-section">
            @foreach($posts as $post)
                @include('template.components.cos-card')
            @endforeach
        </div>
    </section>
    <section>{{ $posts->links() }}</section>
@endsection
