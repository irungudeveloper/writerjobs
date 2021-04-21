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
                    <div class="col-6 p-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control col-12">
                    </div>
                    <div class="col-6 p-2">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control col-12">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <label for="description">Description</label>
                        <textarea class="col-12 form-control" name="description" id="description">
                            
                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-center">

                       <button class="btn btn-solid btn-success" id="submit">SUBMIT<img width="20px" height="20px" src=" {{ asset('images/loaders/black_hole_spinner.gif') }} " style="display: none;" id="loader"></button>
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

                var title = $('#title').val();
                var amount = $('#amount').val();
                var description = $('#description').val();

                $.ajax(
                {
                    url:'{{ route("subpackage.store") }}',
                    method:'POST',
                    dataType:'json',
                    data:{
                            '_token':'{{csrf_token()}}',
                            title:title,
                            amount:amount,
                            description:description,
                    },
                    success:function(response)
                    {
                        $('#loader').hide();
                        console.table(response)

                    },
                    error:function(msg)
                    {
                        $('#loader').hide();
                        console.table(msg);
                    }
                });

            });
        });
    </script>
@stop