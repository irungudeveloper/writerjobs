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
									<div class="col-5 col-sm-12 col-md-2 col-lg-2">
										<button type="button" class="btn btn-outline-danger rounded-pill ml-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}">
										  <i class="fas fa-trash-alt"></i>
										</button>

										<div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation </h5>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      </div>
										      <div class="modal-body text-danger">
										       	Are you sure you want to delete?
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
										        <form action=" {{ route('question.destroy',$data->id) }} " method="post">								@csrf
										        	@method('DELETE')
													<button type="submit" class="btn btn-danger ml-3"/>
														<i class="fas fa-trash-alt"></i>
													</button>
												</form>
										      </div>
										    </div>
										  </div>
										</div>
										
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
@stop
