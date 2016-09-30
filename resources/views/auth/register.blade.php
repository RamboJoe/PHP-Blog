@extends('main')

@section('title', 'Register')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form method="POST" action="">
				{!! csrf_field() !!}

				<label for="name">Name:</label>
				<input type="name" name="name" class="form-control">

				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control">

				<label for="password">Password:</label>
				<input type="password" name="password" class="form-control">

				<label for="password_confirmation">Confirm password:</label>
				<input type="password" name="password_confirmation" class="form-control">
				
				<br>
				<input type="submit" name="register" value="Register" class="btn btn-primary btn-block">
		
			</form>

		</div>
	</div>


	
	
@endsection