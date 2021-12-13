@extends('layouts.site')

@section('content')
<div class="container">
<div class="row  justify-content-center">
    <div class="col-md-4">
        <form autocomplete="off" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>{{__('ui.auth.name')}}</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label>{{__('ui.auth.email')}}</label>
                <input class="form-control" type="email" name="email">
            </div>
            <div class="form-group">
                <label>{{__('ui.auth.password')}}</label>
                <input class="form-control" type="password" id="password1" name="password">
            </div>
            <div class="form-group">
                <label>{{__('ui.auth.confirm')}}</label>
                <input class="form-control" type="password" id="password2" name="password_confirmation">
            </div>
            <div class="form-group">
                <label class="d-flex justify-content-start align-items-center">
                    <input type="checkbox" checked id="accept_rules"> <span class="ml-2">{{__('ui.auth.accept')}} <a href="#terms_modal" data-toggle="modal">{{__('ui.auth.terms')}}</a></span>
                </label>
            </div>
            <button class="btn btn-block mb-3 btn-primary rounded-pill" id="reg_button">{{__('ui.auth.register')}}</button>
            <div>{{__('ui.auth.has')}} <strong><a href="{{route('login')}}">{{__('ui.auth.signin')}}</a></strong></div>
        </form>
    </div>
</div>
</div>
@endsection
