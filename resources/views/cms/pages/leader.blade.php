@extends('cms.master_cms')

@section('content')
    <div class="flex flex-col w-full mt-6 bg-card-dashboard border border-blue-950 p-6">
        <div class="flex flex-col mb-3">
            <div class="w-1/6 text-white">
                <p class="text-xl">Leader</p>
            </div>

            <form action="" class="bg-gray-900 px-4 py-6 my-6">
                <div class=" w-full grid grid-cols-3 gap-4 rounded-xl">
                    <div>
                        <p class="text-white">Name</p>
                        <input type="text" name="name" value="{{ request('name') }}"
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div>
                        <p class="text-white">Divisi</p>
                        <input type="text" name="divisi" value="{{ request('divisi') }}"
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
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
                Tambah Leader
            </button>

        </div>
        <div class="w-full">
            <div class="overflow-x-auto text-white w-full">
                <table class="table border w-full mb-3">
                    <thead>
                        <tr class="text-white ">
                            <th></th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaders as $index => $lead)
                            <tr>
                                <th>{{ $index+1 }}</th>
                                <td> {{ $lead->user->name }} </td>
                                <td>{{ $lead->divisi }}</td>
                                <td>
                                    <button class="btn btn-primary" onclick="edit({{ $lead->id }})">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-secondary text-white"
                                        onclick="deleteModal({{ $lead->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $leaders->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <dialog id="my_modal" class="modal">
        <form id="regulasi_form" method="POST" enctype="multipart/form-data"
            class="modal-box max-w-6xl bg-gray-600 text-white" action="{{ route('leaders.store') }}">
            @csrf
            @method('PATCH')
            <h2 class="font-semibold my-2 text-xl"> <span id="operation">Tambah</span> Leader</h2>
            <div class="divider divider-neutral mb-4"></div>
            <div class="flex flex-col mb-6">
                <div class="mt-4">
                    <p class="text-white">User</p>
                    <input type="text" list="users" name="user_id" id="user_id"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                        <datalist id="users">
                            @foreach ($users as $usr)
                                <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                            @endforeach
                        </datalist>
                </div>
                <div class="mt-4">
                    <p class="text-white">Divisi</p>
                    <select required name="divisi"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                        @foreach ($divisis as $div)
                            <option value="{{ $div }}">{{ $div }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <p class="text-white">Deskripsi</p>
                    <textarea name="description" id="description" cols="30" rows="10"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none"></textarea>
                </div>
                {{-- <div class="mt-4">
                    <p class="text-white">File</p>
                    <input type="file" name="file"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div> --}}
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
            $('#regulasi_form').prop('action', '{{ route('leaders.store') }}');
            $('input[name="_method"]').val('POST');
        }

        function edit(idLeader) {
            $('#operation').html("Perbarui");
            axios.get('{{ route('leaders.index') }}/' + idLeader).then(resp => {
                resp = resp.data;
                $('#user_id').val(resp.user_id);
                $('#divisi').val(resp.divisi);
                $('#description').val(resp.description);

                $('#regulasi_form').prop('action', '{{ route('leaders.index') }}/' + idLeader);
                $('input[name="_method"]').val('PATCH');

                document.getElementById('my_modal').classList.add('modal-open');
            })

        }

        function deleteModal(idLeader) {
            $('#delete_form').prop('action', '{{ route('leaders.index') }}/' + idLeader)
            $('#delete_modal').addClass('modal-open');
        }

        function closeDeleteModal() {
            $('#delete_modal').removeClass('modal-open');
        }
    </script>
@endsection
