@extends('layouts.app')

@section('content')
<h1 class="h5">{{__('ui.calculator.title')}}</h1>
<div class="card card-body border-0 bg-gray">
    <h2 class="h4">{{__('ui.calculator.subname')}}</h2>
    <p class="mb-4">{{__('ui.calculator.text')}}</p>
    <calculator underbutton="1" button="{{__('ui.calculator.button')}}"></calculator>
</div>
@stop