@extends('master')
  @section('content')   

	<div class="row m-3 mt-3 bg-white p-2 pt-5 mt-5">
		<div class="col-12 text-center">
			<h4>Create Your Account</h4>
		</div>
		<div class="col-12 p-2">
			<form method="POST" action=" {{ route('subaccount.store') }} ">
				@csrf
				<div class="form-group row">
					<div class="col-6">
						<label for="sir_name">Sir Name</label>
						<input type="text" name="sir_name" id="sir_name" class="form-control border border-3 border-dark">
					</div>
					<div class="col-6">
						<label for="other_name">Other Names</label>
						<input type="text" name="other_name" id="other_name" class="form-control border border-3 border-dark">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" class="form-control border border-3 border-dark">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12">
						<label for="phone">Phone Number</label>
						<input type="text" name="phone" id="phone" class="form-control border border-3 border-dark">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-6">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="form-control border border-3 border-dark">
					</div>
					<div class="col-6">
						<label for="retype">Retype Password</label>
						<input type="password" name="retype" id="retype" class="form-control border border-3 border-dark">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12 text-center">
						<button class="btn btn-solid btn-success">Create Account</button>
					</div>
				</div>

			</form>
		</div>
	</div>

@endsection