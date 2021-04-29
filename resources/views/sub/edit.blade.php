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
			<h4 class="text-center">Edit Subscription</h4>
			<div class="card-body">
				<form action=" {{ route('sub.update',$sub->id) }} " method="POST">
					@csrf
					@method('PUT')
					<div class="form-group row">
						<div class="col-12">
							 <label for="sub">Name</label>
							 <input type="text" name="name" class="form-control" id="sub" value="{{$sub->name}}">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12">
							 <label for="amount">Amount</label>
							 <input type="integer" name="amount" class="form-control" id="amount" value="{{$sub->amount}}">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12 text-center">
							 <button class="btn btn-solid btn-success">UPDATE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop

@section('js')
   <!--  <script>
    	 $('#myTable').DataTable();
     </script> -->
@stop
