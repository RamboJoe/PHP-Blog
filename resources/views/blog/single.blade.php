@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "$titleTag")

@section('content')
	
	<div class="col-md-8 col-md-offset-2">
		<h1>{{ $post->title }}</h1>
		<p>{{ $post->body }}</p>
		<hr>
		<p>Posted In: {{ $post->category->name }}</p>
	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($post->comments as $comment)
				<div class="comment">
					<p><strong>Name:</strong> {{ $comment->name }}</p>
					<p><strong>Comment:</strong><br> {{ $comment->comment }}</p>
				</div>
				<hr>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top:50px;">
			<form method="POST" action="{{ route('comments.store', $post->id) }}">
				{!! csrf_field() !!}
				
				<div class="row">
					<div class="col-md-6">
						<label for="name">Name:</label>
						<textarea type="text" class="form-control" id="name" name="name" rows="1"></textarea>
					</div>

					<div class="col-md-6">
						<label for="email">Email:</label>
						<textarea type="email" class="form-control" id="email" name="email" rows="1"></textarea>
					</div>

					<div class="col-md-12">
						<label for="comment">Comment:</label>
						<textarea type="text" class="form-control" id="comment" name="comment" rows="5"></textarea>
					</div>
				</div>

				
				<br>
				<input type="submit" name="submit" value="Add Comment" class="btn btn-success btn-block">
			</form>
		</div>
	</div>

@endsection