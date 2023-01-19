<!doctype html>
<html lang="en" class="light">

@include('template.global.head')

<body class="{{ (!empty($page_id) ? $page_id : null) }}">
    @include('template.global.header')

    <div class="main">
        @hasSection('main')
            @yield('main')
        @endif
    </div>
    @auth
        <form action="{{ route('logout') }}" method="post" id="logout">
            @csrf
        </form>
    @endauth
    @include('sweetalert::alert')
    @include('template.global.footer')
</body>

</html>
