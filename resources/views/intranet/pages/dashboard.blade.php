@extends('intranet.master_intranet')

@section('extracss')
@endsection

@section('extrajs')
<script src='{{ asset('js/full-calendar.js') }}'></script>
<script src='{{ asset('js/owl.carousel.js') }}'></script>
<script src="{{ asset('assets/plugins/chartjs4/dist/chart.umd.js') }}"></script>
<script src="{{ asset('assets/plugins/chartjs4/dist/chartjs-plugin-datalabels.min.js') }}"></script>

@endsection

@section('content')
<div class="flex flex-col lg:flex-row w-full px-4 lg:px-14 pt-6 mb-8">

    <!-- section kiri -->
    <div class="w-full lg:w-4/6 flex flex-col">

        <div class="grid grid-cols-2 flex-wrap w-full gap-3">

            <div class="flex  rounded-2xl bg-onboarding items-center">
                <div class=" flex flex-col w-3/6 2xl:w-4/6 px-4 py-4 text-white">
                    <h4 class="text-base lg:text-xs 2xl:text-sm font-semibold">Halo Warriors! 👋</h4>
                    <p class="text-sm lg:text-xs 2xl:text-base">Selamat Datang di Intranet ILCS</p>
                </div>
                <img src="{{ asset('assets/images/icon/orang-kerja-icon.svg') }}" class="w-3/6 2xl:w-2/6 h-full rounded-r-xl object-cover" alt="">
            </div>

            <div class="flex justify-between w-full bg-card-dashboard border border-blue-950 rounded-xl">

                <div class="flex flex-col w-3/6 2xl:w-4/6 items-center text-white">
                    <h4 class=" text-base 2xl:text-lg text-center font-semibold mt-6">See <br /> Statistic KPI</h4>
                    <a href="#kpi" class="mx-auto rounded-full mt-3 mb-16 2xl:mb-2 kpi-button bg-login-button p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 2xl:size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                        </svg>
                    </a>
                </div>
                <div class="flex-col w-3/6 2xl:w-2/6">
                    <img src="{{ asset('assets/images/icon/kpi-icon.svg') }}" class="w-full h-full ml-auto rounded-r-xl" alt="">
                </div>

            </div>

            <div class="flex w-full flex-col col-span-2 bg-card-dashboard border-blue-950 border rounded-2xl px-4 py-4 ">
                <p class="text-white font-semibold">Shortcut Back Office Access</p>
                <div class="flex justify-evenly overflow-x-auto pb-4 w-full whitespace-nowrap backoffice-style-2	 mt-4">

                    @foreach ($data['linkApps'] as $app)
                    <a href="{{ $app->link_tujuan }}" target="_blank" class="w-2/6 flex mr-6 flex-col items-center">
                        <div class="h-full w-16 py-2 px-1 bg-backoffice-icon rounded-full">
                            <img src="{{ $app->image_path }}" class="mx-auto object-cover" alt="">
                        </div>
                        <p class="text-sm text-white">{{ $app->name }}</p>
                    </a>
                    @endforeach
                    {{-- <a href="https://peo.pelindo.id/" target="_blank" class="w-2/6 flex mr-6 flex-col items-center">
                        <div class="h-full w-16 py-2 px-1 bg-backoffice-icon rounded-full">
                            <img src="{{ asset('assets/images/shortcut-icon/peo.svg') }}" class="mx-auto object-cover" alt="">
                </div>
                <p class="text-sm text-white">Peo</p>
                </a>
                <a href="https://mail.ilcs.id/" target="_blank" class="w-2/6 flex flex-col  mr-6 items-center">
                    <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                        <img src="{{ asset('assets/images/shortcut-icon/zimbra.svg') }}" class="mx-auto" alt="">
                    </div>
                    <p class="text-sm text-white">zimbra</p>
                </a>
                <a href="https://eoffice.ilcs.co.id/p2b/login" target="_blank" class="w-2/6 flex flex-col  mr-6 items-center">
                    <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                        <img src="{{ asset('assets/images/shortcut-icon/eoffice.svg') }}" class="mx-auto" alt="">
                    </div>
                    <p class="text-sm text-white">E office</p>
                </a>
                <a href="https://my.pelindo.co.id/login" target="_blank" class="w-2/6 flex flex-col  mr-6 items-center">
                    <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                        <img src="{{ asset('assets/images/shortcut-icon/pcico.svg') }}" class="mx-auto" alt="">
                    </div>
                    <p class="text-sm text-white">My Pelindo</p>
                </a>
                <a href="https://www.ilcs.co.id/" target="_blank" class="w-2/6 flex flex-col  mr-6 items-center">
                    <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                        <img src="{{ asset('assets/images/shortcut-icon/ilcs.svg') }}" class="mx-auto" alt="">
                    </div>
                    <p class="text-sm text-white">Ilcs.co.id</p>
                </a>
                <a href="https://ho-bios.pelindo.co.id/" target="_blank" class="w-2/6 flex flex-col  mr-6 items-center">
                    <div class="h-full py-2 px-1 w-16 bg-backoffice-icon rounded-full">
                        <img src="{{ asset('assets/images/shortcut-icon/ilcs.svg') }}" class="mx-auto w-full object-cover" alt="">
                    </div>
                    <p class="text-sm text-white">Bios</p>
                </a>
                <a href="https://eproc.pelindo.co.id/" target="_blank" class="w-2/6 flex flex-col  mr-6 items-center">
                    <div class="h-full py-2 px-1 bg-backoffice-icon w-16 rounded-full">
                        <img src="{{ asset('assets/images/shortcut-icon/ilcs.svg') }}" class="mx-auto w-full object-cover" alt="">
                    </div>
                    <p class="text-sm text-white">E Proc</p>
                </a> --}}
            </div>

        </div>

        </div>

        <!-- carousel -->
        <div class="flex flex-col rounded-xl mt-6 bg-card-dashboard border border-blue-950 px-6 py-6">
            <div class="flex justify-between mb-3">
                <div class="lg:w-2/6 2xl:w-1/6 text-white">
                    <p class="text-base lg:text-xl">ILCS News</p>
                </div>
                <!-- <div class="w-1/6 flex text-xl nextBtn text-white">
                                            <p class="mr-6 prevBtn cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                                </svg>
                                            </p>
                                            <p class="cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                                </svg>

                                            </p>
                                        </div> -->
            </div>

            <div class="flex flex-col h-[50vh] w-full mt-3">
                <h1 class="text-lg font-semibold mb-4 text-white">INTRANET 2.0 COMING SOON!!</h1>
                <img src="{{ asset('assets/images/dashboard/comming-soon.svg') }}" alt="" class="w-full h-fit  object-center rounded-xl">
            </div>

            <!-- <div class="owl-carousel w-full">

                                        <div id="slide1" class="carousel-item flex flex-col w-full mt-4">
                                            <h1 class="text-lg font-semibold text-white">PT ILCS dengan bangga berpartisipasi dalam program Mudik Gratis Bersama Pelindo Group 2024</h1>
                                            <div class="mt-6 w-full h-72">
                                                <img src="{{ asset('assets/images/carousel/mockup-news.svg') }}" alt="" class="w-full h-full object-cover rounded-xl">
                                            </div>
                                        </div>

                                        <div id="slide2" class="carousel-item flex flex-col w-full mt-4">
                                            <h1 class="text-lg font-semibold text-white">Slide 2</h1>
                                            <div class="mt-6 w-full h-72">
                                                <img src="{{ asset('assets/images/carousel/mockup-news.svg') }}" alt="" class="w-full h-full object-cover rounded-xl">
                                            </div>
                                        </div>

                                    </div> -->


        </div>

        <!--  farewell ultah dll -->
        <div class="flex flex-row rounded-xl gap-4  mt-6 bg-card-dashboard border border-blue-950 px-6 py-6">

            <div class="flex-col w-2/6">
                <div class="flex justify-between text-white mb-4">
                    <h5 class="font-semibold text-sm 2xl:text-base">Upcoming Birthday 🎉</h5>
                    <p class="text-sm 2xl:text-base">{{ date('F Y') }}</p>
                </div>
                <div class="w-full flex-col">
                    @foreach ($data['upcomingBirthday'] as $birth)
                    <div class="flex mb-6">
                        <h1 class="w-1/6 text-sm 2xl:text-base font-semibold text-center text-white">
                            {{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $birth->tgl_lahir)->format('d F') }}
                        </h1>
                        <div class="w-1/6 mx-6">
                            <img src="{{ asset('assets/images/dashboard/ultah/faiz.png') }}" alt="" class="rounded-full object-cover absolute border border-blue-700  w-8 h-8 ">
                        </div>
                        <div class="w-4/6 lg:text-sm">
                            <h4 class="font-semibold text-xs text-white">{{ $birth->name }}</h4>
                            <p class="text-dashboard-blue-right text-xs">{{ $birth->jabatan }} ({{ $birth->divisi }})</p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="flex-col w-2/6 border-l pl-4 ">
                <div class="w-full flex justify-between text-white mb-4">

                    <h5 class="font-semibold text-sm 2xl:text-base">Welcoming New Employee 🥳</h5>
                </div>
                <div class="w-full flex-col">
                    @foreach ($data['newEmployee'] as $emp)
                    <div class="flex mb-6">
                        <div class="w-1/6 mx-6">
                            <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="" class="rounded-full object-cover absolute border border-blue-700  w-8 h-8 ">
                        </div>
                        <div class="w-5/6 text-sm">
                            <h4 class="font-semibold text-xs text-white">{{ $emp->name }}</h4>
                            <p class="text-dashboard-blue-right text-xs">{{ $emp->jabatan }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex-col w-2/6 border-l pl-4 ">
                <div class="w-full flex justify-between text-white mb-4">
                    <h5 class="font-semibold text-sm 2xl:text-base">Farewell Employee 👋</h5>
                </div>
                <div class="w-full flex-col">
                    @foreach ($data['farewellEmployee'] as $far)
                    <div class="flex mb-6">
                        <div class="w-1/6 mx-6">
                            <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="" class="rounded-full object-cover border border-blue-700  w-8 h-8 ">
                        </div>
                        <div class="w-5/6 text-sm">
                            <h4 class="font-semibold text-xs text-white">{{ $far->name }}</h4>
                            <p class="text-dashboard-blue-right text-xs">{{ $far->jabatan }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

    <!-- section kanan -->
    <div class="w-full lg:w-2/6 flex flex-col ml-6 ">
        <div class="flex-col bg-card-dashboard border border-blue-950 px-2 py-2 rounded-xl">
            <div id='calendar' class="w-full text-white text-xs calendar-custom"></div>
        </div>
        <div class="w-full flex  bg-card-dashboard border border-blue-950 flex-col text-white mt-6  px-4 py-4 rounded-xl">
            <h5 class="font-semibold mb-6">
                ILCS Events
            </h5>
            <div class="h-[53vh] our-team-left overflow-auto">
                <div class="flex mb-6">
                    <div class="w-2/6 mx-6">
                        <img src="{{ asset('assets/images/dashboard/event/dmc.jpeg') }}" alt="" class="object-cover rounded-xl  border border-blue-700 h-16">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Launching DMDC</h4>
                        <p class="text-dashboard-blue-right text-xs">Senin, 20 Mei 2024 </p>
                    </div>
                </div>
                <div class="flex mb-6">
                    <div class="w-2/6 mx-6">
                        <img src="{{ asset('assets/images/dashboard/comming-soon.svg') }}" alt="" class="object-cover rounded-xl border border-blue-700  h-16">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Soft Go Live INTRANET 2.0 </h4>
                        <p class="text-dashboard-blue-right text-xs">Senin, 27 Mei 2024| 10.00 </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex-col bg-card-dashboard border border-blue-950 mt-6 px-4 py-4 rounded-xl">
            <div class="w-full flex justify-between text-white mb-4">
                <h5 class="font-semibold ">Social Media ILCS</h5>
            </div>
            <div class="w-full flex">
                @foreach ($data['linkSosmed'] as $sos)
                <a href="{{ $sos->link_tujuan }}" target="_blank" class="w-2/12">
                    <img src="{{ $sos->image_path }}" alt="" class="w-3/6">
                </a>
                @endforeach
                {{-- <a href="https://x.com/ilcs_id" target="_blank" class="w-2/12">
                        <img src="{{ asset('assets/images/icon/twitter-dashboard.svg') }}" alt="" class="w-3/6">
                </a>
                <a href="https://www.youtube.com/@pelindosolusidigital" target="_blank" class="w-2/12">
                    <img src="{{ asset('assets/images/icon/youtube-dashboard.svg') }}" alt="" class="w-3/6">
                </a>
                <a href="#" target="_blank" class="w-2/12">
                    <img src="{{ asset('assets/images/icon/linkedin-dashboard.svg') }}" alt="" class="w-3/6">
                </a> --}}
            </div>
        </div>

    </div>
</div>

<!-- Chart -->
<div class="flex flex-col w-full pb-6 px-4 lg:px-14 " id="kpi" style="zoom: 100%">
    <div class="w-full flex flex-col bg-card-dashboard px-4 py-6 border border-blue-950 mt-8 rounded-xl">
        <h2 class="2xl:text-lg text-white font-semibold">Kinerja Keuangan: Pendapatan & Beban Usaha s.d TW I</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 mt-4">
            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold 2xl:text-lg">Pendapatan Usaha</h4>
                <div class=" container-chart w-full mt-8">
                    <canvas id="barChart"></canvas>
                </div>

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class="bg-green-600 mb-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold text-xs lg:text-sm 2xl:text-base">Pendapatan RP. 134,78 M, tercapai 61,27% RKAP; Growth 17,03% YoY</h4>
                </div>

            </div>

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold 2xl:text-lg">Beban Usaha & OR</h4>
                <div class="container-chart w-full mt-8">
                    <canvas id="barChart2" class="pt-4"></canvas>
                </div>

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class="bg-green-600 mb-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold  text-sm 2xl:text-base">Beban Usaha Rp. 127,49 M, tercapai 67,67% RKAP; Growth 12,16% YoY</h4>
                </div>

            </div>
        </div>
    </div>

    <div class="w-full flex flex-col bg-card-dashboard px-4 py-6 border border-blue-950 mt-8 rounded-xl">
        <h2 class="2xl:text-lg text-white font-semibold">Kinerja Keuangan: Pendapatan per Portofolio TW I</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 mt-4">

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold 2xl:text-lg">ICT System Implementor</h4>
                <div class="container-chart w-full mt-8">
                    <canvas id="barChart3"></canvas>
                </div>

                <!-- <div class="grid 2xl:grid-cols-2 gap-7">
                    <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                        <div class="bg-red-600 mb-5 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181" />
                            </svg>

                        </div>
                        <h4 class="font-semibold 2xl:text-base text-sm">97,28 %</h4>
                        <h4 class="font-semibold 2xl:text-base text-sm">Real 2023 vs RKAP 2023</h4>
                    </div>
                    <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                        <div class="bg-green-600 mb-5 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                        </div>
                        <h4 class="font-semibold 2xl:text-base text-sm">212,84 %</h4>
                        <h4 class="font-semibold 2xl:text-base text-sm">Real 2023 vs Real 2022</h4>
                    </div>
                </div> -->


                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class="bg-green-600 mb-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold  text-sm 2xl:text-base">ICT System Implementor Rp. 81,90 M, tercapai 96,15% RKAP; Growth 48,20% YoY</h4>
                </div>


            </div>

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold 2xl:text-lg">IT Manage Service</h4>
                <div class=" container-chart w-full mt-8">
                    <canvas id="barChart4"></canvas>
                </div>

                <!-- <div class="grid 2xl:grid-cols-2 gap-7">
                    <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                        <div class="bg-green-600 mb-5 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                        </div>
                        <h4 class="font-semibold text-sm 2xl:text-base">136,79 %</h4>
                        <h4 class="font-semibold text-sm 2xl:text-base">Real 2023 vs RKAP 2023</h4>
                    </div>
                    <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                        <div class="bg-green-600 mb-5 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                        </div>
                        <h4 class="font-semibold 2xl:text-base text-sm ">242,01 %</h4>
                        <h4 class="font-semibold 2xl:text-base text-sm">Real 2023 vs Real 2022</h4>
                    </div>
                </div> -->

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class="bg-green-600 mb-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold  text-sm 2xl:text-base">IT Manage Service Rp. 39,12 M, tercapai 35,42% RKAP; Growth 28,73% YoY</h4>
                </div>


            </div>

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold  2xl:text-lg">Digital Seaport</h4>
                <div class="w-full mt-8 container-chart">
                    <canvas id="barChart5"></canvas>
                </div>

                <!-- <div class="grid 2xl:grid-cols-2 gap-7">
                    <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                        <div class="bg-green-600 mb-5 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                        </div>
                        <h4 class="font-semibold 2xl:text-base text-sm">97,28 %</h4>
                        <h4 class="font-semibold 2xl:text-base text-sm">Real 2023 vs RKAP 2023</h4>
                    </div>
                    <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                        <div class="bg-green-600 mb-5 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                        </div>
                        <h4 class="font-semibold 2xl:text-base text-sm">212,84 %</h4>
                        <h4 class="font-semibold 2xl:text-base text-sm">Real 2023 vs Real 2022</h4>
                    </div>
                </div> -->

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class=" bg-green-600 mb-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold  text-sm 2xl:text-base">Digital Seaport Rp. 13,77 M, tercapai 56,54% RKAP; Growth 173,94% YoY</h4>
                </div>


            </div>

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">

                <div class="container-chart w-full mt-8">
                    <canvas id="barChart6" class="w-4/6 mx-auto"></canvas>
                </div>


            </div>

        </div>
    </div>
</div>

<button class="bg-login-button px-6 py-2 mx-auto text-white rounded-xl mb-12" onclick="toTop()">Back to top</button>

<script>
    // owlCarousel
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            animation: true,
            nav: false,
            items: 1,
        });

        // Custom Button
        $('.nextBtn').click(function() {
            owl.trigger('next.owl.carousel');
        });
        $('.prevBtn').click(function() {
            owl.trigger('prev.owl.carousel');
        });

    });

    // calender
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'title',
                center: '',
                right: 'prev,today,next',
            },
            initialDate: new Date(),
            navLinks: false, // can click day/week names to navigate views
            editable: true,
            displayEventTime: false,
            eventBackgroundColor: "red",
            selectable: true,
            eventMouseEnter: function(info) {
                let tooltip = document.createElement('div');
                tooltip.className = 'absolute z-30 bg-black text-white text-sm px-2 py-1 rounded';
                tooltip.style.left = (info.jsEvent.pageX + 10) + 'px';
                tooltip.style.top = (info.jsEvent.pageY + 10) + 'px';
                tooltip.innerHTML = `
                <div class="flex items-center space-x-2">
                    <span class="bg-red-500 text-white rounded-full px-2">${info.event.start.toLocaleDateString('id-ID', { day: 'numeric' })}</span>
                    <span>${info.event.start.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' })}</span>
                </div>
                <div class="mt-2">${ info.event._def.extendedProps.desc}</div>
            `;

                document.body.appendChild(tooltip);
                info.el.setAttribute('data-tooltip-id', tooltip);

                info.el.addEventListener('mouseleave', () => {
                    tooltip.remove();
                });
            },
            events: [{
                    title: '',
                    desc: "Idul Adha",
                    start: '2024-06-16T13:00:00',
                },
                // {
                //     title: 'Meeting',
                //     start: '2023-01-13T11:00:00',
                //     constraint: 'availableForMeeting', // defined below
                //     color: '#257e4a'
                // },
                // {
                //     title: 'Conference',
                //     start: '2023-01-18',
                //     end: '2023-01-20'
                // },
                // {
                //     title: 'Party',
                //     start: '2023-01-29T20:00:00'
                // },

                // // areas where "Meeting" must be dropped
                // {
                //     groupId: 'availableForMeeting',
                //     start: '2023-01-11T10:00:00',
                //     end: '2023-01-11T16:00:00',
                //     display: 'background'
                // },
                // {
                //     groupId: 'availableForMeeting',
                //     start: '2023-01-13T10:00:00',
                //     end: '2023-01-13T16:00:00',
                //     display: 'background'
                // },

                // // red areas where no events can be dropped
                // {
                //     start: '2023-01-24',
                //     end: '2023-01-28',
                //     overlap: false,
                //     display: 'background',
                //     color: '#ff9f89'
                // },
                // {
                //     start: '2023-01-06',
                //     end: '2023-01-08',
                //     overlap: false,
                //     display: 'background',
                //     color: '#ff9f89'
                // }
            ],

        });

        calendar.render();
    });

    // utils
    function toTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    // chart

    var ctx = document.getElementById('barChart').getContext('2d');

    const dataDumn = [
        ['RKAP 2024', 'RKAP s.d April 2024', 'Real s.d April 2024', 'Real s.d April 2023'],
        [620.43, 219.97, 134.78, 115.17],
    ]

    var myChart = new Chart(ctx, {
        type: 'bar',
        color: "#FFF",
        data: {
            datalabels: {
                align: 'end',
                anchor: 'end',
            },
            labels: dataDumn[0],
            datasets: [{
                label: 'Data',
                data: dataDumn[1],
                backgroundColor: [
                    '#466AFF',
                    '#F6C01D',
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderColor: [
                    '#466AFF',
                    '#F6C01D',
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderWidth: 1,

            }]
        },
        options: {
            maintainAspectRatio: window.screen.availWidth >= 1024 ? true : false,
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                },
                x: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda
                },
                title: {
                    display: true,
                    text: '(Miliar)',
                    align: "start",
                    color: "#FFF"
                },
                datalabels: {
                    color: '#FFF',
                    anchor: "center",
                    offset: 9,
                    align: "end",
                },
            },
        },
        plugins: [ChartDataLabels],
    });

    //  chart2

    var ctx2 = document.getElementById('barChart2').getContext('2d');

    const dataDumn2 = [
        ['RKAP 2024', 'RKAP s.d April 2024', 'Real s.d April 2024', 'Real s.d April 2023'],
        [533.14, 188.59, 127.49, 133.67],
        [85.9, 85.6, 94.6, 98.7],
    ]

    var myChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: dataDumn2[0],
            datasets: [{
                    label: 'Data',
                    data: dataDumn2[1],
                    backgroundColor: [
                        '#466AFF',
                        '#F6C01D',
                        '#F88B2E',
                        '#C6C6C6',
                    ],
                    borderColor: [
                        '#466AFF',
                        '#F6C01D',
                        '#F88B2E',
                        '#C6C6C6',
                    ],
                    borderWidth: 1,
                    datalabels: {
                        anchor: "center",
                    }
                },
                {
                    type: "line", // Specify the type as line for the line chart
                    label: "Percentage",
                    data: dataDumn2[2],
                    borderColor: "rgba(255, 99, 132, 1)",
                    backgroundColor: "#FFF",
                    borderWidth: 1,
                    zIndex: 2,
                    fill: false,
                    yAxisID: "y1", // Link this dataset to the right y-axis
                    datalabels: {
                        display: true // Disable datalabels for the line chart
                    },
                },
            ]
        },
        plugins: [ChartDataLabels],
        options: {
            maintainAspectRatio: window.screen.availWidth >= 1024 ? true : false,
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                },
                x: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                },
                y1: {
                    beginAtZero: false,
                    type: "linear",
                    position: "right",
                    title: {
                        color: "#FFF",
                        display: true,
                        text: "Persen",
                    },
                    datalabels: {
                        color: "#FFF"
                    },
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        drawOnChartArea: false,
                    },
                },
            },
            plugins: {
                legend: {
                    display: false,

                },
                datalabels: {
                    color: '#FFF',
                    anchor: "end",
                    align: "end",
                    offset: 4,
                    display: true
                },
                title: {
                    display: true,
                    text: '(Miliar)',
                    align: "start",
                    color: "#FFF"
                }
            },
        },
    });

    // chart IT SYSTEM IMPLEMENTOR

    var ctx = document.getElementById('barChart3').getContext('2d');

    const dataDumn3 = [
        ['RKAP 2024', 'RKAP s.d April 2024', 'Real s.d April 2024', 'Real s.d April 2023'],
        [254.996, 85.176, 81.896, 55.262],
    ]

    var myChart = new Chart(ctx, {
        type: 'bar',
        color: "#FFF",
        data: {
            datalabels: {
                align: 'end',
                anchor: 'end',
            },
            labels: dataDumn3[0],
            datasets: [{
                label: 'Data',
                data: dataDumn3[1],
                backgroundColor: [
                    '#466AFF',
                    '#F6C01D',
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderColor: [
                    '#466AFF',
                    '#F6C01D',
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderWidth: 1,

            }]
        },
        options: {
            maintainAspectRatio: window.screen.availWidth >= 1024 ? true : false,
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                },
                x: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda
                },
                title: {
                    display: true,
                    text: '(Miliar)',
                    align: "start",
                    color: "#FFF"
                },
                datalabels: {
                    color: '#FFF',
                    anchor: "center",
                    offset: 9,
                    align: "end",
                    formatter: function(value, context) {
                        return value.toFixed(3);
                    }
                },
            },
        },
        plugins: [ChartDataLabels],
    });

    // IT Manage service

    var ctx = document.getElementById('barChart4').getContext('2d');

    const dataDumn4 = [
        ['RKAP 2024', 'RKAP s.d Mar 2024', 'Real s.d Mar 2024', 'Real s.d Mar 2023'],
        [283.529, 110.447, 39.117, 54.882],
    ]

    var myChart = new Chart(ctx, {
        type: 'bar',
        color: "#FFF",
        data: {
            datalabels: {
                align: 'end',
                anchor: 'end',
            },
            labels: dataDumn4[0],
            datasets: [{
                label: 'Data',
                data: dataDumn4[1],
                backgroundColor: [
                    '#466AFF',
                    '#F6C01D',
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderColor: [
                    '#466AFF',
                    '#F6C01D',
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderWidth: 1,

            }]
        },
        options: {
            maintainAspectRatio: window.screen.availWidth >= 1024 ? true : false,
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                },
                x: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda
                },
                title: {
                    display: true,
                    text: '(Miliar)',
                    align: "start",
                    color: "#FFF"
                },
                datalabels: {
                    color: '#FFF',
                    anchor: "center",
                    offset: 9,
                    align: "end",
                    formatter: function(value, context) {
                        return value.toFixed(3);
                    }
                },
            },
        },
        plugins: [ChartDataLabels],
    });

    // Digital Seaport

    var ctx = document.getElementById('barChart5').getContext('2d');

    const dataDumn5 = [
        ['RKAP 2024', 'RKAP s.d Mar 2024', 'Real s.d Mar 2024', 'Real s.d Mar 2023'],
        [81.904, 24.3500, 13.768, 5.026],
    ]

    var myChart = new Chart(ctx, {
        type: 'bar',
        color: "#FFF",
        data: {
            datalabels: {
                align: 'end',
                anchor: 'end',
            },
            labels: dataDumn5[0],
            datasets: [{
                label: 'Data',
                data: dataDumn5[1],
                backgroundColor: [
                    '#466AFF',
                    '#F6C01D',
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderColor: [
                    '#466AFF',
                    '#F6C01D',
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderWidth: 1,

            }]
        },
        options: {
            maintainAspectRatio: window.screen.availWidth >= 1024 ? true : false,
            responsive: true,
            scales: {
                y: {
                    ticks: {
                        color: 'white',
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                },
                x: {
                    ticks: {
                        color: 'white'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda
                },
                title: {
                    display: true,
                    text: '(Miliar)',
                    align: "start",
                    color: "#FFF"
                },
                datalabels: {
                    color: '#FFF',
                    anchor: "center",
                    offset: 9,
                    align: "end",
                    formatter: function(value, context) {
                        return value.toFixed(3);
                    }
                },
            },
        },
        plugins: [ChartDataLabels],
    });

    // chart bulet

    var ctx = document.getElementById('barChart6').getContext('2d');

    const dataDumn6 = [
        ['IT Manage Service ', 'Digital Seaport', 'ICT Implementor '],
        [29, 10, 61],
    ]

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        color: "#FFF",
        data: {
            labels: dataDumn6[0],
            datasets: [{
                label: 'Persen',
                data: dataDumn6[1],
                datalabels: {
                    formatter: function(value, context) {
                        return context.chart.data.labels[context.dataIndex];
                    }
                },
                backgroundColor: [
                    '#466AFF',
                    "    #707070",
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderColor: [
                    '#466AFF',
                    "    #707070",
                    '#F88B2E',
                    '#C6C6C6',
                ],
                borderWidth: 1,

            }]
        },
        options: {
            maintainAspectRatio: window.screen.availWidth >= 1024 ? true : false,
            responsive: true,
            scales: {
                y: {
                    display: false
                },
                x: {
                    display: false
                }
            },
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda
                },

                datalabels: {
                    color: '#FFF',
                    anchor: "center",
                    align: "center",
                },
            },
        },
        plugins: [ChartDataLabels],
    });
</script>

@endsection