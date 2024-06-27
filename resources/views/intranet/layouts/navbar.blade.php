@php
    $notifs = App\Models\Notification::with(['userFrom'])->where('notif_to_user_id', Auth::user()->id)->limit(10)->orderBy('id', 'desc')->get();
    $notifsUnread = App\Models\Notification::where('notif_to_user_id', Auth::user()->id)->where('read_at', null)->count();
@endphp

<div class="navbar bg-dashboard-background border border-blue-950 ">
    <div class=" hidden lg:flex lg:flex-1">
        <p class=" lg:text-xl font-semibold text-white">Dashboard intranet</p>
    </div>
    <div class="flex w-full lg:w-4/6 lg:flex-none">
        <label for="my-drawer-2" class="text-white w-7 lg:hidden ">
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
                    <span class="badge badge-sm bg-red-500 border-none text-white indicator-item">{{ $notifsUnread }}</span>
                </div>
            </div>
            <div tabindex="0" class="mt-3 z-[1] bg-[#1D2A47] -left-[30] card card-compact  dropdown-content w-80 shadow">
                <h4 class=" px-4 font-semibold text-white bg-[#36447E] py-3 rounded-t-lg">Notification</h4>
                <!-- <h4 class=" px-4 text-xs text-center mb-10 mt-3">No Notification</h4> -->

                @foreach ($notifs as $item)
                    <a class="text-white gap-4 flex mx-auto px-2 py-1 cursor-pointer border-b border-blue-950 {{ $item->read_at == null ? 'bg-[#384478]' : 'bg-[#1D2A47]'  }}" href="{{ route('notif.read', $item->id) }}">
                        <img src="{{ strpos($item->userFrom->image_user, 'http') !== false ? $item->userFrom->image_user : url('storage/profile_picture/'.$item->userFrom->image_user) }}" alt="profile" class="w-10 h-10 rounded-full">
                        <div class="flex flex-col">
                            <p class="text-white text-xs">
                                {{ $item->notif_description }}
                            </p>
                            <p class="text-white text-[8px]">
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}
                            </p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>

        <div class="dropdown dropdown-end ">
            <div class="flex items-center" tabindex="0" role="button">
                <p class="text-semibold  text-white mx-4">{{ explode(' ', Auth::user()->name)[0] }}</p>
                <div class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 ">
                        <img alt="profile" class="rounded-full"  src="{{ strpos(Auth::user()->image_user, 'http') !== false ? Auth::user()->image_user : url('storage/profile_picture/'.Auth::user()->image_user) }} " onerror="this.src='{{ asset('assets/images/default-profile.png') }}'"/>
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white ml-2 mr-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>

            </div>

            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 absolute z-[300] p-2 shadow text-white rounded-box w-52 bg-black border border-blue-950 ">
                @if (Auth::user()->role->is_admin)
                <li><a href="{{ url('/cms_admin/home') }}">CMS</a></li>
                @endif
                <li><a>Profile</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>

    </div>
</div>
