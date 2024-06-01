@extends('cms.master_cms')

@section('content')
    <div class="flex flex-col w-full mt-6 bg-card-dashboard border border-blue-950 p-6">
        <div class="flex flex-col mb-3">
            <div class="w-1/6 text-white">
                <p class="text-xl">Users</p>
            </div>

            <form action="" class="bg-gray-900 px-4 py-6 my-6">
                {{-- @csrf --}}
                <!-- <p class="text-lg mb-7 font-semibold text-white">Search</p> -->
                <div class=" w-full grid grid-cols-3 gap-4 rounded-xl">
                    <div>
                        <p class="text-white">Username</p>
                        <input type="text" name="username" value="{{ request('username') }}"
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div>
                        <p class="text-white">Name</p>
                        <input type="text" name="name" value="{{ request('name') }}"
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div>
                        <p class="text-white">NIP</p>
                        <input type="text" name="nip" value="{{ request('nip') }}"
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div>
                        <p class="text-white">Jabatan</p>
                        <input type="text" name="jabatan" value="{{ request('jabatan') }}"
                            class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    </div>
                    <div>
                        <p class="text-white">Role</p>
                        <input type="text" name="role" value="{{ request('role') }}"
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
                Tambah User
            </button>

        </div>
        <div class="w-full">
            <div class="overflow-x-auto text-white w-full">
                <table class="table border w-full mb-3">
                    <thead>
                        <tr class="text-white ">
                            <th></th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>NIP</th>
                            <th>Role</th>
                            <th>Jabatan</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $usr)
                            <tr>
                                <th>{{ $usr->id }}</th>
                                <td class="w-1/6 text-wrap"> {{ $usr->username }} </td>
                                <td> {{ $usr->name }} </td>
                                <td> {{ $usr->nip }} </td>
                                <td> {{ $usr->role->role_name }} </td>
                                <td class="w-1/6 text-wrap"> {{ $usr->jabatan }} </td>
                                <td>
                                    <div class="avatar">
                                        <div class="w-10 rounded-full">
                                            <img
                                                src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-primary" onclick="edit({{ $usr->id }})">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <dialog id="my_modal" class="modal">
        <form id="user_form" method="POST" enctype="multipart/form-data" class="modal-box max-w-6xl bg-gray-600 text-white"
            action="{{ route('users.store') }}">
            @csrf
            @method('PATCH')
            <h2 class="font-semibold my-2 text-xl"><span id="operation">Tambah</span> user</h2>
            <div class="divider divider-neutral mb-4"></div>
            <div class="flex flex-col mb-6">
                <div class="mt-4">
                    <p class="text-white">Username</p>
                    <input type="text" name="username" id="username"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Name</p>
                    <input type="text" name="name" id="name"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Email</p>
                    <input type="email" name="email" id="email"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">NIP</p>
                    <input type="text" name="nip" id="nip"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Password</p>
                    <input type="password" name="password" id="password"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Tanggal Lahir</p>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Tanggal Masuk</p>
                    <input type="date" name="tgl_masuk" id="tgl_masuk"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Tanggal Keluar</p>
                    <input type="date" name="tgl_keluar" id="tgl_keluar"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Role</p>
                    <select name="role_id"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                        @foreach ($roles as $rl)
                            <option value="{{ $rl->id }}">{{ $rl->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <p class="text-white">Jabatan</p>
                    <select name="jabatan"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                        @foreach ($jabatans as $jbt)
                            <option value="{{ $jbt->jabatan }}">{{ $jbt->jabatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <p class="text-white">Foto</p>
                    <input type="file" name="foto"
                        class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
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
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <form method="dialog">
                        <button onclick="delete_modal.closeModal()" class="btn btn-neutral mr-3">cancel</button>
                    </form>
                    <button class="btn btn-primary" onclick="delete_modal.closeModal()">ya</button>

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
            $('#user_form').prop('action', '{{ route("users.store") }}');
            $('input[name="_method"]').val('POST');
        }

        function edit(idUser) {
            axios.get('{{ route('users.index') }}/' + idUser).then(resp => {
                resp = resp.data;
                $('#operation').html("Perbarui");
                $('#username').val(resp.username);
                $('#name').val(resp.name);
                $('#email').val(resp.email);
                $('#nip').val(resp.nip);
                $('#tgl_lahir').val(resp.tgl_lahir);
                $('#tgl_masuk').val(resp.tgl_masuk);
                $('#tgl_keluar').val(resp.tgl_keluar);

                $('#user_form').prop('action', '{{ route("users.index") }}/' + idUser);
                $('input[name="_method"]').val('PATCH');

                document.getElementById('my_modal').classList.add('modal-open');
            })

        }
    </script>
@endsection
