@extends('cms.master_cms')

@section('content')
    <div class="flex flex-col w-full mt-6  bg-gray-600 rounded-xl p-6">
        <div class="flex flex-col mb-3">
            <div class="w-1/6 text-white">
                <p class="text-xl">KPI Chart</p>
            </div>

            <form action="" class="border px-4 py-6 my-6">
                <div class=" w-full grid grid-cols-3 gap-4 rounded-xl">
                    <div>
                        <p class="text-white">Source</p>
                        <input type="text" name="source" value="{{ request('source') }}"
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div>
                        <p class="text-white">Bulan</p>
                        <input type="text" name="bulan" value="{{ request('bulan') }}"
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div>
                        <p class="text-white">Tahun</p>
                        <input type="text" name="tahun" value="{{ request('tahun') }}"
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <button type="submit" class="btn btn-primary mt-7 w-3/12">
                        Cari
                    </button>
                </div>
            </form>

            <div class="flex gap-6">
                <button onclick="createNew()" class="btn btn-primary w-1/6 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Data
                </button>
                <button onclick="uploadModal()" class="btn btn-primary w-1/6 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Upload
                </button>
                <a href="{{ route('kpis.template') }}" class="btn btn-primary w-1/6 mb-6">
                    Download Template
                </a>
            </div>

        </div>
        <div class="w-full">
            <div class="overflow-x-auto text-white w-full">
                <table class="table border w-full mb-3">
                    <thead>
                        <tr class="text-white ">
                            <th>Source</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>RKAP</th>
                            <th>Real</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kpis as $index => $kpi)
                            <tr>
                                <td> {{ $kpi->source }} </td>
                                <td> {{ $kpi->bulan }} </td>
                                <td> {{ $kpi->tahun }} </td>
                                <td> Rp {{ number_format($kpi->rkap, 2, ',', '.') }} </td>
                                <td> Rp {{ number_format($kpi->reals, 2, ',', '.') }} </td>
                                <td>
                                    <button class="btn btn-primary" onclick="edit({{ $kpi->id }})">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="deleteModal({{ $kpi->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $kpis->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <dialog id="my_modal" class="modal">
        <form id="kpi_form" method="POST" enctype="multipart/form-data" class="modal-box max-w-6xl bg-gray-600 text-white"
            action="{{ route('kpis.store') }}">
            @csrf
            @method('PATCH')
            <h2 class="font-semibold my-2 text-xl"> <span id="operation">Tambah</span> Data KPI</h2>
            <div class="divider divider-neutral mb-4"></div>
            <div class="flex flex-col mb-6">
                <div class="mt-4">
                    <p class="text-white">Source</p>
                    <select name="source" id="source"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                        <option value="Pendapatan">Pendapatan</option>
                        <option value="Beban Usaha">Beban Usaha</option>
                        <option value="OR">OR</option>
                        <option value="ICT System Implementator">ICT System Implementator</option>
                        <option value="IT Manage Service">IT Manage Service</option>
                        <option value="Digital Seaport">Digital Seaport</option>
                    </select>
                    {{-- <input type="text" list="list_source" name="source" id="source" class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    <datalist id="list_source">
                        <option value="Pendapatan">Pendapatan</option>
                        <option value="Beban Usaha">Beban Usaha</option>
                        <option value="OR">OR</option>
                        <option value="ICT System Implementator">ICT System Implementator</option>
                        <option value="IT Manage Service">IT Manage Service</option>
                        <option value="Digital Seaport">Digital Seaport</option>
                    </datalist> --}}
                </div>
                <div class="mt-4">
                    <p class="text-white">Bulan</p>
                    <select name="bulan" id="bulan"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                        <option value="1">Januari</option>
                        <option value="2">Febuari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="mt-4">
                    <p class="text-white">Tahun</p>
                    <input type="number" name="tahun" id="tahun"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">RKAP</p>
                    <input type="number" name="rkap" id="rkap"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Real</p>
                    <input type="number" name="reals" id="reals"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
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

    <!-- Modal dialog -->
    <dialog id="upload_modal" class="modal">
        <div class="modal-box flex flex-col">
            <h3 class="font-bold text-lg">Upload KPI</h3>
            <div class="modal-action">
                <form id="upload_form" method="POST" class="w-full" enctype="multipart/form-data"
                    action="{{ route('kpis.upload') }}">
                    @csrf
                    <div class="mb-6 w-full">
                        <p class="text-white">File</p>
                        <input type="file" name="file"
                            accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>

                    <!-- if there is a button in form, it will close the modal -->
                    <span method="dialog">
                        <button type="button" onclick="closeUploadModal()" class="btn btn-neutral mr-3">cancel</button>
                    </span>
                    <button type="submit" class="btn btn-primary">Upload</button>

                </form>
            </div>
        </div>
    </dialog>

    <!-- Open the modal using ID.showModal() method -->
    <dialog id="delete_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Perhatian !</h3>
            <p class="py-4">Anda Yakin ingin menghapus data ini ??</p>
            <div class="modal-action">
                <form id="delete_form" method="POST" action="">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" id="delete_method">
                    <!-- if there is a button in form, it will close the modal -->
                    <span method="dialog">
                        <button type="button" onclick="closeDeleteModal()" class="btn btn-neutral mr-3">cancel</button>
                    </span>
                    <button type="submit" class="btn btn-primary">ya</button>

                </form>
            </div>
        </div>
    </dialog>
@endsection

@section('script')
    <script>
        function closeModal() {
            document.getElementById('my_modal').classList.remove('modal-open');
        }

        function createNew() {
            $('#operation').html("Tambah");
            document.getElementById('my_modal').classList.add('modal-open');
            $('#kpi_form').prop('action', '{{ route('kpis.store') }}');
            $('input[name="_method"]').val('POST');
        }

        function edit(idKPI) {
            $('#operation').html("Perbarui");
            axios.get('{{ route('kpis.index') }}/' + idKPI).then(resp => {
                resp = resp.data;
                console.log(resp);
                $('#source').val(resp.source);
                $('#bulan').val(resp.bulan);
                $('#tahun').val(resp.tahun);
                $('#rkap').val(resp.rkap);
                $('#reals').val(resp.reals);

                $('#kpi_form').prop('action', '{{ route('kpis.index') }}/' + idKPI);
                $('input[name="_method"]').val('PATCH');

                document.getElementById('my_modal').classList.add('modal-open');
            });
        }

        function uploadModal() {
            $('#upload_modal').addClass('modal-open');
        }

        function closeUploadModal() {
            $('#upload_modal').removeClass('modal-open');
        }

        function deleteModal(idKPI) {
            $('#delete_method').val("DELETE");
            $('#delete_form').prop('action', '{{ route('kpis.index') }}/' + idKPI)
            $('#delete_modal').addClass('modal-open');
        }

        function closeDeleteModal() {
            $('#delete_modal').removeClass('modal-open');
        }
    </script>
@endsection
