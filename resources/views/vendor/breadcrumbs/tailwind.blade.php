@unless ($breadcrumbs->isEmpty())
    <nav class="breadcrumbs">
        <div class="body">
            <ol>
                @foreach ($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        <li>
                            <a href="{{ $breadcrumb->url }}">
                                {{ $breadcrumb->title }}
                            </a>
                        </li>
                    @else
                        <li>
                            {{ $breadcrumb->title }}
                        </li>
                    @endif
                    @unless($loop->last)
                        <li class="text-gray-500 px-2">
                            /
                        </li>
                    @endif
                @endforeach
            </ol>
        </div>
    </nav>
@endunless
