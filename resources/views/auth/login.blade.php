@extends('layouts.site')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-4">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>{{__('ui.auth.email')}}</label>
            <input class="form-control" type="email" autocomplete="off" name="email">
        </div>
        <div class="form-group">
            <label>{{__('ui.auth.password')}}</label>
            <input class="form-control" type="password" autocomplete="new-password" name="password">
        </div>
        <button class="btn btn-block btn-primary rounded-pill">{{__('ui.auth.login')}}</button>
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <a class="small" href="{{route('password.request')}}">{{__('ui.auth.forgot')}}</a>
            <div class="small">{{__('ui.auth.new')}} <strong><a href="{{route('register')}}">{{__('ui.auth.signup')}}</a></strong></div>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
