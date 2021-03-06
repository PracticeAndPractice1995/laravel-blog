@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br><br>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-right"><br>
                            <b><span style="color: red">{{$post->user->name}}</span>, {{$post->created_at}}</b>
                        </div>
                        <br><br><br>
                        <center>
                            <h4 style="color: #0265DE">{{$post->title}}</h4>
                        </center>
                        <p>{{$post->body}}</p>
                        <center>
                            <img src="/images/{{$post->image_link}}" width="600px">
                        </center>
                   </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
