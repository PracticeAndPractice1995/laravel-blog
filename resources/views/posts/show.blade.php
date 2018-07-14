@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br><br>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><br>
                            <b><span style="color: red">{{$post->user->name}}</span>, {{$post->created_at}}</b>
                        </div>
                        <div class="pull-right"><br>
                            <a href="{{route('posts.edit', $post->id)}}"><i class="fa fa-pencil"></i> Edit</a>
                            <form onsubmit="return confirm('Do you really want to delete?');" action="{{route('posts.destroy', [$post->id])}}" method="POST" >
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button style="padding: 0" class="btn btn-link" type="submit"><i class="fa fa-trash"></i> Delete</button>
                            </form>
                        </div>
                        <br><br><br>
                        <center>
                            <h4>{{$post->title}}</h4>
                        </center>
                        <p>{{$post->body}}</p>
                        <center>
                            <img src="/images/{{$post->image_link}}" width="600px">
                        </center>
                   </div>
                </div>
            </div>
        </div>
</div>

@endsection
