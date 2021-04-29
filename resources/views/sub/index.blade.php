@extends('adminlte::page')
@section('title','Optiven Inventory')

@section('content_header')
@stop

@section('right-sidebar')
	<p>Content</p>
@stop

@section('content')
	
	<div class="row justify-content-center m-0">
		<div class="col-10 bg-white">
			<table id="myTable" class="table table-responsive-sm table-stripped">
				<thead>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Amount</th>
					<th scope="col"></th>
				</thead>
				<tbody>
					@foreach($sub as $data)
						<tr>
							<td> {{ $data->id }} </td>
							<td> {{ $data->name }} </td>
							<td> {{ $data->amount }} </td>
							<td> 
								<div class="row">
									<div class="col-5 col-sm-12 col-md-2 col-lg-2">
										<a class="btn btn-outline-info rounded-circle" href=" {{ route('sub.edit',$data->id) }} ">
											<i class="fas fa-eye"></i>
										</a>
									</div>
									<div class="col-5 col-sm-12 col-md-2 col-lg-2">
										<form action=" {{ route('sub.destroy',$data->id ) }} " method="post">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-outline-danger rounded-pill ml-3"/>
												<i class="fas fa-trash-alt"></i>
											</button>
										</form>
									</div>
								</div>			
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop

@section('js')
    <script>
    	 $('#myTable').DataTable();
     </script>
@stop
