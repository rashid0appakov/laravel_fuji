@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">New post</div>
    <div class="col text-right"><a href="{{route('admin.posts.index')}}" class="btn btn-sm btn-primary">Back</a></div>
</div>
<hr>
<form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="name_{{$locale}}" value="{{old("name_$locale")}}">
                </div>
                <div class="form-group">
                    <label>Preview</label>
                    <textarea name="preview_{{$locale}}" rows="2" class="form-control">{{old("preview_$locale")}}</textarea>
                </div>
                <div class="form-group">
                    <label>Text</label>
                    <textarea name="text_{{$locale}}" rows="10" class="form-control">{{old("text_$locale")}}</textarea>
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <label>Изображение <input type="file" name="image"></label>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Save</button>
    </div>
</form>
@stop