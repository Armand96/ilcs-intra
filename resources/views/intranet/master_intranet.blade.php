<!DOCTYPE html>
<html lang="en">

@include('intranet.layouts.head')

<body>

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">

            @include('intranet.layouts.navbar')

            <!-- Page content -->
            <div class="flex flex-col items-center justify-center">
                <!-- Page content here -->
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

                @yield('content')

            </div>

        </div>

        @include('intranet.layouts.sidebar')

    </div>
</body>

</html>
