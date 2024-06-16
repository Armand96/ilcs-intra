@extends('cms.master_cms')
<script src='{{ asset('js/full-calendar.js') }}'></script>

@section('content')
<div class="flex flex-col w-full mt-6  bg-gray-600 p-6 rounded-xl">

        <div class="w-1/6 text-white">
            <p class="text-xl">Calendars</p>
        </div>
        <button onclick="openModal()" class="btn btn-primary w-1/6 mt-6 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah event
        </button>

    <div class="w-full">
        <div class="overflow-x-auto w-full">
            <div id='calendar' class="w-full text-white text-sm "></div>
        </div>
    </div>
</div>


<dialog id="modal_edit" class="modal">
    <form id="news_form" method="POST" enctype="multipart/form-data" class="modal-box max-w-6xl bg-gray-600 text-white">

        <h2 class="font-semibold my-2 text-xl"> <span id="operation">Tambah</span> Event</h2>
        <div class="divider divider-neutral mb-4"></div>
        <div class="flex flex-col mb-6">
            <div class="mt-4">
                <p class="text-white">Judul</p>
                <input type="text" name="judul" id="judul" class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
            </div>
            <div class="mt-4">
                <p class="text-white">tgl event</p>
                <input type="date" class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
            </div>
            <div class="mt-4">
                <p class="text-white">content</p>
                <textarea name="content" id="content" cols="10" rows="10" class="mt-3 px-4 py-2 bg-gray-700 w-full rounded-lg focus:outline-none"></textarea>
            </div>
            <div class="mt-4">
                <p class="text-white">jenis event</p>
                <input required list="jabatans" type="dropdown" name="jabatan" id="jabatan" class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                <datalist id="jabatans">
                    <option value="">khusus</option>
                    <option value="">biasa</option>
                </datalist>
            </div>
        </div>

        <div class="flex flex-row">
            <div>
                <button type="button" class="btn btn-neutral mr-3" onclick="closeModal()">cancel</button>
                <button class="btn btn-primary">save</button>
            </div>
        </div>
    </form>
</dialog>

@endsection

@section('script')
<script>
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
            eventClick: function(info) {
                openModal()
            },
            events: [{
                    title: '',
                    desc: "Idul Adha",
                    start: '2024-06-16T13:00:00',
                    color: "red"
                },
                {
                    title: '',
                    start: '2024-06-20T11:00:00',
                    desc: "go live new dashboard  🚀",
                    backgroundColor: 'blue'
                },
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


    function openModal() {
        document.getElementById('modal_edit').classList.add('modal-open');
    }

    function closeModal() {
        document.getElementById('modal_edit').classList.remove('modal-open');
    }
</script>
@endsection