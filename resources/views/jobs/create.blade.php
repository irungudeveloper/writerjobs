@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
   
@stop

@section('content')
    <div class="row justify-content-center ">
        <div class="col-10 m-3 p-3 bg-white">
             <form method="post" id="upload-image-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="file" class="form-control" id="image-input">
                    <span class="text-danger" id="image-input-error"></span>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('js')
    
    <script type="text/javascript">
        $(document).ready(function(e)
        {
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

               $('#upload-image-form').submit(function(e) {
                   e.preventDefault();
                   let formData = new FormData(this);
                   $('#image-input-error').text('');

                   $.ajax({
                      type:'POST',
                      url: ` {{ route("jobs.store") }} `,
                       data: formData,
                       contentType: false,
                       processData: false,
                       success: (response) => {

                        console.table(response);
                         // if (response) {
                         //   this.reset();
                         //   alert('Image has been uploaded successfully');
                         // }
                       },
                       error: function(response){
                          console.log(response);
                            $('#image-input-error').text(response.responseJSON.errors.file);
                       }
                   });
              });


        });
    </script>

   <!--  <script type="text/javascript">

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
    </script> -->
@stop