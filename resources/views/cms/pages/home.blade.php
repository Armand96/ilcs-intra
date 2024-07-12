@extends('cms.master_cms')

@section('content')

<div class="flex flex-col w-full">
    <h1 class="text-3xl text-center text-black">Selamat datang Admin</h1>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-11">
        <a href="{{ route('users.index') }}" class="flex flex-col items-center justify-center rounded-xl bg-gray-600 border h-32 text-center  px-4 py-3">
            <p class="text-xl text-white">Total jumlah user</p>
            <p class="font-bold text-3xl text-white">{{ $data['user']['total'] }}</p>
        </a>

        <a href="{{ route('calendars.index') }}" class="flex flex-col items-center justify-center rounded-xl bg-gray-600 border h-32 text-center  px-4 py-3">
            <p class="text-xl text-white">Jumlah event tahun ini</p>
            <p class="font-bold text-3xl text-white">{{ $data['event'] }}</p>
        </a>

        <a href="{{ route('news.index') }}" class="flex flex-col items-center justify-center rounded-xl bg-gray-600 border h-32 text-center  px-4 py-3">
            <p class="text-xl text-white">Jumlah news tahun ini</p>
            <p class="font-bold text-3xl text-white">{{ $data['news']['total'] }}</p>
        </a>
        <a href="{{ route('employee.forum') }}" class="flex flex-col items-center justify-center rounded-xl bg-gray-600 border h-32 text-center  px-4 py-3">
            <p class="text-xl text-white">Jumlah post employe forum tahun ini</p>
            <p class="font-bold text-3xl text-white">{{ $data['post'] }}</p>
        </a>
    </div>
</div>

@endsection
