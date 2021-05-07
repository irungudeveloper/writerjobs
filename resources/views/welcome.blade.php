
  @extends('master')
  @section('content')   

     <div class="row m-0 p-0 hero-section">
      <img src="{{asset('images/landing_page/background_header.jpeg')}}" style="width: 100%; height: 80vh; filter: brightness(50%);">
    </div> 
   
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
   
    <div class="row m-3 p-2 mt-3 bg-white">
      <div class="col-12">
        <h3><u>Questions</u></h3>
        <div class="row">
          @foreach($question as $data)
            <div class="col-4">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <p><u><b> {{ $data->question }}</b></u></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <h4>Choices</h4>
                        <div class="row">
                          @foreach($data->option as $option)
                              <div class="col-6">
                                <p>A: {{ $option->option_a }} </p>
                              </div>
                              <div class="col-6">
                                <p>B: {{ $option->option_b }} </p>
                              </div>
                              <div class="col-6">
                                <p>C: {{ $option->option_c }} </p>
                              </div>
                              <div class="col-6">
                                <p>D: {{ $option->option_d }} </p>
                              </div>
                           @endforeach
                        </div>
                    </div>
                  </div>
                  <div class="row">

                    <div class="col-12">
                      
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  @if(Auth::user())
                    <a href=" {{ route('answer.single',$data->id) }} " class="btn btn-success pl-3 pr-3">VIEW ANSWER</a>       
                  @else
                    <a href="/pay/100/{{$data->id}}" class="btn btn-info pl-3 pr-3">Pay 100 To View Answer</a>  
                  @endif
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
            
              @can('administrator')

              @else
                <div class="card-footer text-center bg-white">
                   <a href=" {{ route('pay.sub', $data->id ) }} " class="btn btn-solid btn-info">Subscribe</a>
               </div>
              @endcan
            
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

  