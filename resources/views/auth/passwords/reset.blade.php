@extends('main')

@section('title', 'Forgot My Password')

@section('content')

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Reset Password</div>

        <div class="panel-body">
          <form method="POST" action="{{url('password/reset')}}">
            {!! csrf_field() !!}
            
            <input type="hidden" name="token" value="{{ $token }}">
            
            <label for="email">Email Address:</label>
            <input type="email" name="email" class="form-control" value="{{ $email }}">

            <label for="password">New Password:</label>
            <input type="password" name="password" class="form-control">

            <label for="password_confirmation">Confirm New Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
            
            <br>
            <input type="submit" name="resetPassword" value="Reset Password" class="btn btn-primary btn-block">
        
          </form>
        </div>

      </div>
    </div>
  </div>

@endsection