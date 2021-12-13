@extends('layouts.site')

@section('title')
{{$startup->name}}
@stop

@section('content')
<div class="container">
    <div class="card card-default card-body mb-3">
        <h1>{{$startup->name}}</h1>
        <hr>
        @if($startup->image)
            <div clas="pull-left mb-3 mr-3">
                <img src="/storage/{{$startup->image}}" alt="" class="img-fluid">
            </div>
        @endif
        <p class="lead">{{$startup->preview}}</p>
        <p class="text-muted">{{$startup->text}}</p>
    </div>
</div>
@stop