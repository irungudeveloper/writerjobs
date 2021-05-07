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
			<form method="POST" action=" {{ route('answer.store') }} ">
				@csrf
				<div class="form-group row">
					<label for="question">Question</label>
					<select id="question" name="question_id" class="form-control">
						<option>--SELECT QUESTION --</option>
						@foreach($question as $data)
							<option value=" {{ $data->id }} "> {{ $data->question }} </option>
						@endforeach
					</select>
				</div>
				<div class="form-group row">
					<label for="option">Option</label>
					<select id="option" name="answer" class="form-control">
						<option>--SELECT OPTION--</option>
					</select>
				</div>
				<div class="form-group row">
					<label for="explanation">Explanation</label>
					<textarea class="form-control" id="explanation" name="explanation"></textarea>
				</div>
				<div class="form-group row">
					<div class="col-12 text-center">
						<button class="btn btn-success pl-3 pr-3">UPLOAD ANSWER</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@stop

@section('js')
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		
		$(document).ready(function()
		{
			var q_id;
			var options;
			var select=document.getElementById('option');

			$('#question').on('change',function(e)
			{
				q_id = $('#question').val();
				console.log(q_id);

				$.ajax(
					{
						url:" {{ route('answer.option') }} ",
						method:'POST',
						data:{
							"_token":" {{ csrf_token() }} ",
							id:q_id
						},
						dataType:'json',
						success:function(response)
						{
							console.log(response.response_data[0]['option_a']);

							var myOption1 = document.createElement("option");
							var myOption2 = document.createElement("option");
							var myOption3 = document.createElement("option");
							var myOption4 = document.createElement("option");
							myOption1.text = response.response_data[0]['option_a'];
							myOption2.text = response.response_data[0]['option_b'];
							myOption3.text = response.response_data[0]['option_c'];
							myOption4.text = response.response_data[0]['option_d'];

							myOption1.value = response.response_data[0]['option_a'];
							myOption2.value = response.response_data[0]['option_b'];
							myOption3.value = response.response_data[0]['option_c'];
							myOption4.value = response.response_data[0]['option_d'];

							select.add(myOption1);
							select.add(myOption2);
							select.add(myOption3);
							select.add(myOption4);

						},
						error:function(error)
						{
							console.log(error);
						}
					});
			});
		});

	</script>


   <!--  <script>
    	 $('#myTable').DataTable();
     </script> -->
@stop
