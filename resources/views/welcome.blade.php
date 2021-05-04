
  @extends('master')
  @section('content')    
   
    <div class="row m-3 justify-content-center bg-white p-2">
      <div class="col-12 bg-white">
          <h4 class="text-center mt-3"><u>Need Help! Search for the question and get results</u></h4>
          <form>
            <div class="form-group row justify-content-center">
              <input type="text" name="search" class="col-9 p-2 mr-2 form-control border border-3 alert-secondary rounded-pill">
              <button class="btn btn-solid btn-success col-2">Search <i class="fas fa-search"></i></button>
            </div>
          </form>
      </div>
    </div>

    <div class="row m-3 mt-3 bg-white p-2">
      <div class="col-12 p-2">
        <h4 class="text-center mt-3"><u>All Categories</u></h4>
        <div class="row m-0 ">
          <div class="col-10">
            @foreach($category as $data)
            <a href=" {{ route('category.question',$data->id) }} " class="m-2 btn btn-outline-success rounded-pill"> {{ $data->name }} </a>
             @endforeach
          </div>       
        </div>
      </div>
    </div>

    <div class="row m-0 m-3 bg-white p-2">
      <div class="col-12 p-2">
        <h4 class="text-center"><u>Latest Q&A</u></h4>

        <div class="row m-0">
          @foreach($answer as $data)

            <div class="col-3 p-3">
              <div class="card">
                <div class="card-header">
                  <img src="images/{{$data->image}}" style="width: 100%; height: 30vh;">
                </div>
                <div class="card-body">
                  <p><b>{{ $data->question }} </b> </p>
                </div>
                <div class="card-footer text-center">
                  @auth
                  <a class="btn btn-solid btn-success" href=" {{ route('answer.single', $data->id) }} ">View Answer</a>
                  @else
                  <a class="btn btn-solid btn-primary" href=" {{ route('pay.singlepay', [$data->price,$data->id]) }} ">Pay {{ $data->price }} to view answer</a>
                  @endauth
                </div>
              </div>
            </div>

          @endforeach  
        </div>

      </div>
    </div>

    <div class="row m-3 p-2 mt-3 bg-white">
      <div class="col-12">
        <h3 class="text-center"><u>Packages</u></h3>
      </div>
     
     @foreach($sub as $data)
      <div class="col-4 p-2 test">
        <div class="card border-0 m-1"> 
        
          <div class="card-body">
            <h4 class="text-center"><u>{{ $data->name }}</u></h4>
            <p class="text-center"><b>Amount: {{ $data->amount }} </b> </p>
            <p></p>
          </div>
          <div class="card-footer text-center bg-white">
            <a href=" {{ route('pay.sub', $data->id ) }} " class="btn btn-solid btn-info">Subscribe</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

   <div class="row m-0 p-2 mt-5 mb-2 bg-white m-3">
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

  @endsection
    
<!------ Include the above in your HEAD tag ---------->

  