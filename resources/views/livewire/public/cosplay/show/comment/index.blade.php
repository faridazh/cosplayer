<div>
    <div class="space-y-3">
        @can('view-any-comment')
            @forelse($comments as $comment)
                <a class="absolute top-20" id="{{ 'cid' . $comment->id }}"></a>
                <div class="flex justify-start items-start space-x-3">
                    <img class="h-10 w-10 rounded-full border border-2" src="{{ asset($comment->user->avatar) }}" loading="lazy" onerror="this.src='{{ asset('assets/avatar/default_avatar.png') }}'">
                    <div class="border rounded px-3 py-2 w-full">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="flex items-center space-x-2">
                                    <div class="font-medium">
                                        <a href="#" target="_blank">{{ $comment->user->username }}</a>
                                    </div>
                                    <a class="text-xs !text-gray-400 hover:underline hover:underline-offset-2" href="{{ '#cid' . $comment->id }}">{{ \Carbon\Carbon::parse($comment->created_at)->locale(config('app.locale'))->diffForHumans() }}</a>
                                </div>
                                <div>{{ $comment->content }}</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="flex items-center space-x-2">
                                    <div class="text-sm font-medium">{{ $comment->likes }}</div>
                                    <i class="@if($comment->liked()) fas @else far @endif fa-thumbs-up fa-fw cursor-pointer text-primary hover:scale-125 transition ease-in-out duration-200" wire:click="likeComment({{ $comment->id }})"></i>
                                </div>
                                @can('delete-comment')
                                    <i class="fas fa-times fa-fw cursor-pointer text-error hover:scale-125 transition ease-in-out duration-200" wire:click="deleteComment({{ $comment->id }})" onclick="return confirm('Are you sure?')"></i>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-sm text-gray-400 my-10">No Comment</div>
            @endforelse
        @endcanany
    </div>
    <div class="mt-10">
        @can('create-comment')
            <div class="flex space-x-2">
                <img class="h-10 w-10 rounded-full border border-2" src="{{ asset(auth()->user()->avatar) }}" loading="lazy" onerror="this.src='{{ asset('assets/avatar/default_avatar.png') }}'">
                <div class="w-full">
                    <textarea class="textbox resize-none placeholder-gray-400 @error('newComment') textbox-error @enderror" placeholder="Type your comment here..." wire:model="newComment"></textarea>
                    @error('newComment') <div class="text-error">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="flex items-center justify-end mt-2">
                <button class="btn btn-primary md:w-fit" wire:click="addComment" wire:loading.class="btn-disabled" wire:loading.class.remove="btn-primary" wire:loading.attr="disabled">Comment</button>
            </div>
        @endcan
    </div>
</div>
