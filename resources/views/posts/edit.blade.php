@extends('layouts.app')

@section('content')
<div class="container">

	<br>
	<br>
	<div class="col-md-6 col-md-offset-3">
		<h1>Edit the post</h1>
		<br>
		<br>
		<form method="post" action="{{route('posts.update', [$post->id])}}" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
		  	<div class="form-group">
			    <label>Title</label>
			    <input class="form-control" name="title" placeholder="Enter title" required="true" value="{{$post->title}}">
		  	</div>
		  	<div class="form-group">
			    <label>Post content</label>
			    <input class="form-control" name="body" placeholder="Enter post content" required="true" value="{{$post->body}}">
		  	</div>
		  	<div class="form-group">
		  		<input type="file" name="image" id="image">
		  	</div>
		  	<br>
		  	@if((Auth::user()->role_id) == 1)
			  	<div class="form-group">
			  		<label>Status  </label>
			  		<select class="selectpicker" name="status">
					  <option value="1">Published</option>
					  <option value="0">Unpublished</option>
					</select>
			  	</div>
		  	@endif
			<br>
		  	<center><button type="submit" class="btn btn-primary">Submit</button></center>
		</form>
	</div>
</div>

@endsection
