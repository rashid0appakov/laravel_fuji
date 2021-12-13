@extends('layouts.site')

@section('title')
{{$post->name}}
@stop

@section('bread')
<a href="{{route('home')}}">Home</a>
<span class="fa fa-chevron-right mx-3"></span>
<a href="{{route('posts.index')}}">Posts</a>
<span class="fa fa-chevron-right mx-3"></span>
<a href="#" class="active">{{$post->name}}</a>
@stop
@section('content')
<div class="container">
    <div class="card card-default card-body mb-3">
        @if($post->image)
        <img src="/storage/{{$post->image}}" class="img-fluid" alt="">
        @endif
        <h1>{{$post->name}}</h1>
        <hr>
        <p class="lead">{{$post->preview}}</p>
        <p class="text-muted">{{$post->text}}</p>
    </div>
    <div class="row">
        @foreach($posts as $item)
        <div class="col-md-6 mb-3">
            <div class="card card-default card-body mb-3">
                <div class="media">
                    @if($item->image)
                    <img src="/storage/{{$item->image}}" alt="" class="mr-3" width="256px">
                    @endif
                    <div class="media-body">
                        <p>{{$item->name}}</p>
                        <small>{{$item->preview}}</small>
                        <hr>
                        <a class="small" href="{{route('posts.show', $item->id)}}" class="link-default">read-more</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop