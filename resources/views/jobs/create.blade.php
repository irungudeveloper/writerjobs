@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-10 m-3 p-3 bg-white">

            <h3 class="text-center">CREATE NEW JOB</h3>

            <form method="post" enctype="multipart/form-data" action="{{route('jobs.store')}}">
                @csrf

                <div class="form-group row">
                    <label for="title">Title: </label>
                    <input type="text" name="title" id="title" class="form-control col-12">
                </div>
                
                <div class="form-group row">
                    <label for="image" >Image: </label>
                    <input type="file" name="image" id="image" class="form-control col-12">
                </div>

                <div class="form-group row">
                    <div class="col-6 p-3">
                         <div class="row">
                             <label for="amount">Amount: </label>
                             <input type="number" name="amount" id="amount" class="form-control col-12">
                         </div>
                    </div>
                     <div class="col-6 p-3">
                         <div class="row">
                             <label for="deadline" >Deadline: </label>
                             <input type="date" name="deadline" id="deadline" class="form-control col-12">
                         </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description">Description: </label>
                    <textarea class="form-control col-12" id="description" name="description">
                        
                    </textarea>
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('js')
   
@stop