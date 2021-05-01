<!DOCTYPE html>
<html>
<head>
  <title>JIBU</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href=" {{ asset('css/custom.css') }} ">
</head>
<body class="alert-secondary">

  <div class="preloader"></div>
    
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand" href="#"> <img src="{{asset('images/landing_page/andika_logo.png')}}" style="width: 50px; height: 50px;" class="rounded-circle"> JIBU</a>
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

    <div class="row m-0 p-0 hero-section">
      <img src="{{asset('images/landing_page/background_header.jpeg')}}" style="width: 100%; height: 80vh; filter: brightness(50%);">
    </div>

    <div class="row m-3 mt-3 bg-white p-2">
      <div class="col-12 p-2">
        <h4 class="text-center mt-3"><u>Pay {{ $price }} through</h4>

        <div class="row m-0">
          <div class="col-6 text-center">
            <div class="row justify-content-center">
              <div class="col-12 p-3">
                <a href="#" ><img src=" {{ asset('images/landing_page/paypal.png') }} " style="width:100px; height: 100px;"></a>
             </div>
            </div>
            
          </div>
          <div class="col-6 text-center">
            <div class="row justify-content-center">
              <div class="col-12 p-3">
                <a href="#" ><img src=" {{ asset('images/landing_page/mpesa.png') }} " style="width:150px; height: 100px;"></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row m-3 mt-3 bg-white p-2 ">
      <div class="col-12 text-center">
        <a class="btn btn-solid btn-success" href=" {{ route('answer.single', $id) }} ">View Answer</a>
      </div>
    </div>

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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.332057737132!2d36.94334855!3d-1.2733727499999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f6b4dad04f973%3A0xe3f83d3a5488222c!2sAssumption%20High%20School%20Corradini%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1619827257706!5m2!1sen!2ske" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
  <script src='https://cdn.tiny.cloud/1/kxqq67o3mcu65boxzctvtlv4sjsjzenp4dyiu6iqrtlucr66/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
    
  <script type="text/javascript">
    
    window.onload = function()
    {
      $('.preloader').fadeOut('slow');
    }

  </script>

</html>


<!------ Include the above in your HEAD tag ---------->

  