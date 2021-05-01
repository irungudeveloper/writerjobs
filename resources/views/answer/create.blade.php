@extends('adminlte::page')
@section('title','Optiven Inventory')

@section('content_header')
@stop

@section('right-sidebar')
	<p>Content</p>
@stop

@section('content')
	
	<div class="row justify-content-center">
		<div class="col-10 bg-white">
			<h4 class="text-center">Add New Answer</h4>
			<div class="card-body">
				<form action=" {{ route('answer.store') }} " method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row">
						<div class="col-12">
							 <label for="question">Question</label>
							 <textarea class="form-control" id="question" name="question"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12">
							<label for="image">Image</label>
							<input type="file" id="image" name="image" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-6">
							<label for="price">Price</label>
							<input type="integer" name="price" id="price" class="form-control">
						</div>
						<div class="col-6">
							<label for="category">Category</label>
							<select class="form-control" id="category" name="category_id[]" multiple>
								@foreach($category as $data)
									<option value=" {{ $data->id }} "> {{ $data->name }} </option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12">
							<label for="answer">Answer</label>
							<textarea id="answer" class="form-control" name="answer"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12 text-center">
							 <button class="btn btn-solid btn-success">SUBMIT</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop

@section('js')
  <script>
    
    $(document).ready(function(){
    	$('#category').select2();
    });

  </script>

@stop
