<div class="overflow-x-auto text-white w-full">
    <table class="table border rounded-2xl w-full mb-3">
        <thead class="">
            <tr class="text-white ">
                <th></th>
                <th>Username</th>
                <th>Name</th>
                <th>NIP</th>
                <th>Divisi</th>
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
                    <td> {{ $usr->divisi }} </td>
                    <td class="w-1/6 text-wrap"> {{ $usr->jabatan }} </td>
                    <td>
                        <div class="avatar">
                            <div class="w-10 rounded-full">
                                <img src="{{ $usr->image_user }}"
                                    onerror="this.src='https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg'" />
                            </div>
                        </div>
                    </td>
                    <td>
                        @if (Auth::user()->role->role_name == \App\Enums\RoleAdminEnum::SUPER_ADMIN ||
                                Auth::user()->id == $usr->id ||
                                $usr->role->role_name != \App\Enums\RoleAdminEnum::SUPER_ADMIN)
                            <button class="btn btn-primary" onclick="edit({{ $usr->id }})">
                                Edit
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->appends(request()->query())->links('vendor.pagination.tailwind') }}
</div>
