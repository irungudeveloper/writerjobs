@extends('master')
@section('content')
	
	<div class="row m-3 mt-3 bg-white p-2">
		<div class="col-12">
			@foreach($question as $data)
				<h4 class="text-center"> {{ $data->name }} </h4>

				<div class="row">
					
				
				@foreach($data->answer as $answer)

					<div class="col-3 p-3">
		              <div class="card">
		                <div class="card-header">
		                  <img src="{{ asset('images/'.$answer->image)}}" style="width: 100%; height: 30vh;">
		                </div>
		                <div class="card-body">
		                  <p><b>{{ $answer->question }} </b> </p>
		                </div>
		                <div class="card-footer text-center">
		                  @auth
		                  <a class="btn btn-solid btn-success" href=" {{ route('answer.single', $answer->id) }} ">View Answer</a>
		                  @else
		                  <a class="btn btn-solid btn-primary" href=" {{ route('pay.singlepay', [$answer->price,$answer->id]) }} ">Pay {{ $answer->price }} to view answer</a>
		                  @endauth
		                </div>
		              </div>
		            </div>

				@endforeach
				</div>

			@endforeach
		</div>
	</div>

@endsection