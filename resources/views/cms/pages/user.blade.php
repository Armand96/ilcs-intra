@extends('cms.master_cms')

@section('content')
    <div class="flex flex-col w-full mt-6 bg-card-dashboard border border-blue-950 p-6">
        <div class="flex justify-between mb-3">
            <div class="w-1/6 text-white">
                <p class="text-xl">Users</p>
            </div>
        </div>
        <div class="w-full">
            <div class="overflow-x-auto text-white w-full">
                <table class="table border w-full">
                    <thead>
                        <tr class="text-white">
                            <th></th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>NIP</th>
                            <th>Role</th>
                            <th >Jabatan</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $usr)
                            <tr>
                                <th>{{ $index + 1 }}</th>
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
                                    <button class="btn btn-primary">
                                        Edit
                                    </button>
                                    <button class="btn btn-secondary">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
