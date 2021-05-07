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
					<th scope="col">Question</th>
					<th scope="col">A</th>
					<th scope="col">B</th>
					<th scope="col">C</th>
					<th scope="col">D</th>
					<th scope="col"></th>
				</thead>
				<tbody>
					@foreach($question as $data)
						<tr>
							<td> {{ $data->id }} </td>
							<td> {{ $data->question }} </td>
							@foreach($data->option as $option)
							<td> {{ $option->option_a }} </td>
							<td> {{ $option->option_b }} </td>
							<td> {{ $option->option_c }} </td>
							<td> {{ $option->option_d }} </td>
							@endforeach
							<td> 
								<div class="row">
									<div class="pr-2">
										<a class="btn btn-outline-info rounded-circle" href=" {{ route('question.edit',$data->id) }} ">
											<i class="fas fa-eye"></i>
										</a>
									</div>
									<div class="pr-2">
										<form action=" {{ route('question.destroy',$data->id ) }} " method="post">
											@csrf
											@method('delete')
											<button type="submit" class="btn btn-outline-danger rounded-pill"/>
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
