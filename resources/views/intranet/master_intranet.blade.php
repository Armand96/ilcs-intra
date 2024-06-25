<!DOCTYPE html>
<html lang="en">

@include('intranet.layouts.head')

<body>
    @include('components.toastify')
    @include('components.loading')

    <div style="zoom: 80% " class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content  bg-dashboard">

            @include('intranet.layouts.navbar')

            <!-- Page content -->
            <div class="flex flex-col items-center justify-center">
                <!-- Page content here -->

                @yield('content')

            </div>

        </div>
        
        <input type="hidden" id="url_host" value="{{ url('/') }}">
        @include('intranet.layouts.sidebar')

        @yield('reactjsscript')
    </div>
</body>

<script>
    window.onload = function() {
        document.getElementById('loading').style.display = 'none';
    }
</script>

</html>
