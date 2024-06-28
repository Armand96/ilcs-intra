@extends('intranet.master_intranet')

@section('content')
<div class="bg-onboarding w-11/12  mx-auto mt-6 px-6 py-6">
    <div class="flex flex-col  bg-blur-comission border border-white text-white rounded-lg w-full px-4 py-6">
        <h4 class="text-lg font-semibold">
            Laporan Rapat Management
        </h4>

    </div>
</div>
<div class="flex flex-col order-1 lg:flex-row mt-6 w-11/12 mx-auto  rounded-xl our-regulation-background p-4 border border-blue-950 ">
    <p class="text-sm text-white">
        <span class="font-bold">Laporan Rapat Management</span> The work guidelines and implementation of the duties of the Board of Commissioners, Directors, Supporting Organs of the Board of Commissioners, Supporting Organs of the Board of Directors refer to the Board Manual which is useful as a reference in each of their activities.
    </p>
</div>


<div class="flex flex-col order-2 lg:flex-row mt-6 w-11/12 mx-auto gap-4">

    <div class="flex flex-col w-full lg:w-1/4 2xl:w-1/6 px-4 py-5 gap-5 our-regulation-background border rounded-xl border-blue-950">

        @foreach ($kategoris as $index => $kat)
            <div class="text-center {{$index == 0 ? "bg-login-button" : ""}} text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer " data-tab-target="#tab_{{$kat->id}}">
                <p class="font-semibold text-base">
                    {{ $kat->nama_kategori }}
                </p>
            </div>
        @endforeach
        {{-- <div class="text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer " data-tab-target="#tab2">
            <p class="font-semibold text-base">
                Rapat Gabungan
            </p>
        </div> --}}
    </div>

    <div id="tab-contents" class="w-full lg:h-[30vh] lg:w-3/4 2xl:w-5/6 our-regulation-background border rounded-xl border-blue-950 ">

        @foreach ($kategoris as $index => $kat)
            <div class="w-full {{$index == 0 ? "flex" : "hidden"}} flex-col px-4 py-5 text-white" id="tab_{{$kat->id}}">
                <div class=" flex items-center justify-between">
                    <h1 class="text-xl font-semibold">{{ $kat->nama_kategori }}</h1>

                    <select class="select bg-[#283358] rounded-full lg:w-full max-w-xs">
                        <option disabled selected>Pilih periode</option>
                        @foreach ($year as $yr)
                            <option value="{{$yr->tahun_laporan}}">{{$yr->tahun_laporan}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid lg:grid-cols-4 gap-6 mt-6">

                    @foreach ($laporans as $lap)
                        @if ($lap->kategori_id == $kat->id)
                            <div class="">
                                <a href="{{ $lap->file_path }}" target="_blank" class="text-white px-4 text-sm py-2 rounded-6xl flex items-center login-button bg-[#5d5b6c] border rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    <div class="flex w-full justify-between  text-left text-xs">
                                        <p class="font-bold">{{ $lap->nama_laporan }}</p>
                                        <p class="font-extralight color-[#BCBCBD]">{{ $lap->file_size }} MB</p>
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach

                </div>

            </div>

        @endforeach

    </div>

</div>



<script>
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

