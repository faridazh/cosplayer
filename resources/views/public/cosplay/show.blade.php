@extends('template.global.page')

@section('main')
    <section class="grid grid-cols-1 md:grid-cols-4 gap-5">
        <div class="col-span-1 md:col-span-3">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="col-span-1 relative">
                    <div class="sticky top-20">
                        <div class="flex items-center justify-center">
                            <img class="bg-white rounded-lg shadow border" src="{{ asset($post->cover) }}" loading="lazy">
                        </div>
                    </div>
                </div>
                <div class="col-span-1 md:col-span-2">
                    <div>
                        <div class="font-semibold text-xl">{{ $post->cosplayer->name }} - {{ $post->title }}</div>
                        <div class="text-xs text-gray-500">Posted by {{ $post->author->username }} &bull; {{ \Carbon\Carbon::parse($post->created_at)->locale(config('app.locale'))->diffForHumans() }}</div>
                    </div>
                    <article class="prose prose-neutral my-5 min-h-[200px] text-sm">
                        <div class="font-medium">Description</div>
                        @if(!empty($post->description))
                            {!! Str::markdown($post->description) !!}
                        @endif
                    </article>
                    @auth
                        @livewire('public.cosplay.show.likes', ['post' => $post])
                    @else
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <div class="text-primary"><i class="far fa-thumbs-up"></i></div>
                                <div class="text-sm">{{ number_format($post->likes) }} Likes</div>
                            </div>
                        </div>
                    @endauth
                    <div class="border-t my-5"></div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img class="w-12 h-12 rounded-full border" src="{{ asset($post->cosplayer->avatar) }}" loading="lazy">
                            <div class="space-y-1.5">
                                <div class="font-semibold">
                                    <a href="{{ route('public.cosplayer.showWithSlug', [$post->cosplayer->id, $post->cosplayer->slug]) }}">{{ $post->cosplayer->name }}</a>
                                </div>
                                @if(!empty($post->cosplayer->getRoleNames()->first()))
                                    @foreach($post->cosplayer->getRoleNames() as $role)
                                        <div class="inline-flex items-center py-0.5 px-2 border border-primary text-primary rounded text-xs capitalize">{{ $role }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div>
                            <button class="inline-flex items-center py-1 px-2 border border-primary text-primary rounded capitalize">Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-1 relative">
            <div class="sticky top-20 space-y-5">
                <div class="flex flex-col mx-auto bg-white rounded-lg">
                    <div class="bg-white rounded-lg border shadow pb-5">
                        <img class="w-full h-14 md:h-20 object-cover rounded-t-lg" src="{{ asset($post->cosplayer->cover) }}" loading="lazy">
                        <div class="flex flex-col items-center -mt-8 md:-mt-12">
                            <img class="w-16 h-16 md:w-24 md:h-24 rounded-full border-4 border-white" src="{{ asset($post->cosplayer->avatar) }}" loading="lazy">
                            <div class="text-center mt-5">
                                <div class="font-semibold text-base md:text-lg">
                                    <a href="{{ route('public.cosplayer.showWithSlug', [$post->cosplayer->id, $post->cosplayer->slug]) }}">{{ $post->cosplayer->name }}</a>
                                </div>
                                @if(!empty($post->cosplayer->getRoleNames()->first()))
                                    <div class="mt-3">
                                        @foreach($post->cosplayer->getRoleNames() as $role)
                                            <div class="inline-flex items-center py-0.5 px-2 border border-primary text-primary rounded text-xs capitalize">{{ $role }}</div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="flex items-center justify-center space-x-5 mt-5">
                                @foreach($post->cosplayer->social as $key => $social)
                                    <a href="{{ $social }}" target="_blank"><i class="fab {{ 'fa-'.$key }} fa-fw"></i></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg border shadow p-5">
                    <div class="text-sm space-y-1">
                        @foreach($post->tags as $tag)
                            <div class="inline-flex items-center justify-center bg-palette-5/70 rounded-full py-0.5 px-2">
                                <a href="#" class="font-medium">#{{ $tag }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
