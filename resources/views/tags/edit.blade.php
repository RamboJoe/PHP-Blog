@extends('main')

@section('title', "Edit Tag")

@section('content')
	
	<div class="row">
		<form method="POST" action="{{ route('tags.update', $tag->id) }}">
				{!! csrf_field() !!}

				<label for="name">Name:</label>
				<textarea type="text" class="form-control" id="name" name="name" rows="1">{{ $tag->name }}</textarea>
				<br>
				<input type="submit" name="register" value="Save Changes" class="btn btn-success btn-block">
				{{ method_field('PUT') }}
				
		</form>
	</div>

@endsection