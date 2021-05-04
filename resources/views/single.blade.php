@extends('master')
@section('content')
    <div class="row m-0 pt-3 m-3 mt-5 bg-white">
      <div class="col-12">
        <h3 class="text-center"><u>Question & Answer</u></h3>
        <div class="col-12">
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <img src="{{asset('images/'.$answer->image)}}" style="width: 100%; height: 40vh;">
              </div>
              <div class="col-8">
                <p>Question: {{ $answer->question }} </p>
                <p> Answer: {{ $answer->answer }}  </p>

                <div class="row pt-5 justify-content-end">
                  <div class="col-4">
                    <p class="text-end text-warning">Leave a rating for this answer:</p>
                  </div>
                    <div class="rating col-3">
                      <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                      <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                      <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                      <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                      <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                    </div>
                    <div class="col-12 text-start">
                      <a href="/"><i class="fas fa-arrow-left"> Go Back</i></a>
                    </div>
                </div>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row m-0 pt-3 m-3 mt-5 bg-white">
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

