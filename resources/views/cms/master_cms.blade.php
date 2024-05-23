<!DOCTYPE html>
<html lang="en">

@include('cms.layouts.head')

<body>

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">

            @include('cms.layouts.navbar')

            <!-- Page content -->
            <div class="flex flex-col items-center justify-center">
                <!-- Page content here -->
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

                <div class="flex w-full px-14 py-6">
                    @yield('content')
                </div>

            </div>

        </div>

        @include('cms.layouts.sidebar')

    </div>
</body>

</html>
