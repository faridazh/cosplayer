<div>
    <button class="btn btn-tertiary btn-small space-x-1" wire:click="GiveCosplayerStar"><i class="@if($cosplayer->stared()) fas text-yellow-500 @else far @endif fa-star"></i><span>Star</span><span class="bg-gray-200 rounded-full py-0 px-2 text-sm">{{ number_format($cosplayer->stars) }}</span></button>
</div>
