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
			<table id="myTable" class="table table-responsive table-stripped">
				<thead>
					<th scope="col">#</th>
					<th scope="col">Questions</th>
					<th scope="col">Image</th>
					<th scope="col">Price</th>
					<th scope="col">Answer</th>
					<th scope="col"></th>
				</thead>
				<tbody>
					@foreach($answer as $data)
						<tr>
							<td> {{ $data->id }} </td>
							<td> {{ $data->question }} </td>
							<td> <img src="images/jobs/{{$data->image}} " style="width: 30px; height: 30px;"> </td>
							<td> {{ $data->price }} </td>
							<td> {{ $data->answer }} </td>
							<td> 
								<div class="row">
									<div class="col-5 p-3 col-sm-12 col-md-2 col-lg-2">
										<a class="btn btn-outline-info rounded-circle" href=" {{ route('answer.edit',$data->id) }} ">
											<i class="fas fa-eye"></i>
										</a>
									</div>
									<div class="col-5 p-3 col-sm-12 col-md-2 col-lg-2">
										<form action=" {{ route('answer.destroy',$data->id ) }} " method="post">
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
	<script src='https://cdn.tiny.cloud/1/kxqq67o3mcu65boxzctvtlv4sjsjzenp4dyiu6iqrtlucr66/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
    <script>
    	 $('#myTable').DataTable();

    	 tinymce.init(
    	 {
    		selector : 'p',
    		inline: true,
    		readonly: 1
		});

     </script>
@stop
