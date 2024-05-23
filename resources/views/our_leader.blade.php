<!DOCTYPE html>
<html lang="en">
@include('layouts.head-only')

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

                <div class="bg-onboarding w-11/12  mx-auto mt-6 px-6 py-6">
                    <div class="flex flex-col  bg-blur-comission border border-white text-white rounded-lg w-full px-4 py-6">
                        <h4 class="text-lg font-semibold">
                            From The Board
                        </h4>
                        <div class="flex w-full mt-5">
                            <div class="w-1/4 mr-6 tab-active flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer " data-tab-target="#tab1">
                                <img src="{{ asset('assets/images/icon/boc-icon.svg') }}" alt="img" class="w-12">
                                <p class="font-semibold text-sm ml-6">
                                    Board of Commissioner
                                </p>
                            </div>
                            <div class="w-1/4 mr-6 flex tabs justify-center items-center px-4 py-2 rounded-xl cursor-pointer text-white" data-tab-target="#tab2">
                                <img src="{{ asset('assets/images/icon/bod-icon.svg') }}" alt="img" class="w-12">
                                <p class="font-semibold text-sm ml-6">
                                    Board of Directors
                                </p>
                            </div>
                            <div class="w-1/4 mr-6 tabs  flex justify-center items-center px-4 py-2 rounded-xl cursor-pointer text-white " data-tab-target="#tab3">
                                <img src="{{ asset('assets/images/icon/bom-icon.svg') }}" alt="img" class="w-12">
                                <p class="font-semibold text-sm ml-6">
                                    Board of Commissioner
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab-contents" class="w-11/12 mt-9">
                    <div class="w-full flex  flex-wrap" id="tab1">
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                            <img src="{{ asset('assets/images/from-board/boc-1.svg') }}" alt="img" class="w-full rounded-t-2xl ">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">PRAKOSA HADI TAKARIYANTO</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">President Commissioner</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                            <img src="{{ asset('assets/images/from-board/boc-2.svg') }}" alt="img" class="w-full rounded-t-2xl mr-8">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">PBUDI MANTORO</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Commissioner</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl">
                            <img src="{{ asset('assets/images/from-board/boc-3.svg') }}" alt="img" class="w-full rounded-t-2xl mr-8">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">NUGROHO INDRIO</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Commissioner</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>
                    </div>

                    <div class="w-full  hidden flex-wrap" id="tab2">
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                            <img src="{{ asset('assets/images/from-board/bod-1.svg') }}" alt="img" class="w-full rounded-t-2xl ">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">NATAL IMAN GINTING</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Chief Executive Officer (CEO)</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                            <img src="{{ asset('assets/images/from-board/bod-2.svg') }}" alt="img" class="w-full rounded-t-2xl mr-8">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">AGUS DHARMAWAN</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Chief Marketing Officer (CMO)</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl">
                            <img src="{{ asset('assets/images/from-board/bod-3.svg') }}" alt="img" class="w-full rounded-t-2xl mr-8">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">JUDI GINTA IRAWAN</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Commissioner</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>

                    </div>

                    <div class="w-full  hidden flex-wrap" id="tab3">
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                            <img src="{{ asset('assets/images/from-board/bom-1.svg') }}" alt="img" class="w-full rounded-t-2xl ">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">Kamaldila Puja Yusnika</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Pjs Senior Manager for Service Management</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                            <img src="{{ asset('assets/images/from-board/bom-2.svg') }}" alt="img" class="w-full rounded-t-2xl">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">Afandi Nurrahman</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Senior Manager of Project Planning and Implementation</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                            <img src="{{ asset('assets/images/from-board/bom-3.svg') }}" alt="img" class="w-full rounded-t-2xl">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">Frenda Rangga Aksara</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Senior Manager of Product Development</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
                            </div>
                        </div>
                        <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mt-8">
                            <img src="{{ asset('assets/images/from-board/bom-4.svg') }}" alt="img" class="w-full rounded-t-2xl">
                            <div class="flex flex-col px-4 py-4">
                                <h4 class="text-white text-lg font-semibold">Raden Rubiyanto</h4>
                                <p class="text-dashboard-blue-right text-sm font-semibold">Support Services Manager</p>
                                <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See message</button>
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

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let tabs = document.querySelectorAll('[data-tab-target]');
        let tabContents = document.querySelectorAll('#tab-contents > div');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(item => item.classList.remove('tab-active'));
                tab.classList.add('tab-active');
                const target = document.querySelector(tab.dataset.tabTarget);
                tabContents.forEach(content => content.classList.add('hidden'));
                target.classList.remove('hidden');
                target.classList.add('flex');
            });
        });
    });
</script>

</html>