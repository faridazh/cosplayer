@extends('template.global.page')

@section('main')
    <section class="grid grid-cols-1 md:grid-cols-4 gap-5">
        <div class="col-span-1 md:col-span-3">
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
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
        </div>
        <div class="col-span-1 relative">
            <div class="sticky top-20">
                <section class="sidebar-announcements">
                    <div class="mb-2 text-lg font-semibold uppercase tracking-wide">Announcements</div>
                    <div class="bg-white shadow mx-auto p-5 rounded-md border border-gray-300">
                        <div></div>
                    </div>
                </section>
                <section class="sidebar-events">
                    <div class="mb-2 text-lg font-semibold uppercase tracking-wide">Events</div>
                    <div class="bg-white shadow mx-auto p-5 rounded-md border border-gray-300">
                        <div></div>
                    </div>
                </section>
                <section class="sidebar-stats">
                    <div class="mb-2 text-lg font-semibold uppercase tracking-wide">Stats</div>
                    <div class="bg-white shadow mx-auto p-5 rounded-md border border-gray-300 text-sm space-y-3">
                        <div class="flex items-center justify-between">
                            <div><i class="fas fa-users fa-fw mr-2"></i>Users</div>
                            <div class="bg-palette-4 text-palette-1 py-0.5 px-2 rounded">{{ number_format($totalUsers->value) }}</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div><i class="fas fa-mask fa-fw mr-2"></i>Cosplayers</div>
                            <div class="bg-palette-4 text-palette-1 py-0.5 px-2 rounded">{{ number_format($totalCosplayers->value ?? 0) }}</div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
