@extends('intranet.master_intranet')

@section('content')
    <div class="bg-onboarding w-11/12 rounded-lg mx-auto mt-6 px-6 py-6">
        <div class="flex flex-col  bg-blur-comission border border-white text-white rounded-lg w-full px-4 py-6">
            <h4 class="text-lg text-center font-semibold">
                From The Board
            </h4>
            <div class="flex flex-col gap-6 justify-center lg:flex-row w-full mt-5">
                @foreach ($divisis as $idx => $div)
                    <div class="w-full xl:w-1/3 mr-6 flex tabs {{$idx == 0 ? 'tab-active' : ''}} justify-center items-center px-4 py-2 rounded-xl cursor-pointer text-white"
                        data-tab-target="#tab{{$idx}}">
                        <img src="{{ asset('assets/images/icon/'.$div['icon']) }}" alt="img" class="w-12">
                        <p class="font-semibold text-xs lg:text-sm ml-6">
                            {{ $div['name'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="tab-contents" class="w-11/12 mt-9 mb-10">

        <!-- BOC -->
        <div class="w-full grid grid-cols-1 lg:grid-cols-4 gap-4" id="tab0">

            @foreach ($leaders['boc'] as $ld)
                <div class="flex flex-col card-comission border border-blue-950 rounded-2xl">
                    <img src="{{ $ld->user->image_user }}" alt="img" class="w-full rounded-t-2xl object-cover h-48 object-top">
                    <div class="flex flex-col  px-4  pt-4 h-40 ">
                        <h4 class="text-white text-lg font-semibold">{{ $ld->user->name }}</h4>
                        <p class="text-dashboard-blue-right text-sm font-semibold">{{ $ld->user->jabatan }}</p>
                    </div>
                    <div class="flex w-full px-4 pb-4">
                        <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button" onclick="openModal({{$ld->id}})">See
                            message</button>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- BOD -->
        <div class="w-full hidden grid-cols-1 lg:grid-cols-4 gap-4" id="tab1">

            @foreach ($leaders['bod'] as $ld)
                <div class="flex flex-col card-comission border border-blue-950 rounded-2xl">
                    <img src="{{ $ld->user->image_user }}" alt="img" class="w-full object-top object-cover rounded-t-2xl h-48">
                    <div class="flex flex-col  px-4  pt-4 h-40">
                        <h4 class="text-white text-lg font-semibold">{{ $ld->user->name }}</h4>
                        <p class="text-dashboard-blue-right text-sm font-semibold">{{ $ld->user->jabatan }}</p>
                    </div>
                    <div class="flex w-full px-4 pb-4">
                        <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button" onclick="openModal({{$ld->id}})">See
                            message</button>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- BOM -->
        <div class="w-full hidden grid-cols-1 lg:grid-cols-4 gap-4 " id="tab2">

            @foreach ($leaders['bom'] as $ld)
                <div class="flex flex-col card-comission border border-blue-950 rounded-2xl">
                    <img src="{{ $ld->user->image_user }}" alt="img" class="w-full object-top object-cover rounded-t-2xl h-48">
                    <div class="flex flex-col  px-4  pt-4 h-40">
                        <h4 class="text-white text-lg font-semibold">{{ $ld->user->name }}</h4>
                        <p class="text-dashboard-blue-right text-sm font-semibold">{{ $ld->user->jabatan }}</p>
                    </div>
                    <div class="flex w-full px-4 pb-4">
                        <button class="text-white ml-auto px-4 text-base py-2 rounded-2xl login-button bg-login-button" onclick="openModal({{$ld->id}})">See
                            message</button>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

    @include('components.modal_leader')

    <script>

        function openModal(idLeader) {
            axios.get('{{ url("leader-detail") }}/'+idLeader).then(resp => {
                resp = resp.data;
                $('#leader_name').html(resp.user.name);
                $('#leader_jabatan').html(resp.user.jabatan);
                $('#leader_description').html(resp.description)
                $('#leader_image').attr('src', resp.user.image_user);
                $('#modal_leader').addClass('modal-open');
            });
        }

        function closeModal(){
            $('#modal_leader').removeClass('modal-open');
        }

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
                    target.classList.add('grid');
                });
            });
        });
    </script>
@endsection
