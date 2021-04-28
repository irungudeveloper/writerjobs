@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-4 p-2">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Postings</span>
                <span class="info-box-number"> 0 </span>
          </div>
        </div>
        </div>
        <div class="col-4 p-2">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Your Applications</span>
                <span class="info-box-number"> 0 </span>
            </div>
        </div>
        </div>
        <div class="col-4 p-2">
             <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Pending Jobs</span>
                    <span class="info-box-number">1,410</span>
              </div>
        </div>
        </div> 
    </div>

    <div class="row p-2 bg-white">
        <div class="col-12 ">
            <h3 class="text-center">AVAILABLE JOBS</h3>
        </div>
        @foreach($jobs as $data)
            <div class="card col-3 border-0 m-2">
                <div class="card-header">
                    <img src="/images/jobs/{{$data->image}}" style="width: 100%; height: 20vh;">
                </div>
                <div class="card-body">
                    <p><b>Title:</b> {{ $data->title }} </p>
                    <p><b>Amount:</b> {{ $data->amount }} </p>
                    
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('application.show',$data->id ) }}" class="btn btn-info rounded-pill">VIEW JOB DETAILS</a>
                </div>
            </div>
        @endforeach
    </div>
@stop
