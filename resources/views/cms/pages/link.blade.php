@extends('cms.master_cms')

@section('content')
    <div class="flex flex-col w-full mt-6  bg-gray-600 rounded-xl p-6">
        <div class="flex flex-col mb-3">
            <div class="w-1/6 text-white">
                <p class="text-xl">Link</p>
            </div>

            <form action="" class="border px-4 py-6 my-6">
                <div class=" w-full grid grid-cols-3 gap-4 rounded-xl">
                    <div>
                        <p class="text-white">Nama</p>
                        <input type="text" name="name" value="{{ request('name') }}"
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div>
                        <p class="text-white">Tipe</p>
                        <input type="text" name="tipe" value="{{ request('tipe') }}"
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <button type="submit" class="btn btn-primary mt-7 w-3/12">
                        Cari
                    </button>
                </div>
            </form>

            <button onclick="createNew()" class="btn btn-primary w-1/6 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Link
            </button>

        </div>
        <div class="w-full">
            <div class="overflow-x-auto text-white w-full">
                <table class="table border w-full mb-3">
                    <thead>
                        <tr class="text-white ">
                            <th></th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($links as $index => $lnk)
                            <tr>
                                <th>{{ $lnk->id }}</th>
                                <td> {{ $lnk->name }} </td>
                                <td> {{ $lnk->tipe }} </td>
                                <td>
                                    <a href="{{ $lnk->link_tujuan }}" class="avatar">
                                        <div class="w-10 rounded-full">
                                            <img src="{{ $lnk->image_path }}" />
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-primary" onclick="edit({{ $lnk->id }})">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="deleteModal({{ $lnk->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $links->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <dialog id="my_modal" class="modal">
        <form id="link_form" method="POST" enctype="multipart/form-data"
            class="modal-box max-w-6xl bg-gray-600 text-white" action="{{ route('links.store') }}">
            @csrf
            @method('PATCH')
            <h2 class="font-semibold my-2 text-xl"> <span id="operation">Tambah</span> Link</h2>
            <div class="divider divider-neutral mb-4"></div>
            <div class="flex flex-col mb-6">
                <div class="mt-4">
                    <p class="text-white">Nama</p>
                    <input type="text" name="name" id="name"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Tipe</p>
                    <select name="tipe" id="tipe"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                        <option value="sosmed">Sosmed</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mt-4">
                    <p class="text-white">Link Tujuan</p>
                    <input type="text" name="link_tujuan" id="link_tujuan"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Gambar</p>
                    <input type="file" name="file"
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

    <!-- Open the modal using ID.showModal() method -->
    <dialog id="delete_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Perhatian !</h3>
            <p class="py-4">Anda Yakin ingin menghapus data ini ??</p>
            <div class="modal-action">
                <form id="delete_form" method="POST" action="">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
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
            $('#link_form').prop('action', '{{ route('links.store') }}');
            $('input[name="_method"]').val('POST');
        }

        function edit(idLink) {
            $('#operation').html("Perbarui");
            axios.get('{{ route('links.index') }}/' + idLink).then(resp => {
                resp = resp.data;
                console.log(resp);
                $('#name').val(resp.name);
                $('#tipe').val(resp.tipe);
                $('#link_tujuan').val(resp.link_tujuan);

                $('#link_form').prop('action', '{{ route('links.index') }}/' + idLink);
                $('input[name="_method"]').val('PATCH');

                document.getElementById('my_modal').classList.add('modal-open');
            })

        }

        function deleteModal(idLink) {
            $('#delete_form').prop('action', '{{ route('links.index') }}/' + idLink)
            $('#delete_modal').addClass('modal-open');
        }

        function closeDeleteModal() {
            $('#delete_modal').removeClass('modal-open');
        }
    </script>
@endsection
