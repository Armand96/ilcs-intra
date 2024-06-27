@extends('intranet.master_intranet')

@section('content')
<div class="bg-onboarding w-11/12 rounded-2xl lg:rounded-lg mx-auto mt-6 px-6 py-2 lg:py-6" style="zoom: 80% ;">
    <div class="flex flex-col bg-blur-comission border border-white text-white rounded-lg w-full px-4 py-2 lg:py-3">
        <h4 class="text-sm lg:text-base font-semibold">
            Our Team
        </h4>
    </div>
</div>

<div class="w-11/12 rounded-lg mx-auto mt-6 flex flex-col lg:flex-row gap-9">

    <div id="toggle" class="flex justify-between dropdown px-2 py-2 rounded-lg card-comission cursor-pointer border border-blue-950 lg:hidden items-center w-full">
        <h4 class="font-semibold text-center text-white">Divisi</h4>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>

    </div>

    <div id="divisi-categories" class="w-full  lg:w-1/5 max-h-[90dvh] hidden lg:flex flex-col gap-6 overflow-hidden overflow-y-auto card-comission px-6 py-8 scroll border border-blue-950 rounded-xl our-team-left">

        <div onclick="clickBtn()" class="{{ request('divisi') == '' ? 'bg-login-button login-button-active' : '' }}  text-center text-white flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                All Employee
            </p>
        </div>

        @foreach ($divisi as $div)
        <div onclick="clickBtn('{{ $div->divisi }}')" class=" {{ request('divisi') == $div->divisi ? 'bg-login-button login-button-active' : '' }} text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                {{ $div->divisi }}
            </p>
        </div>
        @endforeach

        {{-- <div onclick="clickBtn()" class="  text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Hukum & Pengadaan
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            IT & Operasi
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Keuangan
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Layanan Umum
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Pengelolaan Layanan
            </p>
        </div>

        <!-- end of line -->

        <div onclick="clickBtn()" class="  text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Pengembangan Produk
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Perencanaan & Implementasi Proyek
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Sekrataris Perusahaan
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Solusi & Sales

            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Sumber Daya Manusia & Umum
            </p>
        </div>

        <div onclick="clickBtn()" class="  text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Area Makassar
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Area Medan
            </p>
        </div>

        <div onclick="clickBtn()" class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
            Area Surabaya
            </p>
        </div> --}}
    </div>
    <div class="w-full  lg:w-4/5 max-h-[90dvh]  flex flex-col card-comission border px-6 py-8  border-blue-950 rounded-xl ">

        <form id="search_form" method="GET" action="{{ route('our_team') }}" class="input input-bordered  flex items-center gap-2 py-2 w-full lg:w-2/6 text-white search-bar-our-team ">
            <input type="hidden" name="divisi" id="divisi" value="{{ request('divisi') }}">
            <input type="text" class="grow" placeholder="Search" name="name" id="name" value="{{ request('name') }}" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
            </svg>
        </form>

        <div class="grid w-full grid-cols-2 lg:grid-cols-4 gap-4 mt-10 h-full overflow-y-auto our-team-left">

            @foreach ($users as $usr)
            <div class="flex flex-col rounded-xl border h-[13rem] border-blue-900 ">
                <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
                <img src="{{ $usr->image_user }}" onerror="this.src='{{ asset('assets/images/default-profile.png') }}'" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
                <div class="px-4 py-4">
                    <h4 class="text-white text-base font-semibold">{{ $usr->name }}</h4>
                    <p class="text-xs text-dashboard-blue-right font-medium mt-2">{{ $usr->jabatan }}</p>
                </div>
            </div>
            @endforeach

            {{-- <div class="flex flex-col rounded-xl border border-blue-900 ">
                <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-1.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Septiana Puspitasari</h4>
                <p class="text-xs text-dashboard-blue-right font-medium mt-2">Supervisor Sekretaris Perusahaan</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-2.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Nabila Dina Humairoh</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">Sekretaris Perusahaan</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-3.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Vebbyana Agusti</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">Strategy Corporate Developement</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-4.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Zulfa Khoirunnisa</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">Corporate Governance & CSR</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-5.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Harya Pravidya Putrarendani</h4>
                <p class="text-xs text-dashboard-blue-right font-medium mt-2">UIUX Developer Product</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-6.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Dany Sapta Kurniawan</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">UIUX Developer Product</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-7.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Yogi Muhammad Irshad</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">UIUX Developer Product</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-8.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Muhammad Aditya Suazi</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">UIUX Developer Product</p>
            </div>
        </div>


        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-5.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Harya Pravidya Putrarendani</h4>
                <p class="text-xs text-dashboard-blue-right font-medium mt-2">UIUX Developer Product</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-6.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Dany Sapta Kurniawan</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">UIUX Developer Product</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-7.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Yogi Muhammad Irshad</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">UIUX Developer Product</p>
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-blue-900 ">
            <img src="{{ asset('assets/images/background/bg-team.svg') }}" class="rounded-t-xl " alt="">
            <img src="{{ asset('assets/images/teams/team-8.svg') }}" class="w-16 h-16 border border-white -mt-8 ml-2 rounded-full" alt="">
            <div class="px-4 py-4">
                <h4 class="text-white text-base font-semibold">Muhammad Aditya Suazi</h4>
                <p class="text-xs  text-dashboard-blue-right font-medium mt-2">UIUX Developer Product</p>
            </div>
        </div> --}}

    </div>

    <div class="mt-3">
        {{ $users->appends(request()->query())->links('vendor.pagination.tailwind') }}
    </div>

</div>

</div>

<script>
    let toggle = document.getElementById("toggle")

    toggle.addEventListener('click', () => {
        toggleHandle()
    })

    function clickBtn(divisi) {
        $('#divisi').val(divisi);
        $('#name').val('');
        $('#search_form').submit();

    }

    function toggleHandle() {
        let categoriesComp = document.getElementById("divisi-categories")

        if (categoriesComp.classList.contains("flex")) {
            categoriesComp.classList.add("hidden")
            categoriesComp.classList.remove("flex")
        } else {
            categoriesComp.classList.remove("hidden")
            categoriesComp.classList.add("flex")
        }
    }
</script>



@endsection
