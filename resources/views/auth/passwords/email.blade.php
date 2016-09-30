@extends('main')

@section('title', 'Forgot My Password')

@section('content')

  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default">
        <div class="panel-heading">Reset Password</div>

        <div class="panel-body">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

          <form method="POST" action="{{url('password/email')}}">
            {!! csrf_field() !!}

            <label for="email">Email Address:</label>
            <input type="email" name="email" class="form-control">
            
            <br>
            <input type="submit" name="resetPassword" value="Reset Password" class="btn btn-primary btn-block">
        
          </form>

        </div>
      </div>

    </div>

  </div>

@endsection