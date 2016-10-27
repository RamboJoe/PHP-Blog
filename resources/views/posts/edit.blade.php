@extends('main')

@section('title', 'Edit Blog Post')

@section('stylesheets')
  <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">

  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    tinymce.init({ 
      selector:'textarea',
      plugins:'link',
      menubar: false 
    });
  </script>
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
			{!! csrf_field() !!}
      		<div class="form-group">
        		<label for="title">Title:</label>
        		<!--<textarea type="text" class="form-control input-lg" id="title" name="title" rows="1" style="resize:none;">{{ $post->title }}</textarea>-->
        		<input id="title" name="title" class="form-control" value="{{ $post->title }}">
      		</div>
      		<div class="form-group">
        		<label for="slug">Slug:</label>
        		<!--<textarea type="text" class="form-control" id="slug" name="slug" rows="1" style="resize:none;">{{ $post->slug }}</textarea>-->
        		<input id="slug" name="slug" class="form-control" value="{{ $post->slug }}">
      		</div>

      		<label name="category_id">Category:</label>
		      <select class="form-control" name="category_id">
		        @foreach($categories as $category)
		          <option value="{{ $category->id }}"
					@if ($category->id === $post->category_id)
						selected
					@endif
		          >{{ $category->name }}</option>
		        @endforeach  
		      </select>

		      <label name="tags">Tags:</label>
		      <select class="form-control select2-multi" name="tags[]" multiple="multiple">
		        @foreach($tags as $tag)
		        	<option value="{{ $tag->id }}"
		        	@foreach($post->tags as $ptag)
						@if ($tag->id === $ptag->id)
							selected
						@endif
					@endforeach
					>{{ $tag->name }}</option>
		        @endforeach  
		      </select>

        	<label for="featured_image">Featured Image:</label>
        	<input type="file" name="featured_image">

      		<div class="form-group">
        		<label for="body">Body:</label>
        		<textarea type="text" class="form-control" id="body" name="body" rows="10">{{ $post->body }}</textarea>
      		</div>
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>

				<div class="row">
					<div class="col-sm-6">
            			<a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Back</a>
          			</div>
          			<div class="col-sm-6">
              			<button type="submit" class="btn btn-success btn-block">Save</button>
              			{{ method_field('PUT') }}
            			</form>﻿
					</div>﻿
				</div>

			</div>
		</div>

	</div>

@stop

@section('scripts')

  <script src="{{ URL::asset('js/select2.min.js') }}"></script>
  <script type="text/javascript">
  	$('.select2-multi').select2();
  </script>

@endsection