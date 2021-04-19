@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-10 m-3 p-3 bg-white">
            <form>
                @csrf

                <input type="hidden" name="id" id="id" value=" {{ $roles->id }} ">

                <div class="form-group row">
                    <label for="name">Role</label>
                    <input type="text" class="form-control" name="name" id="name" value=" {{ $roles->name }} ">
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-solid btn-success" id="update">Update Role <img width="20px" height="20px" src=" {{ asset('images/loaders/black_hole_spinner.gif') }} " style="display: none;" id="loader"></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript">

        $(document).ready(function(e)
        {
            $('#update').on('click',function(e)
            {   

                $('#loader').show();
                e.preventDefault();
                console.log('Prevented');

                var name = $('#name').val();
                var id = $('#id').val();

                $.ajax(
                {
                    url:'{{ route("roles.update",'id') }}',
                    method:'PUT',
                    dataType:'json',
                    data:{
                            '_token':'{{csrf_token()}}',
                            id:id,
                            name:name,
                    },
                    success:function(response)
                    {
                        $('#loader').hide();

                        if (response[0].response_code == 200) 
                        {
                            swal.fire("Done!", response[0].response_message , "success");
                        }
                        else
                        {
                            swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response[0].response_message,
                                        footer: '<a href="#">Why do I have this issue?</a>'
                                     });
                        }
                    },
                    error:function(msg)
                    {
                        $('#loader').hide();
                        swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something Went wrong!!' ,
                                        footer: '<a href>Why do I have this issue?</a>'
                                     });
                        console.log(msg);
                    }
                });

            });
        });
    </script>
@stop