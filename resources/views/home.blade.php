@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h3 class="text-center">AVAILABLE JOBS</h3>
        </div>
        @foreach($jobs as $data)
            <div class="card col-3 border-0 m-2">
                <div class="card-header">
                    <img src="/images/jobs/{{$data->image}}" style="width: 100%; height: 10vh;">
                </div>
                <div class="card-body">
                    <p><b>Title:</b> {{ $data->title }} </p>
                    <p><b>Amount:</b> {{ $data->amount }} </p>
                    <p><b>Deadline:</b> {{ $data->deadline }} </p>
                    <p><b>Description:</b> {{ $data->description }} </p>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-info rounded-pill">APPLY FOR JOB</a>
                </div>
            </div>
        @endforeach
    </div>
@stop
