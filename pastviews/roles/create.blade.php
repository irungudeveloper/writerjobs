@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-10 m-3 p-3 bg-white">
            <form>
                @csrf

                <div class="form-group row">
                    <label for="name">Role</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>

                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">

                       <button class="btn btn-solid btn-success" id="submit">SUBMIT <img width="20px" height="20px" src=" {{ asset('images/loaders/black_hole_spinner.gif') }} " style="display: none;" id="loader"></button>
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
            $('#submit').on('click',function(e)
            {   

                $('#loader').show();
                e.preventDefault();
                console.log('Prevented');

                var name = $('#name').val();

                $.ajax(
                {
                    url:'{{ route("roles.store") }}',
                    method:'POST',
                    dataType:'json',
                    data:{
                            '_token':'{{csrf_token()}}',
                            name:name,
                    },
                    success:function(response)
                    {
                        $('#loader').hide();

                        if (response[0].response_code == 201) 
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