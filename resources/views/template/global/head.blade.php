<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ (!empty($page_title) ? $page_title . ' - ' : null) . config('app.name', 'Cosplayer.gg') }}</title>

    @vite('resources/css/global.css')
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/v4-font-face.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/v4-shims.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/v5-font-face.min.css') }}">

    @vite('resources/js/global.js')
</head>
