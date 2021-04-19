@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-10 m-3 p-3 bg-white">
            <form method="post" enctype="multipart/form-data" action="{{route('jobs.store')}}">
                @csrf

                <div class="form-group row">
                    <label for="title" class="col-3">Title: </label>
                    <input type="text" name="title" id="title" class="form-control col-9">
                </div>
                
                <div class="form-group row">
                    <label for="image" class="col-3">Image: </label>
                    <input type="file" name="image" id="image" class="form-control col-9">
                </div>

                <div class="form-group row">
                    <label for="description" class="col-3">Description: </label>
                    <textarea class="form-control col-9" id="description" name="description">
                        
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