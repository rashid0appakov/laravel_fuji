@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">New startup</div>
    <div class="col text-right"><a href="{{route('admin.startups.index')}}" class="btn btn-sm btn-primary">Back</a></div>
</div>
<hr>
<form action="{{route('admin.startups.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <nav>
        <div class="nav nav-tabs" role="tablist">
            @foreach(config('translatable.available_locale') as $key => $locale)
            <a class="nav-item nav-link @if(!$key) active @endif" data-toggle="tab" href="#{{$locale}}" role="tab">{{$locale}}</a>
            @endforeach
        </div>
    </nav>
    <div class="tab-content pt-3">
        @foreach(config('translatable.available_locale') as $key => $locale)
            <div class="tab-pane fade @if(!$key) show active @endif" id="{{$locale}}" role="tabpanel">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="name_{{$locale}}" value="{{old("name_$locale")}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" name="city_{{$locale}}" value="{{old("city_$locale")}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" class="form-control" name="user_{{$locale}}" value="{{old("user_$locale")}}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Preview text</label>
                    <textarea name="preview_{{$locale}}" rows="2" class="form-control">{{old("preview_$locale")}}</textarea>
                </div>
                <div class="form-group">
                    <label>Detail text</label>
                    <textarea name="text_{{$locale}}" rows="10" class="form-control">{{old("text_$locale")}}</textarea>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Price real</label>
                <input type="text" class="form-control" name="price_real" value="{{old('price_real')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Price of</label>
                <input type="text" class="form-control" name="price_of" value="{{old('price_of')}}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Finished date</label>
                <input placeholder="2020-10-22" type="text" class="form-control" name="finish" value="{{old('finish')}}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Image <input type="file" name="image"></label>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Save</button>
    </div>
</form>
@stop