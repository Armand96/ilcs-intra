@extends('cms.master_cms')

@section('content')
<div class="flex flex-col w-full mt-6 bg-card-dashboard border border-blue-950 p-6">
    <div class="flex justify-between mb-3 items-center">
        <div class="w-1/6 text-white">
            <p class="text-xl">Users</p>
        </div>
        <button onclick="my_modal.showModal()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
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
                                    <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-primary">
                                Edit
                            </button>
                            <button class="btn btn-secondary" onclick="delete_modal.showModal()">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>

<!-- Modal -->
<dialog id="my_modal" class="modal ">
    <div class="modal-box max-w-6xl bg-gray-600 text-white">
        <h2 class="font-semibold my-2 text-xl">Tambah user</h2>
        <div class="divider divider-neutral mb-4"></div>
        <div class="flex flex-col mb-6">
            <div class="mt-4">
                <p class="text-white">Username</p>
                <input type="text" class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
            </div>
            <div class="mt-4">
                <p class="text-white">Name</p>
                <input type="text" class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
            </div>
            <div class="mt-4">
                <p class="text-white">Role</p>
                <select class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    <option>Admin</option>
                    <option>Staff</option>
                    <option>SPV</option>
                    <option>Finance</option>
                </select>
            </div>
            <div class="mt-4">
                <p class="text-white">Jabatan</p>
                <select class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                    <option>Admin</option>
                    <option>Staff</option>
                    <option>SPV</option>
                    <option>Finance</option>
                </select>
            </div>
            <div class="mt-4">
                <p class="text-white">Foto</p>
                <input type="file" class="bg-login-input mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
            </div>

            <div class="mt-4">
                <p class="text-white">is active</p>
                <input type="checkbox" checked="checked" class="checkbox bg-login-input mt-4" />
            </div>
        </div>

        <div class="flex flex-row">
            <form method="dialog">
                <button onclick="my_modal.closeModal()" class="btn btn-neutral mr-3">cancel</button>
            </form>
            <button class="btn btn-primary">save</button>
        </div>
    </div>
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
