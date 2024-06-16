@php
    $superAdmin = \App\Enums\RoleAdminEnum::SUPER_ADMIN;
    $adminSDM = \App\Enums\RoleAdminEnum::ADMIN_SDM;
    $adminHKP = \App\Enums\RoleAdminEnum::ADMIN_HKM;
    $currRoleName = Auth::user()->role->role_name;
@endphp

<!-- sidebar -->
<div class="drawer-side">
    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="menu py-4 w-40 h-[125vh] text-base-content sidebar-background border-blue-950 border">
        <img src="{{ asset('assets/images/logo/sidebar_logo.svg') }}" class=" mx-auto w-36 mb-4 mt-2 object-cover"
            alt="logo">
        <!-- Sidebar content here -->
        <div class="flex flex-col w-full justify-center items-center" style="zoom: 90% ;">

            @if ($currRoleName == $superAdmin || $currRoleName == $adminSDM)
                <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'users.index' ? 'menu-child-active' : 'menu-child' }} flex-col items-center justify-center flex mt-6 w-5/6 px-4 py-3"
                    href="{{ route('users.index') }}">
                    <div class="{{ Route::currentRouteName() == 'users.index' ? 'hex-icon-active' : 'hex-icon' }} p-2 rounded-xl mt-2">
                        <img src="{{ asset('assets/images/icon/user-octagon.svg') }}" alt="">
                    </div>
                    <p class="mt-2 text-sm text-center">
                        User
                    </p>
                </a>

                <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'links.index' ? 'menu-child-active' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                    href="{{ route('links.index') }}">
                    <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'links.index' ? 'hex-icon-active' : 'hex-icon' }}">
                        <img src="{{ asset('assets/images/icon/employe-aspiration.svg') }}" alt="">
                    </div>
                    <p class="mt-2 text-sm">Link</p>
                </a>
            @endif


            @if ($currRoleName == $superAdmin || $currRoleName == $adminHKP)
                <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'regulasis.index' ? 'menu-child-active' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                    href="{{ route('regulasis.index') }}">
                    <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'regulasis.index' ? 'hex-icon-active' : 'hex-icon' }}">
                        <img src="{{ asset('assets/images/icon/employe-aspiration.svg') }}" alt="">
                    </div>
                    <p class="mt-2 text-sm">Regulations</p>
                </a>
            @endif
            {{-- <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class=" p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/user-octagon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-sm">News</p>
            </a> --}}

            {{-- <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class=" p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/user-square.svg') }}" alt="">
                </div>
                <p class="mt-2 text-sm">Events</p>
            </a> --}}

            @if ($currRoleName == $superAdmin)
                <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'leaders.index' ? 'menu-child-active' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                    href="{{ route('leaders.index') }}">
                    <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'leaders.index' ? 'hex-icon-active' : 'hex-icon' }}">
                        <img src="{{ asset('assets/images/icon/calendar-icon.svg') }}" alt="">
                    </div>
                    <p class="mt-2 text-sm">Leader</p>
                </a>
                <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'news.index' ? 'menu-child-active' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                    href="{{ route('news.index') }}">
                    <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'news.index' ? 'hex-icon-active' : 'hex-icon' }}">
                        <img src="{{ asset('assets/images/icon/calendar-icon.svg') }}" alt="">
                    </div>
                    <p class="mt-2 text-sm">News</p>
                </a>
                <a class="text-white rounded-2xl {{ Route::currentRouteName() == 'calendars.index' ? 'menu-child-active' : 'menu-child' }} flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                    href="{{ route('calendars.index') }}">
                    <div class="p-2 rounded-xl mt-2 {{ Route::currentRouteName() == 'calendars.index' ? 'hex-icon-active' : 'hex-icon' }}">
                        <img src="{{ asset('assets/images/icon/calendar-icon.svg') }}" alt="">
                    </div>
                    <p class="mt-2 text-sm">Calendar</p>
                </a>
            @endif

            {{-- <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/our-regulation.svg') }}" alt="">
                </div>
                <p class="mt-2 text-sm text-center w-full">Team</p>
            </a> --}}

            {{-- <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/book-icon.svg') }}" alt="">
                </div>
                <p class="mt-2 text-sm  text-center w-full">Knowledge Management</p>
            </a>

            <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3"
                href="#">
                <div class="p-2 rounded-xl mt-2 hex-icon">
                    <img src="{{ asset('assets/images/icon/book-icon-2.svg') }}" alt="">
                </div>
                <p class="mt-2 text-sm  text-center w-full">Products</p>
            </a> --}}

        </div>

    </div>

</div>
