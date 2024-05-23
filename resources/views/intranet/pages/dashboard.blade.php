@extends('intranet.master_intranet')

@section('extracss')
@endsection

@section('extrajs')
<script src='{{ asset('js/full-calendar.js') }}'></script>
<script src='{{ asset('js/owl.carousel.js') }}'></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

@endsection

@section('content')
<div class="flex w-full px-14 pt-6">

    <!-- section kiri -->
    <div class="w-4/6 flex flex-col">

        <div class="flex w-full">

            <div class="flex w-6/12 rounded-2xl bg-onboarding items-center mr-8 ">
                <div class=" flex flex-col w-3/6 2xl:w-4/6 px-4 text-white">
                    <h4 class=" text-xs 2xl:text-sm font-semibold">Halo Warriors! 👋</h4>
                    <p class="text-xs 2xl:text-base">Selamat Datang di Intranet ILCS</p>
                </div>
                <img src="{{ asset('assets/images/icon/orang-kerja-icon.svg') }}" class="w-3/6 2xl:w-2/6 h-full rounded-r-xl object-cover" alt="">
            </div>

            <div class="flex flex-col w-6/12 bg-card-dashboard border-blue-950 border rounded-2xl px-4 py-4">
                <p class="text-white font-semibold">Shortcut Back Office Access</p>
                <div class="flex justify-evenly overflow-x-auto w-full whitespace-nowrap	 mt-4">

                    <a href="#" class="w-2/6 flex mr-6 flex-col items-center">
                        <div class="h-full py-2 px-1 bg-backoffice-icon rounded-full">
                            <img src="{{ asset('assets/images/shortcut-icon/peo.svg') }}" class="mx-auto 2xl:w-full object-cover" alt="">
                        </div>
                        <p class="text-sm text-white">Peo</p>
                    </a>
                    <a href="#" class="w-2/6 flex flex-col  mr-6 items-center">
                        <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                            <img src="{{ asset('assets/images/shortcut-icon/zimbra.svg') }}" class="mx-auto" alt="">
                        </div>
                        <p class="text-sm text-white">zimbra</p>
                    </a>
                    <a href="#" class="w-2/6 flex flex-col  mr-6 items-center">
                        <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                            <img src="{{ asset('assets/images/shortcut-icon/eoffice.svg') }}" class="mx-auto" alt="">
                        </div>
                        <p class="text-sm text-white">E office</p>
                    </a>
                    <a href="#" class="w-2/6 flex flex-col  mr-6 items-center">
                        <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                            <img src="{{ asset('assets/images/shortcut-icon/pcico.svg') }}" class="mx-auto" alt="">
                        </div>
                        <p class="text-sm text-white">PCICO</p>
                    </a>
                    <a href="#" class="w-2/6 flex flex-col  mr-6 items-center">
                        <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                            <img src="{{ asset('assets/images/shortcut-icon/ilcs.svg') }}" class="mx-auto" alt="">
                        </div>
                        <p class="text-sm text-white">Ilcs.co.id</p>
                    </a>
                </div>
            </div>

        </div>

        <!-- carousel -->
        <div class="flex flex-col rounded-xl mt-6 bg-card-dashboard border border-blue-950 px-6 py-6">
            <div class="flex justify-between mb-3">
                <div class="w-2/6 2xl:w-1/6 text-white">
                    <p class="text-xl">ILCS News</p>
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

            <div class="flex flex-col w-full mt-3">
                <h1 class="text-lg font-semibold mb-4 text-white">INTRANET 2.0 COMING SOON!!</h1>
                <img src="{{ asset('assets/images/dashboard/comming-soon.svg') }}" alt="" class="w-full h-full object-cover rounded-xl">

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

        <!--  calendar section -->
        <div class="flex rounded-xl mt-6 bg-card-dashboard border border-blue-950 px-6 py-6">
            <div id='calendar' class="w-2/6 2xl:w-3/6 text-white text-xs"></div>

            <div class="w-1/6 2xl:w-1/6 flex flex-col h-full overflow-auto calender-notif ml-4 px-4 py-2 rounded-2xl">
                <div class="flex flex-col w-full">
                    <p class="text-xs text-white bg-red-500 w-10 pl-1 mt-3  rounded-full py-1">8-15</p>
                    <p class="text-xs 2xl:text-sm text-white my-2 font-semibold">April 2024</p>
                    <p class="text-xs 2xl:text-sm text-white">Hari Raya Idul Fitri dan Cuti Bersama</p>
                </div>

            </div>

            <div class="flex w-3/6 2xl:w-2/6 flex-col text-white ml-6">
                <h5 class="font-semibold mb-6">
                    ILCS Events
                </h5>
                <div class="max-h-80 overflow-auto">
                    <div class="flex mb-6">
                        <div class="w-1/6 mx-6">
                            <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="" class="rounded-full 2xl:w-4/6">
                        </div>
                        <div class="w-4/6 text-sm">
                            <h4 class="font-semibold text-white">Go Live PTOS-M Tanjung Priok</h4>
                            <p class="text-dashboard-blue-right text-xs">Senin, 29 April 2024 | 10.00 </p>
                        </div>
                    </div>
                    <div class="flex mb-6">
                        <div class="w-1/6 mx-6">
                            <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="" class="rounded-full 2xl:w-4/6">
                        </div>
                        <div class="w-4/6 text-sm">
                            <h4 class="font-semibold text-white">Go Live PTOS-M Tanjung Priok</h4>
                            <p class="text-dashboard-blue-right text-xs">Senin, 29 April 2024 | 10.00 </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- section kanan -->
    <div class="w-2/6 flex flex-col">

        <div class="flex justify-between bg-card-dashboard border border-blue-950 ml-8 rounded-xl">

            <div class=" flex flex-col w-3/6 2xl:w-4/6 items-center text-white">
                <h4 class="text-base 2xl:text-lg text-center font-semibold mt-2">See <br /> Statistic KPI</h4>
                <button class="mx-auto rounded-full mt-3 kpi-button bg-login-button p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 2xl:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                    </svg>
                </button>
            </div>
            <div class="flex-col w-3/6 2xl:w-2/6">
                <img src="{{ asset('assets/images/icon/kpi-icon.svg') }}" class="w-full h-full ml-auto rounded-r-xl" alt="">
            </div>

        </div>

        <div class="flex-col bg-card-dashboard border border-blue-950 mt-8 px-4 py-6 ml-8 rounded-xl">
            <div class="w-full flex justify-between text-white mb-4">
                <h5 class="font-semibold text-sm 2xl:text-base">Upcoming Birthday 🎉</h5>
                <p class="text-sm 2xl:text-base">April 2024</p>
            </div>
            <div class="w-full flex-col">
                <div class="flex mb-6">
                    <h1 class="w-1/6 text-sm 2xl:text-base font-semibold text-center text-white">
                        26 April
                    </h1>
                    <div class="w-1/6 mx-6">
                        <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="" class="rounded-full 2xl:w-4/6">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Nurul Amelia</h4>
                        <p class="text-dashboard-blue-right text-xs">System Analyst (PIP)</p>
                    </div>
                </div>

                <div class="flex mb-6">
                    <h1 class="w-1/6 text-sm 2xl:text-base font-semibold text-center text-white">
                        26 April
                    </h1>
                    <div class="w-1/6 mx-6">
                        <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="" class="rounded-full  2xl:w-4/6">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Ari Panen</h4>
                        <p class="text-dashboard-blue-right text-xs">System Analyst (PIP)</p>
                    </div>
                </div>

                <div class="flex mb-6">
                    <h1 class="w-1/6 text-sm 2xl:text-base font-semibold text-center text-white">
                        26 April
                    </h1>
                    <div class="w-1/6 mx-6">
                        <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="" class="rounded-full  2xl:w-4/6">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Muhammad Aditya Suazi</h4>
                        <p class="text-dashboard-blue-right text-xs">UIUX Developer Produk (PPR)</p>
                    </div>
                </div>

            </div>

            <div class="border-divider-card w-full"></div>

            <div class="w-full flex  mt-6 justify-between text-white mb-4">

                <h5 class="font-semibold ">Welcoming New Employee 🥳</h5>
            </div>
            <div class="w-full flex-col">
                <div class="flex mb-6">
                    <div class="w-1/6 mx-6">
                        <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="" class="rounded-full  2xl:w-4/6">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Evelyn Halim</h4>
                        <p class="text-dashboard-blue-right text-xs">Business Intelligence (Produk)</p>
                    </div>
                </div>
                <div class="flex mb-6">
                    <div class="w-1/6 mx-6">
                        <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="" class="rounded-full  2xl:w-4/6">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Amanda Najwa Perak</h4>
                        <p class="text-dashboard-blue-right text-xs">3D Designer Produk</p>
                    </div>
                </div>
            </div>

            <div class="border-divider-card w-full"></div>

            <div class="w-full flex  mt-6 justify-between text-white mb-4">

                <h5 class="font-semibold ">Farewell Employee 👋</h5>
            </div>
            <div class="w-full flex-col">
                <div class="flex mb-6">
                    <div class="w-1/6 mx-6">
                        <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="" class="rounded-full  2xl:w-4/6 ">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Evelyn Halim</h4>
                        <p class="text-dashboard-blue-right text-xs">Business Intelligence (Produk)</p>
                    </div>
                </div>
                <div class="flex mb-6">
                    <div class="w-1/6 mx-6">
                        <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="" class="rounded-full  2xl:w-4/6">
                    </div>
                    <div class="w-4/6 text-sm">
                        <h4 class="font-semibold text-white">Amanda Najwa Perak</h4>
                        <p class="text-dashboard-blue-right text-xs">3D Designer Produk</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex-col bg-card-dashboard border border-blue-950 mt-6 px-4 py-6 ml-8 rounded-xl">
            <div class="w-full flex justify-between text-white mb-4">
                <h5 class="font-semibold ">Social Media ILCS</h5>
            </div>
            <div class="w-full flex">
                <a href="#" class="w-2/12">
                    <img src="{{ asset('assets/images/icon/instragram-dashboard.svg') }}" alt="" class="w-3/6">
                </a>
                <a href="#" class="w-2/12">
                    <img src="{{ asset('assets/images/icon/twitter-dashboard.svg') }}" alt="" class="w-3/6">
                </a>
                <a href="#" class="w-2/12">
                    <img src="{{ asset('assets/images/icon/youtube-dashboard.svg') }}" alt="" class="w-3/6">
                </a>
                <a href="#" class="w-2/12">
                    <img src="{{ asset('assets/images/icon/linkedin-dashboard.svg') }}" alt="" class="w-3/6">
                </a>
            </div>
        </div>

    </div>
