@extends('master')
  @section('content')   

    <div class="row m-0 mb-5">
     
    </div>
    
    <div class="container-fluid mt-5 pt-5 mb-4">
      <div class="row mt-3 justify-content-center">
        <div class="col-10">
          <div class="card">
            <div class="card-header ">
              <h4><u>Question: {{ $answer->question->question }} </u></h4>
              <div class="row">
                @foreach($answer->question->option as $option)
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
            <div class="card-body">
              <p>Answer: {{ $answer->answer }} </p>
              <p>Explanation: {{ $answer->explanation }} </p>
            </div>
          </div>
        </div>        
      </div>
    </div>
     
@endsection


