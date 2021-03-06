@extends('main')

@section('title', 'View Post')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<img src="{{ asset('images/' . $post->image) }}" alt="" height="400" width="800">
			<h1>{{ $post->title }}</h1>

			<p class="lead">{!! $post->body !!}</p>

			<hr>

			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="label label-default">{{ $tag->name }}</span>
				@endforeach
			</div>

			<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $post->comments->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70px"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>URL:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{ url('blog/' . $post->slug) }}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>

				<div class="row">
					<div class="col-sm-6">
					  <form method="PATCH" action="{{ route('posts.edit', $post->id) }}">
					    <button type="submit" class="btn btn-primary btn-block">Edit</button>
					    <input type="hidden" name="_token" value="{{ Session::token() }}">
					  </form>
					</div>
					<div class="col-sm-6">
					 	<form method="POST" action="{{ route('posts.destroy', $post->id) }}">
    						<input type="submit" value="Delete" class="btn btn-danger btn-block">
    						<input type="hidden" name="_token" value="{{ Session::token() }}">
   							{{ method_field('DELETE') }}
						</form>
					</div>﻿
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a class="btn btn-default btn-block" href="{{route('posts.index')}}" role="button"><<< Show all post</a>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection