@extends('main')

@section('title', 'Create New Post')

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

<div class="col-md-8 col-md-offset-2">
    <h1>Create New Post</h1>
    <hr>
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="form-group">
        <label name="title">Title:</label>
        <input id="title" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label name="slug">Slug:</label>
        <input id="slug" name="slug" class="form-control">
      </div>
      
      <label name="category_id">Category:</label>
      <select class="form-control" name="category_id">
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach  
      </select>

      <label name="tags">Tags:</label>
      <select class="form-control select2-multi" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach  
      </select>

      <div class="form-group">
        <label name="featured_image">Upload Featured Image:</label>
        <input type="file" accept="file_extension|image/*" name="featured_image">
      </div>
      
      <div class="form-group">
        <label name="body">Post Body:</label>
        <textarea id="body" name="body" rows="10" class="form-control"></textarea>
      </div>
      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
      
    </form>
  </div>
</div>﻿

@endsection

@section('scripts')

  <script src="{{ URL::asset('js/select2.min.js') }}"></script>

  <script type="text/javascript">
    $('.select2-multi').select2();
  </script>

@endsection