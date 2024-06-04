<div class="navbar  bg-gray-800 border">
    <div class=" hidden lg:flex lg:flex-1">
        <p class=" lg:text-xl font-semibold text-white">Admin CMS</p>
    </div>
    <div class="flex w-full lg:w-4/6 lg:flex-none">
        <!-- <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                    <span class="badge badge-sm bg-red-500 border-none text-white indicator-item">8</span>
                </div>
            </div>
            <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-60 bg-base-100 shadow">
                <h4 class=" px-4 font-semibold my-3">Notification</h4>
                <div class=" flex flex-col items-center justify-center mx-auto px-2 py-1 cursor-pointer border-b border-blue-950">
                    <p class="text-sm font-semibold text-center ">Selamat kamu kena sp 1</p>
                    <p class="text-sm font-light text-blue-300">Klik lebih lanjut..</p>
                </div>
                <div class="flex flex-col items-center mx-auto px-2 py-1 cursor-pointer border-b border-blue-950">
                    <p class="text-sm font-semibold text-center ">Selamat kamu kena sp 2</p>
                    <p class="text-sm font-light text-blue-300">Klik lebih lanjut..</p>
                </div>
                <div class="flex flex-col mt-2 items-center mx-auto px-2 py-1 cursor-pointer border-b border-blue-950">
                    <p class="text-sm font-semibold text-center ">Selamat kamu kena sp 3 🎉 selamat tinggal</p>
                    <p class="text-sm font-light text-blue-300">Klik lebih lanjut..</p>
                </div>
            </div>
        </div> -->
        <label for="my-drawer-2"  class="text-white w-7 lg:hidden ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
            </svg>
        </label>

        <div class="dropdown dropdown-end ml-auto">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                    <span class="badge badge-sm bg-red-500 border-none text-white indicator-item">0</span>
                </div>
            </div>
            <div tabindex="0" class="mt-3 z-[1] left-0 card card-compact dropdown-content w-60 bg-base-100 shadow">
                <h4 class=" px-4 font-semibold my-3">Notification</h4>
                <h4 class=" px-4 text-xs text-center mb-10 mt-3">No Notification</h4>
                <!-- <div class=" flex flex-col items-center justify-center mx-auto px-2 py-1 cursor-pointer border-b border-blue-950">
                    <p class="text-sm font-semibold text-center ">User 1 Mengomentari aspirasi Anda</p>
                    <p class="text-sm font-light text-blue-300">Klik lebih lanjut..</p>
                </div>
                <div class="flex flex-col items-center mx-auto px-2 py-1 cursor-pointer border-b border-blue-950">
                    <p class="text-sm font-semibold text-center ">User 2 Mengomentari aspirasi Anda</p>
                    <p class="text-sm font-light text-blue-300">Klik lebih lanjut..</p>
                </div>
                <div class="flex flex-col mt-2 items-center mx-auto px-2 py-1 cursor-pointer border-b border-blue-950">
                    <p class="text-sm font-semibold text-center ">User 3 Mengomentari aspirasi Anda</p>
                    <p class="text-sm font-light text-blue-300">Klik lebih lanjut..</p>
                </div> -->
            </div>
        </div>

        <div class="dropdown dropdown-end ">
            <div class="flex items-center" tabindex="0" role="button">
                <p class="text-semibold  text-white mx-4">{{ explode(' ', Auth::user()->name)[0] }}</p>
                <div class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white ml-2 mr-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>

            </div>

            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow text-white rounded-box w-52 bg-dashboard-background border border-blue-950 ">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a>Profile</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>

    </div>
</div>
