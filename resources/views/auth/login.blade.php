@extends('main')

@section('title', 'Login')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form method="POST" action="">
				{!! csrf_field() !!}
				<label for="email">Email:</label>
				<input type="email" name="email" class="form-control">

				<label for="password">Password:</label>
				<input type="password" name="password" class="form-control">

				<input type="checkbox" name="remember" value="1">
				<label for="remeber">Remember me</label>
				
				<br>
				<input type="submit" name="login" value="Login" class="btn btn-primary btn-block">

				<p><a href="{{url('password/reset')}}">Forgot My Password</a></p>
		
			</form>
		</div>
	</div>

@endsection