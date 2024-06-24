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

        <div class="grid grid-cols-1 lg:grid-cols-2 flex-wrap w-full gap-6">

            <div class="flex  rounded-2xl bg-onboarding items-center">
                <div class=" flex flex-col w-3/6 2xl:w-4/6 px-4 py-4 text-white">
                    <h4 class="text-base lg:text-xs 2xl:text-sm font-semibold">Halo Warriors! 👋</h4>
                    <p class="text-sm lg:text-xs 2xl:text-base">Selamat Datang di Intranet ILCS</p>
                </div>
                <img src="{{ asset('assets/images/icon/orang-kerja-icon.svg') }}" class="w-3/6 2xl:w-2/6 h-full rounded-r-xl object-cover" alt="">
            </div>

            <div class="flex justify-between w-full bg-card-dashboard border border-blue-950 rounded-xl">

                <div class="flex flex-col w-3/6 2xl:w-4/6 items-center text-white">
                    <h4 class="text-sm lg:text-base 2xl:text-lg text-center font-semibold mt-2 lg:mt-6">See <br /> Statistic KPI</h4>
                    <a href="#kpi" class="mx-auto rounded-full mt-3 mb-3 xl:mb-16 2xl:mb-2 kpi-button bg-login-button p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 2xl:size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                        </svg>
                    </a>
                </div>
                <div class="flex-col w-2/6 xl:w-3/6 2xl:w-2/6">
                    <img src="{{ asset('assets/images/icon/kpi-icon.svg') }}" class="w-full h-full ml-auto rounded-r-xl" alt="">
                </div>

            </div>

            <div class="flex w-full flex-col lg:col-span-2 bg-card-dashboard border-blue-950 border rounded-2xl px-4 py-4 ">
                <p class="text-white font-semibold">Shortcut Back Office Access</p>
                <div class="flex justify-evenly overflow-x-auto pb-4 w-full whitespace-nowrap backoffice-style-2	 mt-4">

                    @foreach ($data['linkApps'] as $app)
                    <a href="{{ $app->link_tujuan }}" target="_blank" class="w-2/6 flex mr-6 flex-col items-center">
                        <div class="h-full w-16 py-2 px-1 object-cover bg-backoffice-icon rounded-full">
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
        </div>

        <div class="owl-carousel owl-theme ">

            @foreach ($data['news'] as $nws)
                <div id="slide1" class="carousel-item flex flex-col w-full mt-4"  onclick="showModal({{$nws->id}})">
                    <h1 class="text-lg font-semibold text-white">{{ $nws->judul }}</h1>
                    {{-- {!! limit_html_content($nws->content, 100) !!} --}}
                    <div class="mt-6 w-full h-[8rem] lg:h-[16rem] xl:h-[23rem]">
                        <img src="{{ url('storage/news/'.$nws->image_cover) }}" alt="" class="w-full h-full object-cover rounded-xl">
                    </div>
                </div>
            @endforeach

