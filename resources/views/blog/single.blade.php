@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "$titleTag")

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<img src="{{ asset('images/' . $post->image) }}" alt="" height="400" width="800">
			<h1>{{ $post->title }}</h1>
			<p>{!! $post->body !!}</p>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					
					<div class="author-info">
						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid"}}" class="author-image" alt="">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">
								{{ date('F nS, Y - g:i A', strtotime($comment->created_at)) }}	
							</p>
							
						</div>
					</div>

					<div class="comment-content">
						{{ $comment->comment }}
					</div>
				</div>
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