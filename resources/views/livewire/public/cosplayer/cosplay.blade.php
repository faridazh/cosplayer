<div>
    <div class="cosplay-section">
        @foreach($posts as $post)
            @include('template.components.cos-card')
        @endforeach
    </div>
    <div class="mt-10">{{ $posts->links() }}</div>
</div>
