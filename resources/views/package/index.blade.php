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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th></th>
                </thead>

                    @foreach($package as $data)
                    <tr>
                        <td> {{ $data->id }} </td>
                        <td> {{ $data->title }} </td>
                        <td> {{ $data->description }} </td>
                        <td> {{ $data->amount }} </td>
                        <td> 
                            <div class="row">
                                    <div class="col-5 col-sm-12 col-md-2 col-lg-2 pr-4">
                                        <a class="btn btn-outline-info rounded-circle" href=" {{ route('subpackage.edit',$data->id) }} ">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                   
                                    <div class="col-5 col-sm-12 col-md-2 col-lg-2 pl-4">
                                        <form action=" {{ route('subpackage.destroy',$data->id ) }} " method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger rounded-pill"/>
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                        
                        </td>
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