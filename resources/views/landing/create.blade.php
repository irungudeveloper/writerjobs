<!DOCTYPE html>
<html>
<head>
  <title>Andikwa Kazi</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body class="jumbotron jumbotron-fluid">

   <div class="row m-0 p-0 justify-content-center">
     <div class="col-10 bg-white p-2">
       <h4> Thank you for picking the {{ $package->title }} . Fill out the form below to complete your subscription </h4>

       <form class="border border-2 p-2">
          <h4 class="text-center mb-2">ACCOUT CREATION FORM</h4>
          <fieldset>
         <div class="form-group row">
            <div class="col-12">
              <label>Name</label>
              <input type="text" name="user_name" id="user_name" class="form-control">
            </div>
         </div>

         <div class="form-group row">
            <div class="col-12">
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
            <button class="btn btn-success" id="create">CREATE ACCOUNT</button>
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

  <script type="text/javascript">
    $(document).ready(function(e)
    {
      
      $('#create').on('click',function(e)
      {
        e.preventDefault();

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

  