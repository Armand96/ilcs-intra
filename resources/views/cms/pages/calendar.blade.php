@extends('cms.master_cms')
<script src='{{ asset('js/full-calendar.js') }}'></script>

@section('content')
    <div class="flex flex-col w-full mt-6  bg-gray-600 p-6 rounded-xl">

        <div class="w-1/6 text-white">
            <p class="text-xl">Calendars</p>
        </div>
        <button onclick="createNew()" class="btn btn-primary w-1/6 mt-6 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            <span>Tambah event</span>
        </button>

        <div class="w-full">
            <div class="overflow-x-auto w-full">
                <div id='calendar' class="w-full text-white text-sm "></div>
            </div>
        </div>
    </div>

    <dialog id="modal_calendar" class="modal">
        <div class="modal-box max-w-6xl bg-gray-600 text-white">
            <form id="calendar_form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <h2 class="font-semibold my-2 text-xl"> <span id="operation">Tambah</span> Event</h2>
                <div class="divider divider-neutral mb-4"></div>
                <div class="flex flex-col mb-6">
                    <div class="mt-4">
                        <p class="text-white">Judul</p>
                        <input type="text" name="judul" id="judul" required
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div class="mt-4">
                        <p class="text-white">Jenis Event</p>
                        <select name="tipe" id="tipe" required
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                            <option value="event">Event</option>
                            {{-- <option value="meeting">Meeting</option> --}}
                            <option value="libur">Libur</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <p class="text-white">Lokasi</p>
                        <input type="text" name="location" id="location" required
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div class="mt-4">
                        <p class="text-white">Tgl Event Start</p>
                        <input type="datetime-local" id="tgl_cal_event_start" name="tgl_cal_event_start" required
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div class="mt-4">
                        <p class="text-white">Tgl Event End</p>
                        <input type="datetime-local" id="tgl_cal_event_end" name="tgl_cal_event_end" required
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div class="mt-4">
                        <p class="text-white">Deskripsi</p>
                        <textarea name="description" id="description" cols="10" rows="10"
                            class="mt-3 px-4 py-2 bg-gray-700 w-full rounded-lg focus:outline-none"></textarea>
                    </div>
                    <div class="mt-4">
                        <p class="text-white">Foto</p>
                        <input type="file" name="foto"
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div>
                        <button type="button" class="btn btn-neutral mr-3" onclick="closeModal()">Cancel</button>
                        <button class="btn btn-primary">Save</button>

                    </div>
                </div>
            </form>
            <form id="delete_form" action="" method="POST">
                @csrf
                <input type="hidden" name="_method" id="delete_method" value="DELETE">
                <input type="hidden" name="id_delete" id="id_delete">
                <button class="btn btn-danger">Delete</button>
            </form>

        </div>
    </dialog>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            const dataCalendar = @json($calendarEvents);
            // console.log(dataCalendar);
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
                selectable: true,
                eventMouseEnter: function(info) {
                    let tooltip = document.createElement('div');
                    tooltip.className =
                    'absolute z-30 bg-black text-white text-sm px-2 py-1 rounded-xl';
                    tooltip.style.left = (info.jsEvent.pageX + 10) + 'px';
                    tooltip.style.top = (info.jsEvent.pageY + 10) + 'px';
                    tooltip.innerHTML = `
                <div class="flex items-center space-x-2">
                    <span class="bg-red-500 text-white rounded-full px-2 text-xs">${info.event.start.toLocaleDateString('id-ID', { day: 'numeric' })}</span>
                    <span class="text-xs">${info.event.start.toLocaleDateString('id-ID', { month: 'long', year: 'numeric' })}</span>
                </div>
                <div class="mt-2 text-xs">${ info.event._def.extendedProps.desc}</div>`;

                    document.body.appendChild(tooltip);
                    info.el.setAttribute('data-tooltip-id', tooltip);

                    info.el.addEventListener('mouseleave', () => {
                        tooltip.remove();
                    });
                },
                eventClick: function(info) {
                    // console.log(info.event);
                    // console.log(info.event._def.publicId);
                    edit(info.event._def.publicId)
                },
                events: dataCalendar,
                // events: [
                // {
                //     title: '',
                //     desc: "Idul Adha",
                //     start: '2024-06-16 00:00:00',
                //     end: '2024-06-16 23:59:59',
                //     color: "red"
                // },
                // {
                //     title: '',
                //     start: '2024-06-20T11:00:00',
                //     desc: "go live new dashboard  🚀",
                //     backgroundColor: 'blue'
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
                // ],

            });

            calendar.render();
        });

        function createNew() {
            $('#operation').html("Tambah");
            document.getElementById('modal_calendar').classList.add('modal-open');
            $('#calendar_form').trigger('reset');
            $('#calendar_form').prop('action', '{{ route('calendars.store') }}');
            $('input[name="_method"]').val('POST');
            $('#delete_form').hide();
        }

        function edit(idCalendar) {
            $('#operation').html("Perbarui");

            axios.get('{{ route('calendars.index') }}/' + idCalendar).then(resp => {
                resp = resp.data;
                console.log(resp);
                $('#judul').val(resp.judul);
                $('#location').val(resp.location);
                $('#tgl_cal_event_start').val(resp.tgl_cal_event_start);
                $('#tgl_cal_event_end').val(resp.tgl_cal_event_end);
                $('#tipe').val(resp.tipe);
                $('#description').val(resp.description);
                $('#calendar_form').prop('action', '{{ route('calendars.index') }}/' + idCalendar);
                $('input[name="_method"]').val('PATCH');
                $('#delete_method').val('DELETE');
                $('#delete_form').prop('action', "{{ route('calendars.index') }}/" + idCalendar);
                $('#delete_form').show();
                document.getElementById('modal_calendar').classList.add('modal-open');
            });

        }

        function closeModal() {
            document.getElementById('modal_calendar').classList.remove('modal-open');
        }
    </script>
@endsection
