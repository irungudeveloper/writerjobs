<!DOCTYPE html>
<html>
<head>
  <title>JIBU</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href=" {{ asset('css/custom.css') }} ">
</head>
<body>

  <div class="preloader"></div>
    
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand" href="/"> <img src="{{asset('images/landing_page/andika_logo.png')}}" style="width: 50px; height: 50px;" class="rounded-circle"> JIBU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="/">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="/">Blog</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link mr-5" href="/">Contact</a>
                </li>
                @if (Route::has('login'))
                    @auth

                    @can('administrator')
                      <li class="nav-item">
                        <a href="{{ url('/home') }}" class="btn btn-outline-primary rounded-pill ml-5">Dashboard</a>
                      </li>
                    @endcan

                    @can('subscriber')
                      <li class="nav-item">
                        <form method="POST" action=" {{ route('logout') }} ">
                          @csrf
                          <button class="btn btn-outline-danger rounded-pillml-5">LOGOUT</button>
                        </form>
                      </li>
                    @endcan
                    @else
                      <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn mr-1 btn-outline-primary rounded-pill ml-5">LOGIN</a>
                      </li>
                    @endauth
                
            @endif
            </ul>
        </div>

    </nav>

   

    @yield('content')

    <footer class="row m-0 p-0 pt-2 footer">
      <div class="col-12">
        <div class="row">
          <div class="col-4">
            <h3 class="text-center"><u>Contact Us</u></h3>
             <ul class="list-group bg-dark">
              <li class="list-group-item bg-dark">Email: example@gmail.com</li>
              <li class="list-group-item bg-dark">Telephone: 070000000</li>
              
            </ul>
          </div>
           <div class="col-4">
            <h3 class="text-center"><u>Location</u></h3>
          </div>
           <div class="col-4">
            <h3 class="text-center"><u>Affiliate Links</u></h3>
            <ul class="list-group bg-dark">
              <li class="list-group-item bg-dark">Facebook</li>
              <li class="list-group-item bg-dark">Twitter</li>
              <li class="list-group-item bg-dark">LinkedIn</li>
            </ul>
          </div>
        </div>
      </div>
    </footer>


    
</body>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
  <script type="text/javascript">
    
    window.onload = function()
    {
      $('.preloader').fadeOut('slow');
    }

  </script>

</html>


<!------ Include the above in your HEAD tag ---------->

  