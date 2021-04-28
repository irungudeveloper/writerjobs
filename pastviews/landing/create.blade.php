<!DOCTYPE html>
<html>
<head>
  <title>Andikwa Kazi</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href=" {{ asset('css/custom.css') }} ">
</head>
<body class="jumbotron jumbotron-fluid">

  <div class="preloader"></div>
    
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand" href="#"> <img src=" {{ asset('images/landing_page/andika_logo.png') }} " style="width: 50px; height: 50px;" class="rounded-circle"> KAZI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="#">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="#">Testimonials</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="#">Blog</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link mr-5" href="#">Contact</a>
                </li>
                @if (Route::has('login'))
                    @auth
                      <li class="nav-item">
                        <a href="{{ url('/home') }}" class="btn btn-outline-primary rounded-pill ml-5">Dashboard</a>
                      </li>
                    @else
                      <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn mr-1 btn-outline-primary rounded-pill ml-5">LOGIN</a>
                      </li>
                    @endauth
                
            @endif
            </ul>
        </div>

    </nav>

   <div class="row m-0 p-0 mt-4 justify-content-center">
     <div class="col-10 bg-white p-2">
       <h4> Thank you for picking the {{ $package->title }} . Fill out the form below to complete your subscription </h4>

       <form class="border border-2 p-2">
          <h4 class="text-center mb-3"><u>ACCOUT CREATION FORM</u></h4>
          <fieldset>
         <div class="form-group row">
            <div class="col-6">
              <label>Name</label>
              <input type="text" name="user_name" id="user_name" class="form-control">
            </div>
             <div class="col-6">
              <label>Email</label>
              <input type="email" name="user_email" id="user_email" class="form-control">
            </div>
         </div>
         <div class="form-group row">
            <div class="col-12">
              <label>Password</label>
              <input type="password" name="user_password" id="user_password" class="form-control">
            </div>
         </div>

         <div class="form-group row">
            <div class="col-12">
              <label>Retype Password</label>
              <input type="password" name="retype" id="retype" class="form-control">
            </div>
         </div>
        
        <div class="form-group row">
          <div class="col-12 text-center">
            <button class="btn btn-success" id="create">CREATE ACCOUNT <img src="/images/loaders/black_hole_spinner.gif" width="20px" height="20px" id="loader" style="display: none;"> </button>
          </div>
        </div>
          </fieldset>
       </form>

     </div>
   </div>

</body>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">

    window.onload = function(){
      $('.preloader').fadeOut('slow');
    }

    $(document).ready(function(e)
    {
      
      $('#create').on('click',function(e)
      {
        e.preventDefault();

        $('#loader').show();

        var password = $('#user_password').val();
        var retype = $('#retype').val();
        var name = $('#user_name').val();
        var email = $('#user_email').val();

        if (password == retype) 
        {
          console.log('Match');

          $.ajax(
          {
            url:" {{ route('landing.store') }} ",
            type:'POST',
            dataType:'json',
            data:{
                '_token':" {{ csrf_token() }} ",
                name:name,
                email:email,
                password:password,

            },
            success:function(response)
            {
              console.table(response);
              $('#loader').hide();
              swal("Done","Your Account Has Been Created, Proceed to login to your account","success");
            },
            error:function(msg)
            {
              console.table(msg);
            }
          });

        }
        else
        {
          console.log('No match');
        }

      });

    });
  </script>

</html>


<!------ Include the above in your HEAD tag ---------->

  