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
			<h4 class="text-center">Create Subscription</h4>
			<div class="card-body">
				<form action=" {{ route('sub.store') }} " method="POST">
					@csrf
					<div class="form-group row">
						<div class="col-12">
							 <label for="sub">Name</label>
							 <input type="text" name="name" class="form-control" id="sub">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12">
							 <label for="amount">Amount</label>
							 <input type="integer" name="amount" class="form-control" id="amount">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12 text-center">
							 <button class="btn btn-solid btn-success">CREATE</button>
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
