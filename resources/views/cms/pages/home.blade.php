@extends('cms.master_cms')

@section('content')

<div class="flex flex-col w-full">
    <h1 class="text-3xl text-center text-black">Selamat datang Admin</h1>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-11">
        <div class="flex flex-col items-center justify-center rounded-xl bg-gray-600 border h-32 text-center  px-4 py-3">
            <p class="text-xl text-white">Jumlah User</p>
            <p class="font-bold text-3xl text-white">100</p>
        </div>

        <div class="flex flex-col items-center justify-center rounded-xl bg-gray-600 border h-32 text-center  px-4 py-3">
            <p class="text-xl text-white">Jumlah event</p>
            <p class="font-bold text-3xl text-white">100</p>
        </div>
        <div class="flex flex-col items-center justify-center rounded-xl bg-gray-600 border h-32 text-center  px-4 py-3">
            <p class="text-xl text-white">Jumlah news</p>
            <p class="font-bold text-3xl text-white">100</p>
        </div>
        <div class="flex flex-col items-center justify-center rounded-xl bg-gray-600 border h-32 text-center  px-4 py-3">
            <p class="text-xl text-white">Jumlah post employe forum hari ini</p>
            <p class="font-bold text-3xl text-white">100</p>
        </div>
    </div>
</div>

@endsection
