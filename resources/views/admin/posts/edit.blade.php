@extends('layouts.admin')

@section('content')
    <form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <nav>
            <div class="nav nav-tabs" role="tablist">
                @foreach(config('translatable.available_locale') as $key => $locale)
                <a class="nav-item nav-link @if(!$key) active @endif" data-toggle="tab" href="#{{$locale}}" role="tab">{{$locale}}</a>
                @endforeach
            </div>
        </nav>
        <div class="tab-content pt-3">
            @foreach(config('translatable.available_locale') as $key => $locale)
                <?php $post->setLocale($locale); ?>
                <div class="tab-pane fade @if(!$key) show active @endif" id="{{$locale}}" role="tabpanel">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control @error("name_$locale") has-invalid @enderror" name="name_{{$locale}}" value="{{old("name_$locale", $post->name)}}">
                        @error("name_$locale")<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Preview text</label>
                        <textarea name="preview_{{$locale}}" rows="2" class="form-control @error("preview_$locale") has-invalid @enderror">{{old("preview_$locale", $post->preview)}}</textarea>
                        @error("preview_$locale")<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Detail text</label>
                        <textarea name="text_{{$locale}}" rows="7" class="form-control @error("text_$locale") has-invalid @enderror">{{old("text_$locale", $post->text)}}</textarea>
                        @error("text_$locale")<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                </div>
            @endforeach
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
            @if($post->image)
            <div class="col-md-6">
                <img src="/storage/{{$post->image}}" alt="{{$post->name}}" class="img-fluid">
            </div>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
@stop