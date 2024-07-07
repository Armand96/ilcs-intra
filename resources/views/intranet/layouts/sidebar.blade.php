<div class="drawer-side">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="menu py-4 w-40 min-h-screen text-base-content sidebar-background border-blue-950 border">
        <img src="{{ asset('assets/images/logo/sidebar_logo.svg') }}" class=" mx-auto w-36 mb-4 mt-2 object-cover"
            alt="logo">
        <!-- Sidebar content here -->
        <div class="flex flex-col w-full justify-center items-center">

            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'dashboard' ? 'menu-child-active border border-blue-950' : 'menu-child' }} flex-col items-center justify-center flex mt-6 w-5/6 px-4 py-3"
                href="{{ route('dashboard') }}">
                <div class="{{ Route::currentRouteName() == 'dashboard' ? 'hex-icon-active' : 'hex-icon' }} p-2 rounded-xl mt-2">
                    <img src="{{ asset('assets/images/icon/dashboard-icon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs 2xl:text-sm">Dashboard</p>
            </a>

            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'our_leader' ? 'menu-child-active border border-blue-950' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="{{route('our_leader')}}">
                <div class=" p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'our_leader' ? 'hex-icon-active' : 'hex-icon' }}">
                    <img src="{{ asset('assets/images/icon/user-octagon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs text-center xl:text-sm">From The Board</p>
            </a>

            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'our_team' ? 'menu-child-active border border-blue-950' : 'menu-child' }}  flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
            href="{{route('our_team')}}">
                <div class=" p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'our_team' ? 'hex-icon-active' : 'hex-icon' }}">
                    <img src="{{ asset('assets/images/icon/user-square.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs 2xl:text-sm">Our Team</p>
            </a>


            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'employee.forum' ? 'menu-child-active border border-blue-950' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="{{route('employee.forum')}}">
                <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'employee.forum' ? 'hex-icon-active' : 'hex-icon' }}">
                    <img src="{{ asset('assets/images/icon/employe-aspiration.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs 2xl:text-sm text-center">Employee Forum</p>
            </a>

            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'knowledge.management' ? 'menu-child-active border border-blue-950' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="{{route('knowledge.management')}}">
                <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'knowledge.management' ? 'hex-icon-active' : 'hex-icon' }}">
                    <img src="{{ asset('assets/images/icon/book-icon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs 2xl:text-sm text-center w-full">Knowledge Management</p>
            </a>

            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'laporan.management' ? 'menu-child-active border border-blue-950' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="{{route('laporan.management')}}">
                <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'laporan.management' ? 'menu-child-active border border-blue-950' : 'menu-child' }}">
                    <img src="{{ asset('assets/images/icon/book-icon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs 2xl:text-sm text-center w-full">Laporan Rapat Management</p>
            </a>

            <!-- <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'our_team' ? 'menu-child-active border border-blue-950' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="{{route('intra.calendar')}}" target="_blank">
                <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'our_regulation' ? 'hex-icon-active' : 'hex-icon' }}">
                    <img src="{{ asset('assets/images/icon/calendar-icon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs 2xl:text-sm text-center">Meeting Calendar</p>
            </a> -->

            <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'our_regulation' ? 'menu-child-active border border-blue-950' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="{{route('our_regulation')}}">
                <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'our_regulation' ? 'hex-icon-active' : 'hex-icon' }}">
                    <img src="{{ asset('assets/images/icon/our-regulation.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs 2xl:text-sm text-center w-full">Our Regulation</p>
            </a>



            <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="https://www.ilcs.co.id/digital-seaport/id" id="product" target="_blank">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/book-icon-2.svg') }}" alt="">
                </div>
                <p class="mt-2 text-xs 2xl:text-sm  text-center w-full">Our Product</p>
            </a>

        </div>

    </div>
</div>
