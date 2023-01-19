@extends('template.global.page')

@section('main')
    <section class="grid grid-cols-1 md:grid-cols-4 gap-5">
        <div class="col-span-1 md:col-span-3">
            <section>Content</section>
            <section>Content</section>
            <section>Content</section>
        </div>
        <div class="col-span-1">
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
                        <div class="bg-palette-4 text-palette-1 py-0.5 px-2 rounded">{{ number_format($users->value) }}</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div><i class="fas fa-mask fa-fw mr-2"></i>Cosplayers</div>
                        <div class="bg-palette-4 text-palette-1 py-0.5 px-2 rounded">{{ number_format($cosplayers->value ?? 0) }}</div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
