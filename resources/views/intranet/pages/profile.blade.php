@extends('intranet.master_intranet')

@php
\Carbon\Carbon::setLocale('id');
$user = Auth::user();
@endphp

@section('content')
<div class="bg-onboarding w-11/12  mx-auto mt-6 px-6 py-6">
    <div class="flex flex-col bg-blur-comission border border-white text-white rounded-lg w-full px-4 py-6">
        <h4 class="text-sm">Profile Information</h4>
        <div class="flex items-center">
            <!-- <img src="{{ strpos($user->image_user, 'http') !== false ? $user->image_user : url('storage/profile_picture/'.$user->image_user) }}" class="h-12 w-12 mt-6" alt="profile" onerror="this.src='{{ asset('assets/images/default-profile.png') }}'"> -->
            <h4 class="text-lg ml-3 mt-3 font-bold">{{ $user->name }}</h4>
        </div>
    </div>
</div>

<div class="flex flex-col gap-8 mt-6 w-11/12 mx-auto  rounded-xl our-regulation-background px-4 py-6 border border-blue-950 ">



    <div class="w-full flex flex-col lg:flex-row">
        <div class="grid w-full lg:h-44 order-2 mt-4 lg:mt-0 lg:order-1 lg:w-4/6 lg:grid-cols-3">
            <div class="flex flex-col">
                <p class="my-3 text-sm text-white">Nama</p>
                <div class="text-white px-4 text-sm py-2 rounded-6xl flex items-center bg-[#5d5b6c] border rounded-xl lg:w-5/6">
                    <p class="font-bold text-sm">{{ $user->name }}</p>
                </div>
            </div>
            <div class="flex flex-col">
                <p class="my-3 text-sm text-white">Departemen</p>
                <div class="text-white px-4 text-sm py-2 rounded-6xl flex items-center bg-[#5d5b6c] border rounded-xl lg:w-4/6">
                    <p class="font-bold">{!! $user->dept == "" || $user->dept == null ? "&nbsp;" : $user->dept !!}</p>
                </div>
            </div>
            <div class="flex flex-col">
                <p class="my-3 text-xs text-white">Tanggal Lahir</p>
                <div class="text-white px-4 text-sm py-2 rounded-6xl flex items-center bg-[#5d5b6c] border rounded-xl  lg:w-3/6">
                    <p class="font-bold">{{ \Carbon\Carbon::parse($user->tgl_lahir)->translatedFormat('d F Y') }}</p>
                </div>
            </div>
            <div class="flex flex-col">
                <p class="my-3 text-sm text-white">Nomor Induk Pegawai</p>
                <div class="text-white px-4 text-sm py-2 rounded-6xl flex items-center bg-[#5d5b6c] border rounded-xl lg:w-2/6">
                    <p class="font-bold text-sm">{{ $user->nip }}</p>
                </div>
            </div>
            <div class="flex flex-col">
                <p class="my-3 text-sm text-white">Jabatan</p>
                <div class="text-white px-4 text-sm py-2 rounded-6xl flex items-center bg-[#5d5b6c] border rounded-xl lg:w-4/6">
                    <p class="font-bold">{{ $user->jabatan }}</p>
                </div>
            </div>
        </div>

        <div class="flex w-full order-1 lg:order-2 lg:w-2/6 flex-col justify-center items-center mt-4">
            <img src="{{ strpos($user->image_user, 'http') !== false ? $user->image_user : url('storage/profile_picture/'.$user->image_user) }}" class="h-32 w-32 mt-3 rounded-full" alt="profile" onerror="this.src='{{ asset('assets/images/default-profile.png') }}'">
            <form action="{{route('update.profile')}}" class="flex flex-col gap-6" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col">
                    <p class="my-3 text-sm text-white">Ganti Profile</p>
                    <input name="foto" type="file" class="text-white px-4 text-sm py-2 rounded-6xl flex items-center bg-[#5d5b6c] border rounded-xl" accept="image/png, image/gif, image/jpeg" />
                </div>
                <button class="bg-login-button text-white px-3 py-2 text-sm rounded-xl">update profile</button>
            </form>
        </div>

    </div>

    <a href="{{ route('logout') }}" class="cursor-pointer text-white px-4 mt-6 lg:mt-0 py-2 rounded-6xl flex items-center bg-[#DD4D4D]/[40%] border rounded-xl lg:w-1/12">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
        </svg>
        <p class="font-bold text-sm">Logout</p>
    </a>
</div>





<script>
    function editProfile() {
        console.log("tests")
    }

    document.addEventListener('DOMContentLoaded', function() {
        let tabs = document.querySelectorAll('[data-tab-target]');
        let tabContents = document.querySelectorAll('#tab-contents > div');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(item => item.classList.remove('bg-login-button'));
                tab.classList.add('bg-login-button');
                const target = document.querySelector(tab.dataset.tabTarget);
                tabContents.forEach(content => content.classList.add('hidden'));
                target.classList.remove('hidden');
                target.classList.add('flex');
            });
        });
    });
</script>
@endsection