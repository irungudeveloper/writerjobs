<!DOCTYPE html>
<html>
<head>
  <title>Andikwa Kazi</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="#"> <img src="images/landing_page/andika_logo.png" style="width: 60px; height: 60px;" class="rounded-circle"> KAZI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <ul class="navbar-nav ml-auto topnav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Testimonials</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                @if (Route::has('login'))
                    @auth
                      <li class="nav-item">
                        <a href="{{ url('/home') }}" class="btn btn-outline-primary rounded-pill">Home</a>
                      </li>
                    @else
                      <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn mr-1 btn-outline-success rounded-pill">Login</a>
                      </li>
                        @if (Route::has('register'))
                          <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary rounded-pill">Register</a>
                          </li>
                        @endif
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
              <div class="card-header text-center display-4">
                  <i class="fa fa-search"></i>
              </div>
              <div class="card-body">
                <p>Find The Job You Want To Work On</p>
              </div>
            </div>
             <div class="card col-3 border-0">
              <div class="card-header text-center display-4">
                  <i class="fas fa-hand-holding-usd"></i>
              </div>
              <div class="card-body">
                <p>Pay A Coommision To Get Further Details Of The Job </p>
              </div>
            </div>
             <div class="card col-3 border-0">
              <div class="card-header text-center display-4">
                  <i class="fas fa-network-wired"></i>
              </div>
              <div class="card-body">
                <p>Get The Job Assigned To You</p>
              </div>
            </div>
             <div class="card col-3 border-0">
              <div class="card-header text-center display-4">
                  <i class="far fa-handshake"></i>
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
      </div>
      
    </div>

    <div class="row m-0 p-0 mt-5 justify-content-center text-white">
      <div class="col-12">
        <h3 class="text-center"><u>Packages</u></h3>
      </div>
      @foreach($package as $data)
        <div class="card col-3 border-0 bg-secondary m-1"> 
          <div class="card-body">
            <h4 class="text-center"><u> {{ $data->title }}</u> </h4>
            <p class="text-center"><b>Amount:</b> {{ $data->amount }} </p>
            <p> {{ $data->description }} </p>
          </div>
          <div class="card-footer text-center">
            <a href=" {{ route('landing.edit',$data->id) }} " class="btn btn-solid btn-info">Subscribe</a>
          </div>
        </div>
      @endforeach
    </div>

    <div class="row m-0 p-0 mt-5"> 
       <div class="col-12">
         <h3 class="text-center"><u>Blog Posts</u></h3>
      </div>
     
    </div>

    <footer class="row m-0 p-0 bg-dark text-white pt-2">
      <div class="col-12 text-center">
        <h3 class="text-center"><u>Contact Us</u></h3>
          <p>TEL: +254711223344</p>
          <p>EMAIL: johndoe@email.com</p>
      </div>
    </footer>

</body>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</html>


<!------ Include the above in your HEAD tag ---------->

  