@extends('layouts.site')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="POST" action="{{ route('password.email') }}">    
            @csrf
            <div class="form-group">
                <label>Your email</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </span>
            </div>
            <div class="form-group"><button class="btn btn-primary">Reset</button></div>
            <div class="d-flex justify-content-between align-items-center">
                <div>New to Fuji? <strong><a href="{{route('register')}}">Sign up!</a></strong></div>
                <div>Already have an acccount? <strong><a href="{{route('login')}}">Sign In</a></strong></div>
            </div>
        </form>
    </div>
</div>
@endsection
