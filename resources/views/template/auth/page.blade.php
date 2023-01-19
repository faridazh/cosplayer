<!DOCTYPE html>
<html lang="en">

@include('template.auth.head')

<body class="auth">
    <div class="w-full px-5">
        @include('template.auth.header')
        <div class="form-group">
            <div class="space-y-5 mb-10 text-center">
                <div>{{ (!empty($page_title) ? $page_title : null) }}</div>
            </div>
            @hasSection('content')
                @yield('content')
            @endif
        </div>
        @include('sweetalert::alert')
        @include('template.auth.footer')
    </div>
</body>

</html>