</div>

<div class="flex flex-col w-full pb-6 px-14 ">
    <div class="w-full flex flex-col bg-card-dashboard px-4 py-6 border border-blue-950 mt-8 rounded-xl">
        <h2 class="text-lg text-white font-semibold">Kinerja Keuangan: Pendapatan & Beban Usaha s.d TW I</h2>
        <div class="grid grid-cols-2 gap-7 mt-4">
            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold text-xl">Pendapatan</h4>
                <div class="w-full mt-8">
                    <canvas id="barChart"></canvas>
                </div>

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class="bg-green-600 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold">Pendapatan RP. 96,47 M, tercapai 56,68% RKAP; Growth 21,59% YoY</h4>
                </div>

            </div>

            <div class="flex flex-col rounded-xl bg-card-dashboard px-4 py-4 border border-blue-950">
                <h4 class="text-white font-semibold text-xl">Beban Usaha</h4>
                <div class="w-full mt-8">
                    <canvas id="barChart2"></canvas>
                </div>

                <div class="bg-card-chart border rounded-lg border-blue-950 mt-4 text-white px-4 py-6 flex flex-col items-center">
                    <div class="bg-green-600 mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>
                    </div>
                    <h4 class="font-semibold">Beban Usaha Rp. 94,18 M, tercapai 66,82% RKAP; Growth 20,21% YoY</h4>
                </div>

            </div>
        </div>
    </div>
