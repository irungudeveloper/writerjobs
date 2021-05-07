@extends('adminlte::page')
@section('title','Optiven Inventory')

@section('content_header')
@stop

@section('right-sidebar')
	<p>Content</p>
@stop

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-10 bg-white p-3">
			<h4 class="text-center">UPDATE QUESTION</h4>

			<form method="POST" action=" {{ route('question.update',$question->id) }} ">
				@csrf
				@method('PUT')
				<div class="form=group row">
					<label for="question">Question</label>
					<textarea class="form-control col-12 border border-3 border-dark" id="question" name="question">{{$question->question}}</textarea>
				</div>
				@foreach($question->option as $option)
				<div class="form-group">
					 <div class="row">
					 	<div class="col-6">
					 		<label for="A" class="col-3">A:</label>
					 		<input type="text" name="option_a" class="form-control col-12 border border-3 border-dark" id="A" value="{{$option->option_a}}">
					 	</div>
					 	<div class="col-6">
					 		<label for="B" class="col-3">B:</label>
					 		<input type="text" name="option_b" class="form-control col-12 border border-3 border-dark" id="B" value="{{$option->option_b}}">
					 	</div>
					 </div>
					 <div class="row">
					 	<div class="col-6">
					 		<label for="C" class="col-3">C:</label>
					 		<input type="text" name="option_c" class="form-control col-12 border border-3 border-dark" id="C" value="{{$option->option_c}}">
					 	</div>
					 	<div class="col-6">
					 		<label for="D" class="col-3">D:</label>
					 		<input type="text" name="option_d" class="form-control col-12 border border-3 border-dark" id="D" value="{{$option->option_d}}">
					 	</div>
					 </div>
				</div>
				@endforeach
				<div class="form-group row">
					<div class="col-12 text-center">
						<button class="btn btn-success pl-3 pr-3">UPDATE QUESTION +</button>
					</div>
				</div>
			</form>

		</div>
	</div>

@stop

@section('js')
    <script>
    	 // $('#myTable').DataTable();
    	 $('#category').select2();
     </script>
@stop
