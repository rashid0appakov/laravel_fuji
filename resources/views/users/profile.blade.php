@extends('layouts.site')

@section('content')
<h1>{{auth()->user()->name}}</h1>
<form class="form" action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-sm-3">
            <div class="text-center">
                @if($user->photo)
                    <img src="/storage/{{$user->photo}}" alt="{{$user->name}}" class="img-fluid">
                @else
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="{{auth()->user()->name}}">
                @endif
                <h6>Загрузить новое фото</h6>
                <input type="file" name="photo" class="text-center center-block file-upload">
            </div>
        </div>
        <div class="col-sm-9">  
        
            <div class="form-group">
                <div class="col-xs-6">
                    <label>Имя</label>
                    <input type="text" class="form-control" name="name" value="{{old('name') ? old('name') : $user->name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{old('email') ? old('email') : $user->email}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label>Пароль</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <label>Подтвердите пароль</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-success" type="submit">Сохранить</button>
            </div>
        </div>
    </div>
</div>
@stop