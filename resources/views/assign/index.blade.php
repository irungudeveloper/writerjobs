@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')

  
    <div class="row justify-content-center mt-2">
        <div class="col-11 bg-white p-3">
            <h3 class="text-center">Pending Job Assignments</h3>
            <table id="myTable" class="table table-stripped table-responsive-md table-responsive-sm table->sm">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Applicant Name</th>
                    <th scope="col">Applied On</th>
                    <th scope="col"></th>
                </thead>

                    @foreach($application as $data)
                    <tr scope="row">
                        <td> {{ $data->id }} </td>
                        <td> {{ $data->job->title }} </td>
                        <td> {{ $data->user->name }} </td>
                        <td> {{ $data->created_at }} </td>
                        <td> 
                           <a href=" {{ route('assign.show',$data->id) }} " class="btn btn-info rounded-pill">VIEW MORE DETAILS</a>
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