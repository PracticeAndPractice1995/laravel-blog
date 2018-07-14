@extends('layouts.app')

@section('content')
<div class="container">

	<br>
	<br>
	<div class="col-md-6 col-md-offset-3">
		<h1>Create a post</h1>
		<br>
		<br>
		<form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
			{{csrf_field()}}
		  	<div class="form-group">
			    <label>Title</label>
			    <input class="form-control" name="title" placeholder="Enter title" required="true">
		  	</div>
		  	<div class="form-group">
			    <label>Post content</label>
			    <input class="form-control" name="body" placeholder="Enter post content" required="true">
		  	</div>
		  	<div>
		  		<input type="file" name="image" id="image" required="true">
		  	</div>
			<br>
		  	<center><button type="submit" class="btn btn-primary">Submit</button></center>
		</form>
	</div>
</div>

@endsection
