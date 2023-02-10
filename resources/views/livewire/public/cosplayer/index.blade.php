<div class="page-section">
    <div class="main-side">
        <div class="cosplayer-section">
            @foreach($cosplayers as $cosplayer)
                @include('template.components.cosplayer-card')
            @endforeach
        </div>
        <div>{{ $cosplayers->links() }}</div>
    </div>
    <div class="side-relative">
        <div>
            <input type="text" placeholder="Search" wire:model="search">
        </div>
    </div>
</div>
