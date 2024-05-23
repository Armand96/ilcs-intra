<div class="drawer-side">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="menu py-4 w-40 xl:w-64 min-h-screen text-base-content sidebar-background border-blue-950 border">
        <img src="{{ asset('assets/images/logo/sidebar_logo.svg') }}" class=" mx-auto w-36 mb-4 mt-2 object-cover"
            alt="logo">
        <!-- Sidebar content here -->
        <div class="flex flex-col w-full justify-center items-center">

            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'dashboard' ? 'menu-child-active' : 'menu-child' }} flex-col items-center justify-center flex mt-6 w-5/6 px-4 py-3"
                href="{{ route('dashboard') }}">
                <div class="{{ Route::currentRouteName() == 'dashboard' ? 'hex-icon-active' : 'hex-icon' }} p-2 rounded-xl mt-2">
                    <img src="{{ asset('assets/images/icon/dashboard-icon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs xl:text-sm">Dashboard</p>
            </a>

            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'our_leader' ? 'menu-child-active' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="{{route('our_leader')}}">
                <div class=" p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'our_leader' ? 'hex-icon-active' : 'hex-icon' }}">
                    <img src="{{ asset('assets/images/icon/user-octagon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs text-center xl:text-sm">From The Board</p>
            </a>

            <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class=" p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/user-square.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs xl:text-sm">Our Team</p>
            </a>


            <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/employe-aspiration.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs xl:text-sm text-center xl:text-nowrap w-full">Employe Aspiration</p>
            </a>

            <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/calendar-icon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs xl:text-sm text-center  xl:text-nowrap w-full">Meeting Calendar</p>
            </a>

            <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/our-regulation.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs xl:text-sm text-center w-full">Our Regulation</p>
            </a>

            <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/book-icon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs xl:text-sm text-center w-full">Knowledge Management</p>
            </a>

            <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/book-icon-2.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs xl:text-sm  text-center w-full">Our Product</p>
            </a>

        </div>

    </div>

</div>
