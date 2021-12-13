@extends('layouts.app')

@section('content')
<h1 class="h5">{{__('ui.balance')}}</h1>
<div class="row no-gutters">
    <div class="col-lg-7 col-md-5 card mb-2 rounded">
        <div class="">
            <div class="card-body d-flex align-items-center mb-4">
                <div class="flex">
                    <h4 class="card-header__title">{{__('ui.current_balance')}}</h4>
                    <div class="card-subtitle ">{{__('ui.current_balance_text')}}</div>
                </div>
                <div class="dropdown ml-auto">
                    <a href="#" data-toggle="dropdown" data-caret="false" class="text-dark-gray"><i class="fa fa-lg fa-ellipsis-h"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0)" class="dropdown-item">{{__('ui.report')}}</a>
                        <a href="javascript:void(0)" class="dropdown-item">{{__('ui.next_cycle')}}</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="text-amount font-weight-bolder mb-1">0 FJT</div>
                <div class="">{{__('ui.current_balance')}}</div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-7 px-md-2">
        <div class="row no-gutters">
            @foreach($values as $value)
            <div class="col-md-6 px-0 px-md-2">
                <div class="card card-body mb-2 rounded">
                    <p class="font-weight-bolder mb-0">{{$value['item']->name}}</p>
                    <span class="text-muted text-uppercase">&dollar;{{$value['price']}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop