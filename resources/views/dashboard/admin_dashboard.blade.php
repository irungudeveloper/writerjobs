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
                <span class="info-box-number"> {{ $jobs }} </span>
          </div>
        </div>
        </div>
        <div class="col-4 p-2">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-envelope"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Subscribers</span>
                <span class="info-box-number"> {{ $subs }} </span>
            </div>
        </div>
        </div>
        <div class="col-4 p-2">
             <div class="info-box">
                  <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Applications</span>
                    <span class="info-box-number">1,410</span>
              </div>
        </div>
        </div> 
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col-5 bg-white p-5 m-1">
            <p>Graph Lies Here</p>
        </div>
        <div class="col-6 bg-white p-5 m-1">
            <p>Another graph here</p>
        </div>
    </div>

@stop
