@extends('main')

@section('title', ' Edit Comment')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Comment</h1>
			<form method="POST" action="{{ route('comments.update', $comment->id) }}">
				{!! csrf_field() !!}
				<label for="name">Name:</label>
				<textarea type="text" class="form-control" name="name" rows="1" style="resize:none;" disabled="">{{ $comment->name }}</textarea>
				
				<label for="email">Email:</label>
				<textarea type="text" class="form-control" name="email" rows="1" style="resize:none;" disabled="">{{ $comment->email }}</textarea>
				
				<label for="comment">Comment:</label>
		        <textarea type="text" class="form-control" name="comment" rows="10">{{ $comment->comment }}</textarea>

				<input type="submit" name="updateComment" value="Update Comment" class="btn btn-success btn-block" style="margin-top:15px">

				{{ method_field('PUT') }}
			</form>
		</div>
	</div>
@endsection