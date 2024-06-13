@extends('cms.master_cms')

@section('content')
    <div class="flex flex-col w-full mt-6  bg-gray-600 p-6 rounded-xl">

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

                    </tbody>
                </table>

            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
    </script>
@endsection
