@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
    <div class="row justify-content-center p-2 bg-white">
        <div class="col-10">
            <h3 class="text-center"><u>Prospective Job Details</u></h3>
        </div>
        <div class="col-10 card">

            <div class="card-body row">
                <div class="col-3">
                    <img src="/images/jobs/{{$jobs->image}}" style="width: 100%; height: 30vh;">
                </div>
                <div class="col-9">
                    <p><b>Title:</b> {{ $jobs->title }} </p>
                    <p><b>Payout:</b> {{ $jobs->amount }} </p>
                    <p><b>Deadline:</b> {{ $jobs->deadline }} </p>
                    <p><b>Description:</b> {{ $jobs->description }} </p>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-info rounded-pill" id="apply">
                                Make Application
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div>
        <input type="hidden" name="job_id" id="job_id" value=" {{ $jobs->id }} ">
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id }} ">
    </div>

@stop

@section('js')
    <script type="text/javascript">
        //$('#myTable').DataTable();
        $('#apply').on('click',function(e)
        {
            e.preventDefault();
            console.log('Prevented');

            var user_id = $('#user_id').val();
            var job_id = $('#job_id').val();

            $.ajax({
                url:" {{ route('application.store') }} ",
                type:'POST',
                dataType:'json',
                data:{
                    '_token':" {{ csrf_token() }} ",
                    user_id:user_id,
                    job_id:job_id,
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
    </script>
@endsection