@extends('layouts.admin')

@section('content')
    <form action="{{route('admin.slides.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->count())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label>Text</label>
            <textarea name="text" rows="10" class="form-control">{{old('text')}}</textarea>
        </div>
        <div class="form-group">
            <label>Image <input type="file" name="image"></label>
        </div>
        <div class="form-group">
            <button class="btn btn-outline-secondary">Save</button>
        </div>
    </form>
@stop