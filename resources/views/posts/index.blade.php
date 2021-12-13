@extends('layouts.site')

@section('bread')
<a href="{{route('home')}}">Home</a>
<span class="fa fa-chevron-right mx-3"></span>
<a href="#" class="active">Posts</a>
@stop
@section('content')
<div class="container eq-group">
    <div class="row mb-3">
        @foreach($posts as $key => $item)
        <div class="col-md-6 mb-3">
            @include('components.media-card', ['item' => $item])
        </div>
        @if($key % 2 == 1) 
        </div>
        <div class="row mb-3">
        @endif
        @endforeach
    </div>
    {{$posts->links()}}
</div>
@stop