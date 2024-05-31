@extends('intranet.master_intranet')

@section('content')
<div class="bg-onboarding w-11/12 rounded-2xl lg:rounded-lg mx-auto mt-6 px-6 py-4 lg:py-6">
    <div class="flex flex-col bg-blur-comission border border-white text-white rounded-lg w-full px-4 py-2 lg:py-6">
        <h4 class="text-sm lg:text-lg font-semibold">
            our team
        </h4>
    </div>
</div>

<div class="w-11/12 rounded-lg mx-auto mt-6 flex flex-col lg:flex-row gap-9"> 

    <div class="flex justify-center dropdown px-2 py-2 rounded-lg card-comission cursor-pointer border border-blue-950 lg:hidden items-center w-full">
        <h4 class="font-semibold text-center text-white">Kategori</h4>
    </div>

    <div class="w-full order-2 lg:order-1 lg:w-1/5 max-h-[70dvh] hidden lg:flex flex-col gap-6 overflow-hidden overflow-y-auto card-comission px-6 py-8 scroll border border-blue-950 rounded-xl our-team-left">

        <div class="bg-login-button  text-center text-white login-button-active flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                All Employee
            </p>
        </div>

        <div class="  text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Seketaris Perusahaan
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Hukum & Pengadaan
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Management Resiko
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Internal Audit
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Solusi & Sales
            </p>
        </div>

        <!-- end of line -->

        <div class="  text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Seketaris Perusahaan
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Hukum & Pengadaan
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Management Resiko
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Internal Audit
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Solusi & Sales
            </p>
        </div>

        <div class="  text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Seketaris Perusahaan
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Hukum & Pengadaan
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Management Resiko
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Internal Audit
            </p>
        </div>

        <div class=" text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Solusi & Sales
            </p>
        </div>

    </div>

    <div class="w-full order-1 lg:order-2 lg:w-4/5 max-h-[70dvh]  flex flex-col card-comission border px-6 py-8 border-blue-950 rounded-xl ">

        <label class="input input-bordered flex items-center gap-2 py-2 w-full lg:w-2/6 text-white search-bar-our-team ">
            <input type="text" class="grow" placeholder="Search" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                <path fill-rule="evenodd" d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z" clip-rule="evenodd" />
            </svg>
        </label>

        <div class="grid w-full lg:grid-cols-3 2xl:grid-cols-4 gap-4 mt-10 h-full overflow-y-auto">

            <div class="flex flex-col rounded-xl border border-blue-900 ">
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
        
        </div>



    </div>

</div>

<script>
    let toggle = document.getElementById("")
    let categoriesComp = document.querySelector("")


</script>



@endsection