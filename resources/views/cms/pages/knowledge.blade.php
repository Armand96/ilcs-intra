@extends('cms.master_cms')

@section('content')
    <div class="flex flex-col w-full mt-6  bg-gray-600 p-6 rounded-xl">
        <div class="flex flex-col mb-3">
            <div class="w-1/6 text-white">
                <p class="text-xl">Knowledge</p>
            </div>

            <form action="" class="border px-4 py-6 my-6">
                <div class=" w-full grid grid-cols-3 gap-4 rounded-xl">
                    <div>
                        <p class="text-white">Judul</p>
                        <input type="text" name="judul" value="{{ request('judul') }}"
                            class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <button type="submit" class="btn btn-primary mt-7 w-3/12">
                        Cari
                    </button>
                </div>
            </form>

            <button onclick="createNew()" class="btn btn-primary w-2/6 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Knowledge
            </button>

        </div>
        <div class="w-full">
            <div class="overflow-x-auto text-white w-full">
                <table class="table border w-full mb-3">
                    <thead>
                        <tr class="text-white ">
                            <th></th>
                            <th>Judul</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($knowledges as $index => $reg)
                            <tr>
                                <th>{{ $reg->id }}</th>
                                <td> {{ $reg->judul }} </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ $reg->file_path }}" target="_blank">{{ $reg->file_size }} MB</a>
                                </td>
                                <td>
                                    <button class="btn btn-primary" onclick="edit({{ $reg->id }})">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-secondary" onclick="deleteModal({{ $reg->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $knowledges->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <dialog id="my_modal" class="modal">
        <form id="knowledge_form" method="POST" enctype="multipart/form-data" class="modal-box max-w-6xl bg-gray-600 text-white"
            action="{{ route('knowledges.store') }}">
            @csrf
            @method('PATCH')
            <h2 class="font-semibold my-2 text-xl"> <span id="operation">Tambah</span> Knowledge</h2>
            <div class="divider divider-neutral mb-4"></div>
            <div class="flex flex-col mb-6">
                <div class="mt-4">
                    <p class="text-white">Judul</p>
                    <input type="text" name="judul" id="judul"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Deskripsi</p>
                    <textarea name="description" id="description" cols="30" rows="10" class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none"></textarea>
                </div>
                <div class="mt-4">
                    <p class="text-white">File</p>
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
                    <input type="hidden" name="_method" id="delete_method" value="DELETE">
                    <!-- if there is a button in form, it will close the modal -->
                    <span method="dialog">
                        <button type="button" onclick="closeDeleteModal()" class="btn btn-neutral mr-3">cancel</button>
                    </span>
                    <button type="submit" class="btn btn-primary" >ya</button>

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
            $('#knowledge_form').prop('action', '{{ route('knowledges.store') }}');
            $('input[name="_method"]').val('POST');
        }

        function edit(idKnowledge) {
            $('#operation').html("Perbarui");
            axios.get('{{ route('knowledges.index') }}/' + idKnowledge).then(resp => {
                resp = resp.data;
                $('#judul').val(resp.judul);
                $('#description').val(resp.description);

                $('#knowledge_form').prop('action', '{{ route('knowledges.index') }}/' + idKnowledge);
                $('input[name="_method"]').val('PATCH');

                document.getElementById('my_modal').classList.add('modal-open');
            })

        }

        function deleteModal(idKnowledge){
            $('#delete_method').val("DELETE");
            $('#delete_form').prop('action', '{{ route('knowledges.index') }}/' + idKnowledge)
            $('#delete_modal').addClass('modal-open');
        }

        function closeDeleteModal() {
            $('#delete_modal').removeClass('modal-open');
        }
    </script>
@endsection