{{--
            <div id="slide2" class="carousel-item flex flex-col w-full mt-4"  onclick="my_modal_2.showModal()">
                <h1 class="text-lg font-semibold text-white">INTRANET 2.0 COMING SOON!!</h1>
                <p class="text-white my-2 text-xs">ILCS Event adalah reminder/pengingat acara internal perusahaan yang diselenggarakan untuk merayakan pencapaian bersama.</p>
                <div class="mt-6 w-full h-[8rem] lg:h-[16rem] xl:h-[23rem]">
                    <img src="{{ asset('assets/images/dashboard/comming-soon.svg') }}" alt="" class="w-full h-full object-cover rounded-xl">
                </div>
            </div> --}}

            <!-- <div id="slide2" class="carousel-item flex flex-col w-full mt-4">
                <h1 class="text-lg font-semibold text-white">INTRANET 2.0 COMING SOON!!</h1>
                <p class="text-white my-2 text-xs">ILCS Event adalah reminder/pengingat acara internal perusahaan yang diselenggarakan untuk merayakan pencapaian bersama.</p>
                <div class="mt-6 w-full h-[8rem] lg:h-[16rem]  xl:h-[25rem]">
                    <img src="{{ asset('assets/images/dashboard/comming-soon.svg') }}" alt="" class="w-full h-full object-cover rounded-xl">
                </div>
            </div> -->

        </div>

    </div>

    <!--  farewell ultah dll -->
    <div class="flex flex-col lg:flex-row rounded-xl gap-4  mt-6 bg-card-dashboard border border-blue-950 px-6 py-6">

        <div class="flex-col w-full lg:w-2/6 h-28 lg:h-[13rem] ">
            <div class="flex justify-between text-white mb-4">
                <h5 class="font-semibold text-sm 2xl:text-base">Upcoming Birthday 🎉</h5>
                <p class="text-sm 2xl:text-base">{{ date('F Y') }}</p>
            </div>
            <div class="w-full flex-col h-[21vh] lg:h-36 overflow-y-auto our-team-left">
                @foreach ($data['upcomingBirthday'] as $birth)
                <div class="flex mb-6 relative">
                    <h1 class="w-1/6 text-sm font-semibold text-center text-white">
                        {{ Illuminate\Support\Carbon::createFromFormat('Y-m-d', $birth->tgl_lahir)->format('d F') }}
                    </h1>
                    <div class="w-1/6 mx-6">
                        <img src="{{ $birth->image_user }}" alt="" onerror="this.src='{{ asset('assets/images/default-profile.svg') }}'" class="rounded-full object-cover absolute border border-blue-700  w-8 h-8 ">
                    </div>
                    <div class="w-4/6 lg:text-sm">
                        <h4 class="font-semibold text-xs text-white">{{ $birth->name }}</h4>
                        <p class="text-dashboard-blue-right text-xs">{{ $birth->jabatan }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex-col z-10 lg:z-0 mt-32 lg:mt-0 lg:h-[13rem] w-full lg:w-2/6 lg:border-l lg:pl-4">
            <div class="w-full flex justify-between text-white mb-4">

                <h5 class="font-semibold text-sm 2xl:text-base">Welcoming New Employee 🥳</h5>
            </div>
            <div class="w-full flex-col  h-[21vh] lg:h-36 overflow-y-auto our-team-left">
                @foreach ($data['newEmployee'] as $emp)
                <div class="flex mb-6 relative">
                <div class="w-1/6 block lg:hidden"></div>
                <div class="w-1/6 mx-6">
                        <img src="{{ $emp->image_user }}" alt="" onerror="this.src='{{ asset('assets/images/default-profile.svg') }}'" class="rounded-full object-cover absolute border border-blue-700  w-8 h-8 ">
                    </div>
                    <div class="w-5/6 text-sm">
                        <h4 class="font-semibold text-xs text-white">{{ $emp->name }}</h4>
                        <p class="text-dashboard-blue-right text-xs">{{ $emp->jabatan }}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <div class="flex-col h-[21vh] lg:h-[13rem] w-full lg:w-2/6 lg:border-l lg:pl-4 z-20 lg:z-0 lg:mt-0">
            <div class="w-full flex justify-between text-white mb-4">
                <h5 class="font-semibold text-sm 2xl:text-base">Farewell Employee 👋</h5>
            </div>
            <div class="w-full flex-col h-36 overflow-y-auto our-team-left">
                @foreach ($data['farewellEmployee'] as $far)
                <div class="flex mb-6 relative ">
                <div class="w-1/6 block lg:hidden"></div>
                    <div class="w-1/6 mx-6 ">
                        <img src="{{ $far->image_user }}" alt="" onerror="this.src='{{ asset('assets/images/default-profile.svg') }}'" class="rounded-full absolute object-cover border border-blue-700  w-8 h-8 ">
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
    <div class="w-full lg:w-2/6 flex flex-col lg:ml-6 mt-6 lg:mt-0 ">
        <div class="flex-col bg-card-dashboard border border-blue-950 px-2 py-2 rounded-xl">
            <div id='calendar' class="w-full text-white text-xs calendar-custom px-4"></div>
        </div>
        <div class="w-full flex  bg-card-dashboard border border-blue-950 flex-col text-white mt-6  px-4 py-4 rounded-xl">
            <h5 class="font-semibold mb-6">
                ILCS Events
            </h5>
            <div class="h-[48vh] our-team-left overflow-auto">
                @foreach ($data['calendar'] as $item)
                    @if ($item->color == 'blue')
                        <div class="flex mb-6">
                            <div class="w-2/6 mx-6">
                                <img src="{{ url('storage/calendar_event/'.$item->image_cover) }}" alt="" class="object-cover rounded-xl  border border-blue-700 w-32 h-20 relative">
                            </div>
                            <div class="w-4/6 text-sm">
                                <h4 class="font-semibold text-white">{{ $item->title }}</h4>
                                <p class="text-dashboard-blue-right text-xs">{{ $item->start }} </p>
                            </div>
                        </div>

                    @endif

                @endforeach
                {{-- <div class="flex mb-6">
                    <div class="w-2/6 mx-6">
                        <img src="{{ asset('assets/images/dashboard/event/dmc.jpeg') }}" alt="" class="object-cover rounded-xl  border border-blue-700 w-32 h-20 relative">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Launching DMDC</h4>
                        <p class="text-dashboard-blue-right text-xs">Senin, 20 Mei 2024 </p>
                    </div>
                </div> --}}
                {{-- <div class="flex mb-6">
                    <div class="w-2/6 mx-6">
                        <img src="{{ asset('assets/images/dashboard/comming-soon.svg') }}" alt="" class="object-cover rounded-xl border border-blue-700  w-32 h-20 relative">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Soft Go Live INTRANET 2.0 </h4>
                        <p class="text-dashboard-blue-right text-xs">Senin, 27 Mei 2024| 10.00 </p>
                    </div>
                </div>
                <div class="flex mb-6">
                    <div class="w-2/6 mx-6">
                        <img src="{{ asset('assets/images/dashboard/comming-soon.svg') }}" alt="" class="object-cover rounded-xl border border-blue-700  w-32 h-20 relative">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Soft Go Live INTRANET 2.0 </h4>
                        <p class="text-dashboard-blue-right text-xs">Senin, 27 Mei 2024| 10.00 </p>
                    </div>
                </div> --}}
            </div>

            <div class="border border-blue-600 px-4 py-3 rounded-lg mt-12">
                <h5 class="font-semibold mb-6">Maklumat</h5>
                <p class="text-xs">
                ILCS Event adalah reminder/pengingat acara internal perusahaan yang diselenggarakan untuk merayakan pencapaian bersama.
                </p>
            </div>

        </div>

        <div class="flex-col bg-card-dashboard border border-blue-950 mt-6 px-4 py-4 rounded-xl">
            <div class="w-full flex justify-between text-white mb-4">
                <h5 class="font-semibold ">Social Media ILCS</h5>
            </div>
            <div class="w-full flex">
                @foreach ($data['linkSosmed'] as $sos)
                <a href="{{ $sos->link_tujuan }}" target="_blank" class="w-2/12">
                    <img src="{{ $sos->image_path }}" alt="" class="w-3/6 rounded-full">
                </a>
                @endforeach

            </div>
        </div>

    </div>
</div>

<!-- Chart -->
<div class="flex flex-col w-full pb-6 px-4 lg:px-14 " id="kpi" style="zoom: 100%">
    <div class="w-full flex flex-col bg-card-dashboard px-4 py-6 border border-blue-950 mt-8 rounded-xl">
        <h2 class="2xl:text-lg text-white font-semibold">Kinerja Keuangan: Pendapatan & Beban Usaha s.d {{ date('F') }}</h2>
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
                    {{-- <h4 class="font-semibold text-xs lg:text-sm 2xl:text-base">Pendapatan RP. 134,78 M, tercapai 61,27% RKAP; Growth 17,03% YoY</h4> --}}
                    <h4 class="font-semibold text-xs lg:text-sm 2xl:text-base">@if (isset($data['pendapatanChart']['words'])) {{ $data['pendapatanChart']['words'] }} @endif</h4>
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
                    <h4 class="font-semibold  text-sm 2xl:text-base">@if (isset($data['bebanChart']['words'])) {{ $data['bebanChart']['words'] }} @endif</h4>
                </div>

            </div>
        </div>
    </div>

    <div class="w-full flex flex-col bg-card-dashboard px-4 py-6 border border-blue-950 mt-8 rounded-xl">
        <h2 class="2xl:text-lg text-white font-semibold">Kinerja Keuangan: Pendapatan per Portofolio {{ date('F') }}</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 mt-4">

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold 2xl:text-lg">ICT System Implementor</h4>
                <div class="container-chart w-full mt-8">
                    <canvas id="barChart3"></canvas>
                </div>

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class="bg-green-600 mb-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold  text-sm 2xl:text-base">@if (isset($data['ictChart']['words'])) {{ $data['ictChart']['words'] }} @endif</h4>
                </div>


            </div>

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold 2xl:text-lg">IT Manage Service</h4>
                <div class=" container-chart w-full mt-8">
                    <canvas id="barChart4"></canvas>
                </div>

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class="bg-green-600 mb-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold  text-sm 2xl:text-base">@if (isset($data['itChart']['words'])) {{ $data['itChart']['words'] }} @endif</h4>
                </div>


            </div>

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold  2xl:text-lg">Digital Seaport</h4>
                <div class="w-full mt-8 container-chart">
                    <canvas id="barChart5"></canvas>
                </div>

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class=" bg-green-600 mb-5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold  text-sm 2xl:text-base">@if (isset($data['digitalChart']['words'])) {{ $data['digitalChart']['words'] }} @endif</h4>
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


@include('components.modal_news')

<script>

    function showModal(idNews) {
        axios.get("{{ url('news-detail') }}/"+idNews).then(resp => {
            resp = resp.data;
            $('#judul_news').html(resp.judul);
            $('#created_at').html(formatDate(resp.created_at));
            $('#poster').html(resp.poster.name);
            $('#news_image_cover').attr('src', "{{ url('storage/news')}}/"+resp.image_cover);
            $('#content_body').html(resp.content);
            $('#modal_news').addClass('modal-open');
        });
    }

    function closeModal() {
        $('#modal_news').removeClass('modal-open');
    }

    function formatDate(dateStr){
        // const dateStr = "2024-06-11T14:01:41.000000Z";

        const date = new Date(dateStr);
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = new Intl.DateTimeFormat('en-GB', options).format(date);

        return formattedDate;
    }

    // owlCarousel
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop: true,
            margin: 10,
            animation: true,
            nav: false,
            items: 1,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: false
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
        const calendars = @json($data['calendar']);
        console.log(calendars)
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
                tooltip.className = 'absolute z-30 bg-black text-white text-sm px-2 py-1 rounded-xl';
                tooltip.style.left = (info.jsEvent.pageX + 10) + 'px';
                tooltip.style.top = (info.jsEvent.pageY + 10) + 'px';
                tooltip.innerHTML = `
                <div class="flex items-center space-x-2">
                    <span class="bg-red-500 text-white rounded-full px-2 text-xs">${info.event.start.toLocaleDateString('id-ID', { day: 'numeric' })}</span>
                    <span class="text-xs">${info.event.start.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' })}</span>
                </div>
                <div class="mt-2 text-xs">${ info.event._def.extendedProps.desc}</div>
            `;

                document.body.appendChild(tooltip);
                info.el.setAttribute('data-tooltip-id', tooltip);

                info.el.addEventListener('mouseleave', () => {
                    tooltip.remove();
                });
            },
            // events: [{
            //         title: '',
            //         desc: "Idul Adha",
            //         start: '2024-06-16T13:00:00',
            //     },
            // ],
            events: calendars.filter(event => event.color != 'grey')

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

    // const dataDumn = [
    //     ['RKAP 2024', 'RKAP s.d April 2024', 'Real s.d April 2024', 'Real s.d April 2023'],
    //     [620.43, 219.97, 134.78, 115.17],
    // ]
    @if (isset($data['pendapatanChart']['data']))
        const dataDumn = @json($data['pendapatanChart']['data']);
    @else
        const dataDumn = [[],[]];
    @endif

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

    @if (isset($data['bebanChart']['data']))
        const dataDumn2 = @json($data['bebanChart']['data']);
        dataDumn2[2] = [85.9, 85.6, 94.6, 98.7];
    @else
        const dataDumn2 = [[],[]];
    @endif
    // const dataDumn2 = [
    //     ['RKAP 2024', 'RKAP s.d April 2024', 'Real s.d April 2024', 'Real s.d April 2023'],
    //     [533.14, 188.59, 127.49, 133.67],
    //     [85.9, 85.6, 94.6, 98.7],
    // ]

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

    // const dataDumn3 = [
    //     ['RKAP 2024', 'RKAP s.d April 2024', 'Real s.d April 2024', 'Real s.d April 2023'],
    //     [254.996, 85.176, 81.896, 55.262],
    // ]
    @if (isset($data['ictChart']['data']))
        const dataDumn3 = @json($data['ictChart']['data']);
    @else
        const dataDumn3 = [[],[]];
    @endif

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

    // const dataDumn4 = [
    //     ['RKAP 2024', 'RKAP s.d Mar 2024', 'Real s.d Mar 2024', 'Real s.d Mar 2023'],
    //     [283.529, 110.447, 39.117, 54.882],
    // ]
    @if (isset($data['itChart']['data']))
        const dataDumn4 = @json($data['itChart']['data']);
    @else
        const dataDumn4 = [[],[]];
    @endif

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

    @if (isset($data['digitalChart']['data']))
        const dataDumn5 = @json($data['digitalChart']['data']);
    @else
        const dataDumn5 = [[],[]];
    @endif

    // const dataDumn5 = [
    //     ['RKAP 2024', 'RKAP s.d Mar 2024', 'Real s.d Mar 2024', 'Real s.d Mar 2023'],
    //     [81.904, 24.3500, 13.768, 5.026],
    // ]

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

    @if (isset($data['totalChart']))
        const dataDumn6 = @json($data['totalChart']);
    @else
        const dataDumn6 = [[],[]];
    @endif
    // const dataDumn6 = [
    //     ['IT Manage Service ', 'Digital Seaport', 'ICT Implementor '],
    //     [29, 10, 61],
    // ]

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
