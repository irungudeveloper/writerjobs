@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')

    <div class="row">
        <div class="col-3 p-2">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Applications</span>
                <span class="info-box-number"> {{ $total }} </span>
          </div>
        </div>
        </div>
        <div class="col-3 p-2">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Pending Applications</span>
                <span class="info-box-number"> {{ $pending }} </span>
            </div>
        </div>
        </div>
        <div class="col-3 p-2">
             <div class="info-box">
                  <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Succesful Applications</span>
                    <span class="info-box-number"> {{ $approved }} </span>
              </div>
        </div>
        </div> 
        <div class="col-3 p-2">
             <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Rejected Applications</span>
                    <span class="info-box-number"> {{ $rejected }} </span>
              </div>
        </div>
        </div> 
    </div>

    <div class="row justify-content-center mt-2">
        <div class="col-11 bg-white p-3">
            <h3 class="text-center">Application Details Table</h3>
            <table id="myTable" class="table table-stripped table-responsive-md table-responsive-sm table->sm">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Job Image</th>
                    <th scope="col">Job Pay</th>
                    <th scope="col">Applied On</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </thead>

                    @foreach($application as $data)
                    <tr scope="row">
                        <td> {{ $data->id }} </td>
                        <td> {{ $data->job->title }} </td>
                        <td> <img src="/images/jobs/{{$data->job->image}}" style="width: 10vh; height: 10vh;"> </td>
                        <td> {{ $data->job->amount }}/= </td>
                        <td> {{ $data->created_at }} </td>
                        <td> 
                            @if($data->status->id == 1)
                                <p class="btn btn-warning"> {{ $data->status->name }} </p>
                            @elseif($data->status->id == 2)
                                <p class="btn btn-success"> {{ $data->status->name }} </p>
                            @elseif($data->status->id == 3)
                                <p class="btn btn-danger"> {{ $data->status->name }} </p>
                            @endif
                             
                        </td>
                        <td>
                            <div class="col-5 col-sm-12 col-md-2 col-lg-2 ml-3">
                                       
                                <button type="submit" class="btn btn-outline-danger rounded-pill" id="remove">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                
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