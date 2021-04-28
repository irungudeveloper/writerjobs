@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')

     @if(Session::has('message'))
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

         <!-- Alert message (start) -->
        
         <div class="alert {{ Session::get('alert-class') }}">
            {{ Session::get('message') }}
         </div>
        
         <!-- Alert message (end) -->
        </div>
    </div>
     @endif 

    <div class="row justify-content-center ">
        <div class="col-10 m-3 p-3 bg-white">

            <h3 class="text-center">UPLOAD JOB</h3>
            <h4><u>Submission Protocol</u></h4>
            <p class="text-danger">*Select the job you are submitting</p>
            <p class="text-danger">*The document should be saved in the following format <b>JOB_TITLE_YOUR_NAME</b></p>
            <p class="text-danger">*The document sould be a docx | pdf file</p>

            <form method="post" enctype="multipart/form-data" action="{{route('submit.store')}}">
                @csrf

                <div class="form-group row">
                    <label for="job">Select Job</label>
                    <select class="form-control" id="job" name="job">
                        <option>--JOB SELECT--</option>
                        @foreach($application as $data)
                            <option value=" {{ $data->job->id }} ">
                                {{ $data->job->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label for="document">Upload File</label>
                    <input type="file" name="document" id="document" class="form-control">
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