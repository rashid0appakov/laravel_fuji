@extends('layouts.admin')

@section('content')
    <form action="{{route('admin.startups.update', $startup->id)}}" method="post" enctype="multipart/form-data">
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
                <div class="tab-pane fade @if(!$key) show active @endif" id="{{$locale}}" role="tabpanel">
                <?php $startup->setLocale($locale); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control @error("name_$locale") is-invalid @enderror" name="name_{{$locale}}" value="{{old("name_$locale", $startup->name)}}">
                                @error("name_$locale")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control @error("city_$locale") is-invalid @enderror" name="city_{{$locale}}" value="{{old("city_$locale", $startup->city)}}">
                                @error("city_$locale")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>User</label>
                                <input type="text" class="form-control @error("user_$locale") is-invalid @enderror" name="user_{{$locale}}" value="{{old("user_$locale", $startup->user)}}">
                                @error("user_$locale")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Preview text</label>
                        <textarea name="preview_{{$locale}}" rows="2" class="form-control @error("preview_$locale") has-invalid @enderror">{{old("preview_$locale", $startup->preview)}}</textarea>
                        @error("preview_$locale")<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Detail text</label>
                        <textarea name="text_{{$locale}}" rows="7" class="form-control @error("text_$locale") has-invalid @enderror">{{old("text_$locale", $startup->text)}}</textarea>
                        @error("text_$locale")<span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Price real</label>
                    <input type="text" class="form-control @error('price_real') is-invalid @enderror" name="price_real" value="{{old('price_real', $startup->price_real)}}">
                    @error('price_real')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Price of</label>
                    <input type="text" class="form-control @error('price_of') is-invalid @enderror" name="price_of" value="{{old('price_of', $startup->price_of)}}">
                    @error('price_of')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Finished date</label>
                    <input placeholder="2020-10-22" type="text" class="form-control @error('finish') is-invalid @enderror" name="finish" value="{{old('finish', $startup->finish)}}">
                    @error('finish')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
            </div>
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
            @if($startup->image)
            <div class="col-md-6">
                <img src="/storage/{{$startup->image}}" alt="{{$startup->name}}" class="img-fluid">
            </div>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
@stop