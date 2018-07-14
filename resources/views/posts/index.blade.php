@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<h1 style="color: #0066CC">List of post</h1>
		<br><br><br>
		<div class="pull-right"><a href="{{route('posts.create')}}">Create new post</a></div>
		<br>
		<br>
	    <table id="mytable" class="table table-striped table-bordered">
	                   
	        <thead>
	            @if((Auth::user()->role_id) == 1)
	            	<th>Created by</th>
	            @endif
	            <th>Title</th>
	            <th>Image</th>
	            <th>Created At</th>
	            <th>Status</th>
	            <th><center>Edit</center></th>
	            <th><center>Delete</center></th>
	        </thead>
		    <tbody>
		     @foreach($posts as $post)
		    <tr>
		    	@if((Auth::user()->role_id) == 1)
	            	<td>{{$post->user->name}}</td>
	            @endif
			    <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
			    <td><img src="/images/{{$post->image_link}}" height="40px"></td>
			    <td>{{$post->created_at}}</td>
			    @if(($post->published) == 1)
			    	<td>Published</td>
			    @else
			    	<td>Unpublished</td>
			    @endif
			    <td><center><a href="{{route('posts.edit', $post->id)}}"><i class="fa fa-pencil"></i></a></center></td>
			    <td><center>
			    	<form onsubmit="return confirm('Do you really want to delete?');" action="{{route('posts.destroy', [$post->id])}}" method="POST" >
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE" />
							<button style="padding: 0" class="btn btn-link" type="submit"><i class="fa fa-trash"></i></button>
					</form>

			    	</center>
			    </td>
		    </tr>
		    @endforeach
		    
		    </tbody>
	        
		</table>
	</div>
</div>

@endsection
