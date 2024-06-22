@extends('intranet.master_intranet')

@section('content')
    <div id="example">
        <example-component></example-component>
    </div>
    Test
@endsection

@section('reactjsscript')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
