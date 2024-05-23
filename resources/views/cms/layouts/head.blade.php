<head>
    <meta charset="utf-8" />
    <title>
        Admin CMS
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/pelindo.png') }}">

    {{-- STYLE --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @yield('extracss')

    {{-- JS --}}
    <script src='{{ asset('js/full-calendar.js') }}'></script>
    <script src='{{ asset('js/jquery.min.js') }}'></script>
    <script src='{{ asset('js/owl.carousel.js') }}'></script>
    @yield('extrajs')
</head>