</div>

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
            businessHours: true, // display business hours
            editable: true,

            // selectable: true,
            // events: [{
            //         title: 'Business Lunch',
            //         start: '2023-01-03T13:00:00',
            //         constraint: 'businessHours'
            //     },
            //     {
            //         title: 'Meeting',
            //         start: '2023-01-13T11:00:00',
            //         constraint: 'availableForMeeting', // defined below
            //         color: '#257e4a'
            //     },
            //     {
            //         title: 'Conference',
            //         start: '2023-01-18',
            //         end: '2023-01-20'
            //     },
            //     {
            //         title: 'Party',
            //         start: '2023-01-29T20:00:00'
            //     },

            //     // areas where "Meeting" must be dropped
            //     {
            //         groupId: 'availableForMeeting',
            //         start: '2023-01-11T10:00:00',
            //         end: '2023-01-11T16:00:00',
            //         display: 'background'
            //     },
            //     {
            //         groupId: 'availableForMeeting',
            //         start: '2023-01-13T10:00:00',
            //         end: '2023-01-13T16:00:00',
            //         display: 'background'
            //     },

            //     // red areas where no events can be dropped
            //     {
            //         start: '2023-01-24',
            //         end: '2023-01-28',
            //         overlap: false,
            //         display: 'background',
            //         color: '#ff9f89'
            //     },
            //     {
            //         start: '2023-01-06',
            //         end: '2023-01-08',
            //         overlap: false,
            //         display: 'background',
            //         color: '#ff9f89'
            //     }
            // ]
        });

        calendar.render();
    });

    // chart



    var ctx = document.getElementById('barChart').getContext('2d');

    const dataDumn = [
        ['RKAP 2024', 'RKAP s.d Mar 2024', 'Real s.d Mar 2024', 'Real s.d Mar 2023'],
        [10000, 23000, 19000, 13000, 12900],
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
        plugins: [ChartDataLabels],
        options: {
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
                datalabels: {
                    color: '#FFF',
                    anchor: "center",
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


    var ctx2 = document.getElementById('barChart2').getContext('2d');

    const dataDumn2 = [
        ['RKAP 2024', 'RKAP s.d Mar 2024', 'Real s.d Mar 2024', 'Real s.d Mar 2023'],
        [30000, 23000, 19000, 13000, 12900],
    ]

    var myChart = new Chart(ctx2, {
        type: 'bar',
        color: "#FFF",
        data: {
            datalabels: {
                align: 'end',
                anchor: 'end',
            },
            labels: dataDumn2[0],
            datasets: [
                {
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

                },
            ]
        },
        plugins: [ChartDataLabels],
        options: {
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
                datalabels: {
                    color: '#FFF',
                    anchor: "center",
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
</script>
@endsection