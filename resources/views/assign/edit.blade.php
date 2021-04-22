@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-10 m-3 p-3 bg-white">
            <h4 class="text-center"><u>Job Posting Details</u></h4>
            <div class="row">
                <div class="col-3">
                    <img src="/images/jobs/{{ $application->job->image }}" style="width: 100%; height: 30vh;">
                </div>
                <div class="col-9">
                    <p><b>Title:</b> {{ $application->job->title }} </p>
                    <p><b>Amount:</b> {{ $application->job->amount }} </p>
                    <p><b>Deadline:</b> {{ $application->job->deadline }} </p>
                    <p><b>Description:</b> {{ $application->job->description }} </p>
                </div>
            </div>
            <h4 class="text-center"><u>Applicant Details</u></h4>
            <div class="row">
                <div class="col-12">
                    <p><b>Name:</b> {{ $application->user->name }} </p>
                    <p><b>Email:</b> {{ $application->user->email }} </p>
                    <p><b>Telephone:</b> 070000000 </p>
                    <p><b>Application Date:</b> {{$application->created_at}} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-solid btn-info" id="confirm">Confirm Assignment</button>
                <input type="hidden" name="app_id" id="app_id" value=" {{ $application->id }} ">
                <input type="hidden" name="job_id" id="job_id" value=" {{ $application->job->id }} " >
                <input type="hidden" name="user_id" id="user_id" value=" {{ $application->user->id }} " >

                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
   <script type="text/javascript">
       $(document).ready(function()
       {
            $('#confirm').on('click',function(e)
            {
                e.preventDefault();
                console.log('Prevented');

                var app_id = $('#app_id').val();
                var job_id = $('#job_id').val();
                var user_id = $('#user_id').val();

                $.ajax(
                {
                    url:' {{ route("assign.store") }} ',
                    type:'POST',
                    dataType:'json',
                    data:{
                        '_token':" {{ csrf_token() }} ",
                        app_id:app_id,
                        job_id:job_id,
                        user_id:user_id,
                    },
                    success:function(response)
                    {
                        console.table(response);
                    },
                    error:function(msg)
                    {
                        console.table(msg);
                    }
                });

            });
       });
   </script>
@stop