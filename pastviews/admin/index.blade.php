@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-11 bg-white p-3">
            <table id="myTable" class="table table-stripped table-responsive-md table-responsive-sm">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </thead>

                    @foreach($subs as $data)
                    <tr>
                        <td> {{ $data->id }} </td>
                        <td> {{ $data->name }} </td>
                        <td> {{ $data->email }} </td>
                        <td> {{ $data->created_at }} </td>
                       
                    </tr>
                    @endforeach
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">
        $('#myTable').DataTable();
    </script>
@endsection