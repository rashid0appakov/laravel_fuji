@extends('layouts.app')

@section('content')
<form action="{{route('cabinet.account.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mb-2">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">{{__('ui.profile.basic')}}</strong></p>
            <p class="">{{__('ui.profile.edit_text')}}</p>
        </div>
        <div class="col-lg-8 card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="fname">{{__('ui.profile.name')}}</label>
                        <input id="fname" name="name" type="text" class="form-control" placeholder="{{__('ui.profile.you_name')}}" value="{{auth()->user()->name}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="api_token" class="text-label flex justify-content-start">{{__('ui.profile.token_title')}}</label>
                <div class="input-group input-group-merge">
                    <input name="api_token" id="api_token" type="password" class="form-control form-control-appended" placeholder="{{__('ui.profile.token_placeholder')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-eye"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="opass">{{__('ui.profile.old_password')}}</label>
                <input name="old_password" style="width: 270px;" id="opass" type="password" class="form-control @error('old_password') is-invalid @enderror" placeholder="{{__('ui.profile.old_password')}}">
                @error('old_password') <span class="invalid-feedback">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="npass">{{__('ui.profile.new_password')}}</label>
                <input name="password" style="width: 270px;" id="npass" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('ui.profile.new_password')}}">
                @error('password') <span class="invalid-feedback">{{$message}}</span> @enderror
            </div>
            <div class="form-group">
                <label for="cpass">{{__('ui.profile.confirm_password')}}</label>
                <input name="password_confirmation" style="width: 270px;" id="cpass" type="password" class="form-control" placeholder="{{__('ui.profile.confirm_password')}}">
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-4 card-body">
            <p><strong class="headings-color">{{__('ui.profile.settings_title')}}</strong></p>
            <p class="">{{__('ui.profile.settings_text')}}</p>
        </div>
        <div class="col-lg-8 card-body">
            <div class="form-group">
                <label>{{__('ui.profile.avatar')}}</label>
                <div class="dz-clickable media align-items-center" data-toggle="dropzone" data-dropzone-url="http://" data-dropzone-clickable=".dz-clickable" data-dropzone-files='["/_cabinet/images/account-add-photo.svg"]'>
                    <div class="dz-preview dz-file-preview dz-clickable mr-3">
                        <div class="avatar" style="background-image:url(@if(auth()->user()->photo) /storage/{{auth()->user()->photo}} @else /_cabinet/images/account-add-photo.svg @endif)"></div>
                    </div>
                    <div class="media-body">
                        <label class="btn btn-sm btn-primary dz-clickable">
                            <input type="file" name="photo" class="d-none">
                            {{__('ui.profile.change_photo')}}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="desc2">{{__('ui.profile.description')}}</label>
                <textarea name="description" id="desc2" rows="4" class="form-control" placeholder="{{__('ui.profile.description')}} ..."></textarea>
            </div>
        </div>
    </div>
    <div class="text-right mb-5">
        <button class="btn btn-success">{{__('ui.save')}}</button>
    </div>
</form>
@stop