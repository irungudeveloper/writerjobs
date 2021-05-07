@extends('adminlte::page')
@section('title','Optiven Inventory')

@section('content_header')
@stop

@section('right-sidebar')
	<p>Content</p>
@stop

@section('content')

	<div class="row">
		<div class="col-4">
			<div class="card alert-success text-white">
				<div class="card-body">
					<div class="row">
						<div class="col-4">
							<h3 class="display-4"><b>20</b></h3>
						</div>
						<div class="col-8 pt-4">
							<p class="display-5">Questions Created</p>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<a href=" {{ route('question.index') }}" class="text-white"> <i class="fas fa-arrow-left"></i> Manage Questions</a>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card alert-info text-white">
				<div class="card-body">
					<div class="row">
						<div class="col-4">
							<h3 class="display-4"><b>20</b></h3>
						</div>
						<div class="col-8 pt-4">
							<p class="display-5">Answers Created</p>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<a href=" {{ route('answer.index') }}" class="text-white"> <i class="fas fa-arrow-left"></i> Manage Answers</a>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card alert-primary text-white">
				<div class="card-body">
					<div class="row">
						<div class="col-4">
							<h3 class="display-4"><b>20</b></h3>
						</div>
						<div class="col-8 pt-4">
							<p class="display-5">Subscribers</p>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<a href=" {{ route('sub.index') }}" class="text-white"> <i class="fas fa-arrow-left"></i> Manage Subscribers</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row mt-2 justify-content-center">
			<div class="col-6 bg-white">
				<div class="row bg-secondary p-5 m-2">
					<div class="col-12">
						<p class="text-center">Graph-1</p>	
					</div>
				</div>
			</div>
			<div class="col-6 bg-white">
				<div class="row bg-secondary p-5 m-2">
					<div class="col-12">
						<p class="text-center">Graph-2</p>	
					</div>
				</div>
			</div>
		</div>

	</div>
	
@stop

@section('js')
   <!--  <script>
    	 $('#myTable').DataTable();
     </script> -->
@stop
