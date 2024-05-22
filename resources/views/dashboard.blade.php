<!DOCTYPE html>
<html lang="en">
@include('layouts.head-only')

<head>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

</head>

<body>

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content">

            <!-- navbar -->
            <div class="navbar bg-dashboard-background border border-blue-950 ">
                <div class="flex-1">
                    <p class="text-xl font-semibold text-white">Dashboard intranet</p>
                </div>
                <div class="flex-none">
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                            <div class="indicator text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>
                                <span class="badge badge-sm bg-red-500 border-none text-white indicator-item">8</span>
                            </div>
                        </div>
                        <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                            <div class="card-body">
                                <span class="font-bold text-lg">8 Items</span>
                                <span class="text-info">Subtotal: $999</span>
                                <div class="card-actions">
                                    <button class="btn btn-primary btn-block">View cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                            <div class="indicator text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                                <span class="badge badge-sm bg-red-500 border-none text-white indicator-item">8</span>
                            </div>

                        </div>
                        <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                            <div class="card-body">
                                <span class="font-bold text-lg">8 Items</span>
                                <span class="text-info">Subtotal: $999</span>
                                <div class="card-actions">
                                    <button class="btn btn-primary btn-block">View cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img alt="Tailwind CSS Navbar component" src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                                <a class="justify-between">
                                    Profile
                                    <span class="badge">New</span>
                                </a>
                            </li>
                            <li><a>Settings</a></li>
                            <li><a>Logout</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <!-- Page content -->
            <div class="flex flex-col items-center justify-center">
                <!-- Page content here -->
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

                <div class="flex w-full px-14 py-6">
                    <div class="w-4/6 flex flex-col">

                        <div class="flex w-full">

                            <div class="flex w-6/12 rounded-2xl bg-onboarding items-center mr-8 ">
                                <div class=" flex flex-col w-4/6 px-4 py-6 text-white">
                                    <h4 class="text-sm font-semibold">Halo Warriors! 👋</h4>
                                    <p class="text-base">Selamat Datang di Intranet ILCS</p>
                                </div>
                                <div class="flex-col w-2/6">
                                    <img src="{{ asset('assets/images/icon/orang-kerja-icon.svg') }}" class="pr-4 -mb-8" alt="">
                                </div>
                            </div>

                            <div class="flex flex-col w-6/12 bg-card-dashboard border-blue-950 border rounded-2xl px-4 py-4">
                                <p class="text-white font-semibold">Shortcut Back Office Access</p>
                                <div class="flex justify-evenly overflow-x-auto w-full whitespace-nowrap	 mt-4">

                                    <a href="#" class="w-2/6 flex mr-6 flex-col items-center">
                                        <div class="h-full py-2 px-1 w-full bg-backoffice-icon rounded-full">
                                            <img src="{{ asset('assets/images/shortcut-icon/peo.svg') }}" class="mx-auto" alt="">
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

                        <div class="flex flex-col rounded-xl mt-6 bg-card-dashboard border border-blue-950 px-6 py-6">
                            <div class="flex justify-between mb-3">
                                <div class="w-1/6 text-white">
                                    <p class="text-xl">ILCS News</p>
                                </div>
                                <div class="w-1/6 flex text-xl nextBtn text-white">
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
                                </div>
                            </div>
                            <div class="owl-carousel w-full">

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

                            </div>
                        </div>

                        <div class="flex rounded-xl mt-6 bg-card-dashboard border border-blue-950 px-6 py-6">
                            <div id='calendar' class="w-3/6 text-white text-xs"></div>
                            <div class="flex flex-col text-white ml-6">
                                <h5 class="font-semibold mb-6">
                                    ILCS Events
                                </h5>
                                <div class="max-h-80 overflow-auto">
                                    <div class="flex mb-6">
                                        <div class="w-1/6 mx-6">
                                            <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="" class="rounded-full">
                                        </div>
                                        <div class="w-4/6 text-sm">
                                            <h4 class="font-semibold text-white">Go Live PTOS-M Tanjung Priok</h4>
                                            <p class="text-dashboard-blue-right text-xs">Senin, 29 April 2024 | 10.00 </p>
                                        </div>
                                    </div>
                                    <div class="flex mb-6">
                                        <div class="w-1/6 mx-6">
                                            <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="" class="rounded-full">
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

                    <div class="w-2/6 flex flex-col">
                        <div class="flex-col bg-card-dashboard border border-blue-950   px-4 py-6 ml-8 rounded-xl">
                            <div class="w-full flex justify-between text-white mb-4">
                                <h5 class="font-semibold ">Upcoming Birthday 🎉</h5>
                                <p>April 2024</p>
                            </div>
                            <div class="w-full flex-col">
                                <div class="flex mb-6">
                                    <h1 class="w-1/6 font-semibold text-center text-white">
                                        26 April
                                    </h1>
                                    <div class="w-1/6 mx-6">
                                        <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="" class="rounded-full">
                                    </div>
                                    <div class="w-4/6 text-sm">
                                        <h4 class="font-semibold text-white">Nurul Amelia</h4>
                                        <p class="text-dashboard-blue-right text-xs">System Analyst (PIP)</p>
                                    </div>
                                </div>

                                <div class="flex mb-6">
                                    <h1 class="w-1/6 font-semibold text-center text-white">
                                        26 April
                                    </h1>
                                    <div class="w-1/6 mx-6">
                                        <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="" class="rounded-full">
                                    </div>
                                    <div class="w-4/6 text-sm">
                                        <h4 class="font-semibold text-white">Ari Panen</h4>
                                        <p class="text-dashboard-blue-right text-xs">System Analyst (PIP)</p>
                                    </div>
                                </div>

                                <div class="flex mb-6">
                                    <h1 class="w-1/6 font-semibold text-center text-white">
                                        26 April
                                    </h1>
                                    <div class="w-1/6 mx-6">
                                        <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="" class="rounded-full">
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
                                        <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="" class="rounded-full">
                                    </div>
                                    <div class="w-4/6 text-sm">
                                        <h4 class="font-semibold text-white">Evelyn Halim</h4>
                                        <p class="text-dashboard-blue-right text-xs">Business Intelligence (Produk)</p>
                                    </div>
                                </div>
                                <div class="flex mb-6">
                                    <div class="w-1/6 mx-6">
                                        <img src="{{ asset('assets/images/users/user-5.jpg') }}" alt="" class="rounded-full">
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
                                        <img src="{{ asset('assets/images/users/user-2.jpg') }}" alt="" class="rounded-full">
                                    </div>
                                    <div class="w-4/6 text-sm">
                                        <h4 class="font-semibold text-white">Evelyn Halim</h4>
                                        <p class="text-dashboard-blue-right text-xs">Business Intelligence (Produk)</p>
                                    </div>
                                </div>
                                <div class="flex mb-6">
                                    <div class="w-1/6 mx-6">
                                        <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt="" class="rounded-full">
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


            </div>

        </div>
        <!-- sidebar -->
        <div class="drawer-side">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <div class="menu py-4 w-64 min-h-screen text-base-content sidebar-background border-blue-950 border">
                <img src="{{ asset('assets/images/logo/sidebar_logo.svg') }}" class=" mx-auto w-36 mb-4 mt-2 object-cover" alt="logo">
                <!-- Sidebar content here -->
                <div class="flex flex-col w-full justify-center items-center">

                    <a class="text-white rounded-2xl menu-child-active  flex-col items-center justify-center flex mt-6 w-5/6 px-4 py-3" href="#">
                        <div class="hex-icon-active p-2 rounded-xl mt-2">
                            <img src="{{ asset('assets/images/icon/dashboard-icon.svg') }}" alt="">
                        </div>
                        <p class="mt-2 text-sm">Dashboard</p>
                    </a>

                    <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3" href="#">
                        <div class=" p-2 rounded-xl mt-2 hex-icon">
                            <img src="{{ asset('assets/images/icon/user-octagon.svg') }}" alt="">
                        </div>
                        <p class="mt-2 text-sm">From The Board</p>
                    </a>

                    <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3" href="#">
                        <div class=" p-2 rounded-xl mt-2 hex-icon">
                            <img src="{{ asset('assets/images/icon/user-square.svg') }}" alt="">
                        </div>
                        <p class="mt-2 text-sm">Our Team</p>
                    </a>


                    <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3" href="#">
                        <div class="p-2 rounded-xl mt-2 hex-icon">
                            <img src="{{ asset('assets/images/icon/employe-aspiration.svg') }}" alt="">
                        </div>
                        <p class="mt-2 text-sm text-nowrap w-full">Employe Aspiration</p>
                    </a>

                    <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3" href="#">
                        <div class="p-2 rounded-xl mt-2 hex-icon">
                            <img src="{{ asset('assets/images/icon/calendar-icon.svg') }}" alt="">
                        </div>
                        <p class="mt-2 text-sm text-nowrap w-full">Meeting Calendar</p>
                    </a>

                    <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3" href="#">
                        <div class="p-2 rounded-xl mt-2 hex-icon">
                            <img src="{{ asset('assets/images/icon/our-regulation.svg') }}" alt="">
                        </div>
                        <p class="mt-2 text-sm text-center w-full">Our Regulation</p>
                    </a>

                    <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3" href="#">
                        <div class="p-2 rounded-xl mt-2 hex-icon">
                            <img src="{{ asset('assets/images/icon/book-icon.svg') }}" alt="">
                        </div>
                        <p class="mt-2 text-sm  text-center w-full">Knowledge Management</p>
                    </a>

                    <a class="text-white rounded-2xl menu-child flex-col items-center justify-center flex mt-4 w-5/6 px-4 py-3" href="#">
                        <div class="p-2 rounded-xl mt-2 hex-icon">
                            <img src="{{ asset('assets/images/icon/book-icon-2.svg') }}" alt="">
                        </div>
                        <p class="mt-2 text-sm  text-center w-full">Our Product</p>
                    </a>

                </div>

            </div>

        </div>
    </div>

    <script src='{{ asset('js/full-calendar.js') }}'></script>
    <script src='{{ asset('js/jquery.min.js') }}'></script>
    <script src='{{ asset('js/owl.carousel.js') }}'></script>
    <script>
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

        document.body.style.zoom = "80%"; 

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
    </script>
</body>

</html>