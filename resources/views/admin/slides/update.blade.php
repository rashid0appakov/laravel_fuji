@extends('layouts.admin')

@section('content')
    <form action="{{route('admin.slides.update', $slide->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control @error('name') has-invalid @enderror" name="name" value="{{old('name') ? old('name') : $slide->name}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label>Text</label>
            <textarea name="text" rows="10" class="form-control @error('text') has-invalid @enderror">{{old('text') ? old('text') : $slide->text}}</textarea>
            @error('text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group @error('image') has-invalid @enderror">
                    <label>Image <input type="file" name="image"></label>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @if($slide->image)
            <div class="col-md-6">
                <img src="/storage/{{$slide->image}}" alt="{{$slide->name}}" class="img-fluid">
            </div>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-outline-secondary">Сохранить</button>
        </div>
    </form>
@stop