@extends('cms.master_cms')

{{-- @section('extrajs')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection --}}

@section('content')
    <div class="flex flex-col w-full mt-6  bg-gray-600 p-6 rounded-xl">
        <div class="flex flex-col mb-3">
            <div class="w-1/6 text-white">
                <p class="text-xl">News</p>
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
                Tambah News
            </button>

        </div>
        <div class="w-full">
            <div class="overflow-x-auto text-white w-full">
                <table class="table border w-full mb-3">
                    <thead>
                        <tr class="text-white ">
                            <th></th>
                            <th>Judul</th>
                            <th>Image Cover</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($news as $index => $nws)
                            <tr>
                                <th>{{ $nws->id }}</th>
                                <td> {{ $nws->judul }} </td>
                                <td>
                                    <div class="avatar">
                                        <div class="w-10 rounded-full">
                                            <img src="{{ url('/storage/news/' . $nws->image_cover) }}" />
                                        </div>
                                    </div>
                                </td>
                                <td class="w-1/6 text-wrap">
                                    <button class="btn btn-primary" onclick="edit({{ $nws->id }})">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="deleteModal({{ $nws->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                {{ $news->appends(request()->query())->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <dialog id="my_modal" class="modal">
        <form id="news_form" method="POST" enctype="multipart/form-data" class="modal-box max-w-6xl bg-gray-600 text-white"
            action="{{ route('news.store') }}">
            @csrf
            @method('PATCH')
            <h2 class="font-semibold my-2 text-xl"> <span id="operation">Tambah</span> News</h2>
            <div class="divider divider-neutral mb-4"></div>
            <div class="flex flex-col mb-6">
                <div class="mt-4">
                    <p class="text-white">Judul</p>
                    <input type="text" name="judul" id="judul"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">content</p>
                    <textarea name="content" id="content" cols="30" rows="100"
                        class="mt-3 px-4 py-2 w-full rounded-lg focus:outline-none"></textarea>
                </div>
                <div class="mt-4">
                    <p class="text-white">Image Cover</p>
                    <input type="file" name="foto"
                        class="bg-gray-700 mt-3 px-4 py-2 w-full rounded-lg text-login-text focus:outline-none">
                </div>
                <div class="mt-4">
                    <p class="text-white">Active</p>
                    <input type="checkbox" class="bg-gray-700 mt-3 px-4 py-2 rounded-lg text-login-text focus:outline-none"
                        name="is_active" id="is_active">
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
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .then(editor => {
                window.editor = editor; // Store the editor instance globally for later use
            })
            .catch(error => {
                console.error(error);
            });

        function closeModal() {
            document.getElementById('my_modal').classList.remove('modal-open');
        }

        function createNew() {
            $('#operation').html("Tambah");
            document.getElementById('my_modal').classList.add('modal-open');
            $('#news_form').prop('action', '{{ route('news.store') }}');
            $('input[name="_method"]').val('POST');
        }

        function edit(idNews) {
            $('#operation').html("Perbarui");
            axios.get('{{ route('news.index') }}/' + idNews).then(resp => {
                resp = resp.data;
                $('#judul').val(resp.judul);
                // $('#content').html(resp.content);
                const editor = window.editor;
                const content = resp.content;
                if (editor) {
                    editor.setData(content);
                }
                resp.is_active == 1 ? $('#is_active').prop('checked', true) : $('#is_active').prop('checked',
                    false);

                $('#news_form').prop('action', '{{ route('news.index') }}/' + idNews);
                $('input[name="_method"]').val('PATCH');

                document.getElementById('my_modal').classList.add('modal-open');
            })

        }

        function deleteModal(idNews) {
            $('#delete_form').prop('action', '{{ route('news.index') }}/' + idNews)
            $('#delete_modal').addClass('modal-open');
        }

        function closeDeleteModal() {
            $('#delete_modal').removeClass('modal-open');
        }
    </script>
@endsection
