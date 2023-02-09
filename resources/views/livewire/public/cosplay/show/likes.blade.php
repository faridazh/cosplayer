<div class="flex justify-between items-center">
    <div class="flex items-center space-x-2">
        <div class="cursor-pointer text-primary hover:scale-125 transition ease-in-out duration-200" wire:click="postlike"><i class="@if($post->liked()) fas @else far @endif fa-thumbs-up"></i></div>
        <div class="text-sm">{{ number_format($post->likes) }} Likes</div>
    </div>
</div>
