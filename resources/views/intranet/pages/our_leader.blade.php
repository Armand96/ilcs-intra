@extends('intranet.master_intranet')

@section('content')
    <div class="bg-onboarding w-11/12  mx-auto mt-6 px-6 py-6">
        <div class="flex flex-col  bg-blur-comission border border-white text-white rounded-lg w-full px-4 py-6">
            <h4 class="text-lg font-semibold">
                From The Board
            </h4>
            <div class="flex w-full mt-5">
                <div class="w-1/4 mr-6 tabs tab-active flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer "
                    data-tab-target="#tab1">
                    <img src="{{ asset('assets/images/icon/boc-icon.svg') }}" alt="img" class="w-12">
                    <p class="font-semibold text-sm ml-6">
                        Board of Commissioner
                    </p>
                </div>
                <div class="w-1/4 mr-6 flex tabs justify-center items-center px-4 py-2 rounded-xl cursor-pointer text-white"
                    data-tab-target="#tab2">
                    <img src="{{ asset('assets/images/icon/bod-icon.svg') }}" alt="img" class="w-12">
                    <p class="font-semibold text-sm ml-6">
                        Board of Directors
                    </p>
                </div>
                <div class="w-1/4 mr-6 tabs flex justify-center items-center px-4 py-2 rounded-xl cursor-pointer text-white "
                    data-tab-target="#tab3">
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
                    <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                <img src="{{ asset('assets/images/from-board/boc-2.svg') }}" alt="img"
                    class="w-full rounded-t-2xl mr-8">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">PBUDI MANTORO</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Commissioner</p>
                    <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl">
                <img src="{{ asset('assets/images/from-board/boc-3.svg') }}" alt="img"
                    class="w-full rounded-t-2xl mr-8">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">NUGROHO INDRIO</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Commissioner</p>
                    <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
        </div>

        <div class="w-full  hidden flex-wrap" id="tab2">
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                <img src="{{ asset('assets/images/from-board/bod-1.svg') }}" alt="img" class="w-full rounded-t-2xl ">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">NATAL IMAN GINTING</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Chief Executive Officer (CEO)</p>
                    <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                <img src="{{ asset('assets/images/from-board/bod-2.svg') }}" alt="img"
                    class="w-full rounded-t-2xl mr-8">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">AGUS DHARMAWAN</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Chief Marketing Officer (CMO)</p>
                    <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl">
                <img src="{{ asset('assets/images/from-board/bod-3.svg') }}" alt="img"
                    class="w-full rounded-t-2xl mr-8">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">JUDI GINTA IRAWAN</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Commissioner</p>
                    <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>

        </div>

        <div class="w-full  hidden flex-wrap" id="tab3">
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                <img src="{{ asset('assets/images/from-board/bom-1.svg') }}" alt="img" class="w-full rounded-t-2xl ">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">Kamaldila Puja Yusnika</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Pjs Senior Manager for Service Management</p>
                    <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                <img src="{{ asset('assets/images/from-board/bom-2.svg') }}" alt="img" class="w-full rounded-t-2xl">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">Afandi Nurrahman</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Senior Manager of Project Planning and
                        Implementation</p>
                    <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mr-8">
                <img src="{{ asset('assets/images/from-board/bom-3.svg') }}" alt="img" class="w-full rounded-t-2xl">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">Frenda Rangga Aksara</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Senior Manager of Product Development</p>
                    <button
                        class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
            <div class="w-1/4 flex flex-col card-comission border border-blue-950 rounded-2xl mt-8">
                <img src="{{ asset('assets/images/from-board/bom-4.svg') }}" alt="img"
                    class="w-full rounded-t-2xl">
                <div class="flex flex-col px-4 py-4">
                    <h4 class="text-white text-lg font-semibold">Raden Rubiyanto</h4>
                    <p class="text-dashboard-blue-right text-sm font-semibold">Support Services Manager</p>
                    <button
                        class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button mt-6">See
                        message</button>
                </div>
            </div>
        </div>

    </div>

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
@endsection
