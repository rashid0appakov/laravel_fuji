<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fuji Dashboard</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid px-0">
            <div class="row no-gutters w-100">
                <div class="col sidebar">
                    <div class="border-right border-left">
                        <div class="media d-flex align-items-center px-3 border-bottom py-1 position-relative">
                            @if(auth()->user()->photo)
                                <img width="53px" src="/storage/{{auth()->user()->photo}}" class="mr-3" alt="{{auth()->user()->name}}">
                            @else
                                <img width="53px" src="/img/nophoto.png" class="mr-3" alt="{{auth()->user()->name}}">
                            @endif
                            <div class="media-body">
                                <p class="font-weight-bolder mb-0">{{auth()->user()->name}}</p>
                                <small class="text-muted text-uppercase">{{auth()->user()->email}}</small>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary sidebar-toggle d-inline-block d-lg-none "><i class="fa fa-close"></i></button>
                        </div>
                        <div class="list-group border-0">
                            <a href="{{route('admin.slides.index')}}" class="@if(Route::is('admin.slides.*')) active @endif border-right-0 border-left-0 list-group-item list-group-item-action">Slides</a>
                            <a href="{{route('admin.posts.index')}}" class="@if(Route::is('admin.posts.*')) active @endif border-right-0 border-left-0 list-group-item list-group-item-action">Posts</a>
                            <a href="{{route('admin.startups.index')}}" class="@if(Route::is('admin.startups.*')) active @endif border-right-0 border-left-0 list-group-item list-group-item-action">Startups</a>
                            <a href="{{route('admin.users.index')}}" class="@if(Route::is('admin.users.*')) active @endif border-right-0 border-left-0 list-group-item list-group-item-action">Users</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="border-bottom shadow-sm px-3" style="padding-top:14px;padding-bottom:14px">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <span class="text-uppercase font-weight-bolder">Dashboard</span>
                            <div>
                                <form action="" class="d-inline-block mr-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" placeholder="Search...">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-search"></i></div>
                                        </div>
                                    </div>
                                </form>
                                <button class="btn btn-sm btn-outline-secondary mode">
                                    <i class="fa fa-moon-o"></i>
                                    <i class="fa fa-sun-o"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary"><i class="fa fa-bell"></i></button>
                                <div class="dropdown d-inline-block">
                                    <button data-toggle="dropdown" class="btn btn-sm btn-outline-secondary"><i class="fa fa-cogs"></i></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('cabinet.account') }}" class="dropdown-item">Account</a>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary sidebar-toggle d-inline-block d-lg-none "><i class="fa fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                    <main class="p-3">
                        <div>
                            @if(session()->has('success'))
                            <p class="text-success">{{session()->get('success')}}</p>
                            @elseif(session()->has('error'))
                            <p class="text-error">{{session()->get('error')}}</p>
                            @endif
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
