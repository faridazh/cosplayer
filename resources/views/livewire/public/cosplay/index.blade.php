<div class="page-section">
    <div class="main-side">
        <div class="cosplay-section">
            @foreach($posts as $post)
                @include('template.components.cos-card')
            @endforeach
        </div>
        <div>{{ $posts->links() }}</div>
    </div>
    <div class="side-relative">
        <div>
            <input type="text" placeholder="Search" wire:model="search">
        </div>
    </div>
</div>
