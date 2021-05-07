@extends('master')
@section('content')   
<!DOCTYPE html>
<html>
<head>
  <title>JIBU</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href=" {{ asset('css/custom.css') }} ">
</head>
<body class="m-0">
    
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

    <div class="container p-5">
      <div class="row m-3 mt-3 bg-white p-2">
      <div class="col-12 p-2">
        <h4 class="text-center mt-3"><u>Pay {{ $price }} through</h4>

        <div class="row m-0">
          <div class="col-12 text-center">
            <div class="row justify-content-center">
              <div class="col-12 p-3">
                <a href="#" ><img src=" {{ asset('images/landing_page/paypal.png') }} " style="width:100px; height: 100px;"></a>
             </div>
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

   @endsection

<!------ Include the above in your HEAD tag ---------->

  