@extends('adminlte::page')
@section('title','Optiven Inventory')

@section('content_header')
@stop

@section('right-sidebar')
	<p>Content</p>
@stop

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-10 p-4 bg-white">
			<h4 class="text-center">Create Question</h4>

			<form method="POST" action=" {{ route('question.store') }} ">
				@csrf
				<div class="form=group row">
					<label for="question">Question</label>
					<textarea class="form-control border border-3 border-dark" id="question" name="question"></textarea>
				</div>
				<div class="form-group">
					 <div class="row">
					 	<div class="col-6">
					 		<label for="A" class="col-3">A:</label>
					 		<input type="text" name="option_a" class="form-control col-12 border border-3 border-dark" id="A">
					 	</div>
					 	<div class="col-6">
					 		<label for="B" class="col-3">B:</label>
					 		<input type="text" name="option_b" class="form-control col-12 border border-3 border-dark" id="B">
					 	</div>
					 </div>
					 <div class="row">
					 	<div class="col-6">
					 		<label for="C" class="col-3">C:</label>
					 		<input type="text" name="option_c" class="form-control col-12 border border-3 border-dark" id="C">
					 	</div>
					 	<div class="col-6">
					 		<label for="D" class="col-3">D:</label>
					 		<input type="text" name="option_d" class="form-control col-12 border border-3 border-dark" id="D">
					 	</div>
					 </div>
				</div>
				<div class="form-group row">
					<div class="col-12 text-center">
						<button class="btn btn-success pl-4 pr-4">CREATE QUESTION + </button>
					</div>
				</div>
			</form>

		</div>
	</div>

@stop

@section('js')
    <script>
    	 // $('#myTable').DataTable();
    	 // $('.category').select2();
     </script>
@stop
