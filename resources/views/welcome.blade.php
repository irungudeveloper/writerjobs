<!DOCTYPE html>
<html>
<head>
  <title>ANDIKA</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href=" {{ asset('css/custom.css') }} ">
</head>
<body>

  <div class="preloader"></div>
    
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand" href="#"> <img src="images/landing_page/andika_logo.png" style="width: 50px; height: 50px;" class="rounded-circle"> KAZI</a>
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
      <img src="images/landing_page/background_header.jpeg" style="width: 100%; height: 80vh; filter: brightness(50%);">
    </div>

    <div class="row mt-4 m-0 p-0">
      <div class="col-12 text-center">
        <h3 class="text-center"><u>Our Mission</u></h3>
        <p>We work towards giving you the opportunity to choose what you work on where you work and total time flexibility all without hustling looking for work</p>
        <p>We do the hustling for you at a fair price! Check our rates below!!</p>
      </div>

        <div class="col-12 mt-4 p-0 m-0">
          <h3 class="text-center"><u>How It Works</u></h3>
          <div class="row mt-2 m-0 p-0">
            <div class="card col-3 border-0">
              <div class="card-header text-center display-4 border-0 bg-white">
                  <i class="fa fa-search" style="color: #0d42e1;"></i>
              </div>
              <div class="card-body">
                <p>Find The Job You Want To Work On</p>
              </div>
            </div>
             <div class="card col-3 border-0">
              <div class="card-header text-center display-4 border-0 bg-white">
                  <i class="fas fa-hand-holding-usd" style="color: #05db1b;"></i>
              </div>
              <div class="card-body">
                <p>Pay A Coommision To Get Further Details Of The Job </p>
              </div>
            </div>
             <div class="card col-3 border-0">
              <div class="card-header text-center display-4 border-0 bg-white">
                  <i class="fas fa-network-wired" style="color: #230284;"></i>
              </div>
              <div class="card-body">
                <p>Get The Job Assigned To You</p>
              </div>
            </div>
             <div class="card col-3 border-0">
              <div class="card-header text-center display-4 border-0 bg-white">
                  <i class="far fa-handshake" style="color: #0fd267;"></i>
              </div>
              <div class="card-body">
                <p>Full Payment Upon Completion</p>
              </div>
            </div>
          </div>
        </div>

    </div>

    <div class="row m-0 p-0 mt-5">
      <div class="col-12">
        <h3 class="text-center"><u>Testimonials</u></h3>
        <div class="row">
          <div class="col-4 p-2">
            <div class="card test">
              <div class="card-body">
                <p>This is a sample testimonial</p>
              </div>
            </div>
          </div>
           <div class="col-4 p-2">
            <div class="card test">
              <div class="card-body">
                <p>This is a sample testimonial</p>
              </div>
            </div>
          </div>
          <div class="col-4 p-2">
            <div class="card test">
              <div class="card-body">
                <p>This is a sample testimonial</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      
    </div>

    <div class="row m-0 p-0 mt-5">
      <div class="col-12">
        <h3 class="text-center"><u>Packages</u></h3>
      </div>
      @foreach($package as $data)
      <div class="col-4 p-2 test">
        <div class="card border-0 m-1"> 
        
          <div class="card-body">
            <h4 class="text-center"><u> {{ $data->title }}</u> </h4>
            <p class="text-center"><b>Amount:</b> {{ $data->amount }} </p>
            <p> {{ $data->description }} </p>
          </div>
          <div class="card-footer text-center bg-white">
            <a href=" {{ route('landing.edit',$data->id) }} " class="btn btn-solid btn-info">Subscribe</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

   <div class="row m-0 p-0 mt-5 mb-2">
      <div class="col-12">
        <h3 class="text-center"><u>Blog Post</u></h3>
        <div class="row">
          <div class="col-4 p-2">
            <div class="card test">
              <div class="card-body">
                <p>This is a sample post</p>
              </div>
            </div>
          </div>
           <div class="col-4 p-2">
            <div class="card test">
              <div class="card-body">
                <p>This is a sample post</p>
              </div>
            </div>
          </div>
          <div class="col-4 p-2">
            <div class="card test">
              <div class="card-body">
                <p>This is a sample post</p>
              </div>
            </div>
          </div>
        </div>

      </div>
      
    </div>

    <footer class="row m-0 p-0 pt-2 footer">
      <div class="col-12">
        <div class="row">
          <div class="col-4">
            <h3 class="text-center"><u>Contact Us</u></h3>
            <ul>
              <li>Telephone: 090334344</li>
              <li>Email: example@eg.com</li>
            </ul>
          </div>
           <div class="col-4">
            <h3 class="text-center"><u>Location</u></h3>
            <ul>
              <li></li>
            </ul>
          </div>
           <div class="col-4">
            <h3 class="text-center"><u>Affiliate Links</u></h3>
            <ul>
              <li>Facebook</li>
              <li>Twitter</li>
              <li>Whatsapp</li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

</body>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script type="text/javascript">
    
    window.onload = function(){
      $('.preloader').fadeOut('slow');
    }
    
  </script>

</html>


<!------ Include the above in your HEAD tag ---------->

  