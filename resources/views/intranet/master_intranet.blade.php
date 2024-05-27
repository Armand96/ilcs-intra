<!DOCTYPE html>
<html lang="en">

@include('intranet.layouts.head')

<body>

    @include('components.loading')

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">

            @include('intranet.layouts.navbar')

            <!-- Page content -->
            <div class="flex flex-col items-center justify-center">
                <!-- Page content here -->

                @yield('content')

            </div>

        </div>

        @include('intranet.layouts.sidebar')

    </div>
</body>

<script>
       window.onload = function() {
            document.getElementById('loading').style.display = 'none';
        }
</script>

</html>
