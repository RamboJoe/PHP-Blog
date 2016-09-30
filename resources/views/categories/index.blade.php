@extends('main')

@section('title', "All Categories")

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>

			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>{{ $category->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>


		</div>

		<div class="col-md-3">
			<div class="well">
				<form method="POST" action="{{ route('categories.store') }}">
				{!! csrf_field() !!}
				<h2>New Category</h2>

				<label for="name">Name:</label>
				<input type="name" name="name" class="form-control">
				
				<br>
				<input type="submit" name="createCategory" value="Create New Category" class="btn btn-primary btn-block">

		
			</form>
			</div>
		</div>
	</div>

@endsection