<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title>Pelindo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/pelindo.png') }}">
        @include('layouts.head-css')
    </head>

    <body style="background-color:rgba(16, 163, 127, 0.7)">
        @include('layouts.sidebar')

        <div class="page-wrapper">
            @include('layouts.topbar')

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                @include('layouts.footer')
            </div>

        </div>
        @include('layouts.vendor-scripts')
    </body>
</html>