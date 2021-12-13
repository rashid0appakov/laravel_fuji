<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{__('ui.dashboard')}}</title>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <script>
        if(window.localStorage.getItem('dark')){
            document.body.classList.add("bg1");
        }
    </script>
    <div id="app">
        <div class="container-fluid">
            <div class="row no-gutters w-100">
                <div class="col sidebar">
                    <div class="pb-5 pt-2">
                        <div class="w-100 text-right">
                            <button class="btn btn-sm btn-outline-secondary sidebar-toggle d-inline-block d-lg-none my-2 mr-2"><i class="fa fa-close"></i></button>
                        </div>
                        <div class="media d-none d-md-flex align-items-center px-3 py-1">
                            @if(auth()->user()->photo)
                                <img width="53px" src="/storage/{{auth()->user()->photo}}" class="rounded-circle mr-3" alt="{{auth()->user()->name}}">
                            @else
                                <img width="53px" src="/img/nophoto.png" class="rounded-circle mr-3" alt="{{auth()->user()->name}}">
                            @endif
                            <div class="media-body">
                                <p class="font-weight-bolder mb-0">{{auth()->user()->name}}</p>
                                <small class="text-uppercase">{{auth()->user()->email}}</small>
                            </div>
                        </div>
                        <div class="d-none d-md-block text-center py-3">
                            <div class="font-weight-bolder">{{__('ui.balance')}}</div>
                            <div class="text-uppercase big font-weight-bolder">{{auth()->user()->balance}} FJT</div>
                        </div>
                        <div class="list-group rounded-0 border-0">
                            <a href="{{route('cabinet.index')}}" class="@if(Route::is('cabinet.index')) active @endif py-3 list-group-item list-group-item-action"><i class="fa fa-money fa-lg mr-3"></i> <span class="font-weight-bold">{{__('ui.links.balance')}}</span></a>
                            <a href="{{route('cabinet.course')}}" class="@if(Route::is('cabinet.course')) active @endif py-3 list-group-item list-group-item-action"><i class="fa fa-graduation-cap fa-lg mr-3"></i> <span class="font-weight-bold">{{__('ui.links.course')}}</span></a>
                            <a href="{{route('cabinet.calculator')}}" class="@if(Route::is('cabinet.calculator')) active @endif py-3 list-group-item list-group-item-action"><i class="fa fa-calculator fa-lg mr-3"></i> <span class="font-weight-bold">{{__('ui.links.calculator')}}</span></a>
                        </div>
                        <div class="position-absolute text-center" style="bottom: 20px; width: 100%">
                            @if(!auth()->user()->tron_address)
                            <button class="btn btn-lg btn-primary rounded-pill" data-toggle="modal" data-target="#wallet">{{__('ui.connect')}}</button>
                            @else
                                <form method="post" action="{{route('cabinet.tron.update')}}" class="confirmed">
                                    @csrf
                                    <input type="hidden" name="address" value="">
                                    <button class="btn btn-lg btn-primary rounded-pill">{{__('ui.disconnect')}}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="px-3" style="padding-top:15px;padding-bottom:15px">
                        <div class="d-flex justify-content-end align-items-center w-100">
                            <div>
                                <form action="" class="d-none d-md-inline-block mr-3">
                                    <div class="input-group search">
                                        <input type="text" class="form-control form-control-sm" placeholder="{{__('ui.search')}}">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fa fa-search"></i></div>
                                        </div>
                                    </div>
                                </form>
                                <button class="btn btn-sm mode border-0">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="sun">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.248 14.9972C16.1656 14.9991 16.0829 15 16 15C9.92487 15 5 10.0751 5 3.99999C5 3.91709 5.00092 3.8344 5.00275 3.75192C3.17211 5.21851 2 7.47339 2 9.99996C2 14.4182 5.58172 18 10 18C12.5266 18 14.7814 16.8279 16.248 14.9972ZM17.4661 12.8812C16.989 12.9593 16.4992 13 16 13C11.0294 13 7 8.97055 7 3.99999C7 3.50074 7.04065 3.01099 7.11882 2.53386C7.25094 1.72745 7.49024 0.957097 7.82162 0.237915C6.96026 0.429276 6.14073 0.731729 5.37882 1.12946C2.18215 2.79821 0 6.14425 0 9.99996C0 15.5228 4.47715 20 10 20C13.8557 20 17.2017 17.8178 18.8705 14.6212C19.2682 13.8593 19.5707 13.0397 19.762 12.1784C19.0429 12.5098 18.2725 12.7491 17.4661 12.8812Z" fill="#ffffff"/>
                                    </svg>
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="moon">
                                        <path d="M11.998 20H9.99805V17H11.998V20ZM17.362 17.778L15.241 15.657L16.655 14.243L18.777 16.365L17.364 17.778H17.362ZM4.63405 17.778L3.21905 16.364L5.33905 14.242L6.75405 15.656L4.63405 17.777V17.778ZM10.998 15.007C8.23302 15.0059 5.99231 12.7637 5.99305 9.99867C5.99378 7.23364 8.23568 4.99263 11.0007 4.993C13.7657 4.99337 16.007 7.23497 16.007 10C16.0043 12.7649 13.763 15.0053 10.998 15.007ZM10.998 6.993C9.33759 6.9941 7.99231 8.34087 7.99305 10.0013C7.99378 11.6618 9.34025 13.0074 11.0007 13.007C12.6612 13.0066 14.007 11.6605 14.007 10C14.0054 8.33918 12.6589 6.99355 10.998 6.993ZM20.998 11H17.998V9H20.998V11ZM3.99805 11H0.998047V9H3.99805V11ZM16.654 5.758L15.241 4.343L17.362 2.221L18.777 3.636L16.655 5.757L16.654 5.758ZM5.34105 5.758L3.22105 3.637L4.63605 2.223L6.75605 4.345L5.34205 5.757L5.34105 5.758ZM11.998 3H9.99805V0H11.998V3Z" fill="#fff"/>
                                    </svg>

                                </button>
                                <button class="btn btn-sm border-0">
                                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 20C6.89605 19.9946 6.00092 19.1039 5.99 18H9.99C9.99211 18.2674 9.94113 18.5325 9.84 18.78C9.57766 19.382 9.04181 19.8211 8.4 19.96H8.395H8.38H8.362H8.353C8.23682 19.9842 8.11865 19.9976 8 20ZM16 17H0V15L2 14V8.5C1.94732 7.08912 2.26594 5.68913 2.924 4.44C3.57904 3.28151 4.6987 2.45888 6 2.18V0H10V2.18C12.579 2.794 14 5.038 14 8.5V14L16 15V17Z" fill="#fff"/>
                                    </svg>
                                </button>
                                <a href="{{route('home')}}" class="btn btn-sm border-0"><i class="fa fa-home" style="font-size: 28px"></i></a>
                                <div class="dropdown d-inline-block">
                                    <button data-toggle="dropdown" class="btn btn-sm border-0">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8199 20H8.17992C7.71003 20 7.30347 19.673 7.20292 19.214L6.79592 17.33C6.25297 17.0921 5.73814 16.7946 5.26092 16.443L3.42392 17.028C2.97592 17.1709 2.4889 16.9823 2.25392 16.575L0.429918 13.424C0.197506 13.0165 0.277577 12.5025 0.622918 12.185L2.04792 10.885C1.98312 10.2961 1.98312 9.70189 2.04792 9.113L0.622918 7.816C0.277068 7.49837 0.196966 6.98372 0.429918 6.576L2.24992 3.423C2.48491 3.0157 2.97192 2.82714 3.41992 2.97L5.25692 3.555C5.50098 3.37416 5.75505 3.20722 6.01792 3.055C6.27026 2.91269 6.52995 2.78385 6.79592 2.669L7.20392 0.787C7.30399 0.327969 7.71011 0.000494393 8.17992 0H11.8199C12.2897 0.000494393 12.6958 0.327969 12.7959 0.787L13.2079 2.67C13.4887 2.79352 13.7622 2.93308 14.0269 3.088C14.2739 3.23081 14.5126 3.38739 14.7419 3.557L16.5799 2.972C17.0276 2.82967 17.514 3.01816 17.7489 3.425L19.5689 6.578C19.8013 6.98548 19.7213 7.49951 19.3759 7.817L17.9509 9.117C18.0157 9.70589 18.0157 10.3001 17.9509 10.889L19.3759 12.189C19.7213 12.5065 19.8013 13.0205 19.5689 13.428L17.7489 16.581C17.514 16.9878 17.0276 17.1763 16.5799 17.034L14.7419 16.449C14.5093 16.6203 14.2677 16.7789 14.0179 16.924C13.7557 17.0759 13.4853 17.2131 13.2079 17.335L12.7959 19.214C12.6954 19.6726 12.2894 19.9996 11.8199 20ZM5.61992 14.229L6.43992 14.829C6.62477 14.9652 6.81743 15.0904 7.01692 15.204C7.20462 15.3127 7.39788 15.4115 7.59592 15.5L8.52892 15.909L8.98592 18H11.0159L11.4729 15.908L12.4059 15.499C12.8132 15.3194 13.1998 15.0961 13.5589 14.833L14.3799 14.233L16.4209 14.883L17.4359 13.125L15.8529 11.682L15.9649 10.67C16.0141 10.2274 16.0141 9.78064 15.9649 9.338L15.8529 8.326L17.4369 6.88L16.4209 5.121L14.3799 5.771L13.5589 5.171C13.1997 4.90671 12.8132 4.68175 12.4059 4.5L11.4729 4.091L11.0159 2H8.98592L8.52692 4.092L7.59592 4.5C7.39772 4.58704 7.20444 4.68486 7.01692 4.793C6.81866 4.90633 6.62701 5.03086 6.44292 5.166L5.62192 5.766L3.58192 5.116L2.56492 6.88L4.14792 8.321L4.03592 9.334C3.98672 9.77664 3.98672 10.2234 4.03592 10.666L4.14792 11.678L2.56492 13.121L3.57992 14.879L5.61992 14.229ZM9.99592 14C7.78678 14 5.99592 12.2091 5.99592 10C5.99592 7.79086 7.78678 6 9.99592 6C12.2051 6 13.9959 7.79086 13.9959 10C13.9932 12.208 12.2039 13.9972 9.99592 14ZM9.99592 8C8.90331 8.00111 8.01381 8.87885 7.99815 9.97134C7.98249 11.0638 8.84648 11.9667 9.93861 11.9991C11.0307 12.0315 11.9468 11.1815 11.9959 10.09V10.49V10C11.9959 8.89543 11.1005 8 9.99592 8Z" fill="#fff"/>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('cabinet.account') }}" class="dropdown-item">{{__('ui.account')}}</a>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">{{__('ui.logout')}}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <li class="nav-item dropdown d-inline-block">
                                    <a class="nav-link pt-1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="/flags/4x3/{{$lang}}.svg" width="24px">
                                        <i class="fa fa-chevron-down text-light ml-2"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdown">
                                        @foreach($langs as $key => $item)
                                            <a class="dropdown-item" href="{{route('lang', $key)}}"><img src="/flags/4x3/{{$key}}.svg" width="24px"> {{$item}}</a>
                                        @endforeach
                                    </div>
                                </li>
                                <button class="btn btn-sm sidebar-toggle d-inline-block d-lg-none border-0"><i class="fa fa-bars" style="font-size: 28px"></i></button>
                            </div>
                        </div>
                    </div>
                    <main class="pt-md-5 pl-md-5">
                        <div class="media d-md-none d-flex align-items-center py-1">
                            @if(auth()->user()->photo)
                                <img width="53px" src="/storage/{{auth()->user()->photo}}" class="rounded-circle mr-3" alt="{{auth()->user()->name}}">
                            @else
                                <img width="53px" src="/img/nophoto.png" class="rounded-circle mr-3" alt="{{auth()->user()->name}}">
                            @endif
                            <div class="media-body">
                                <p class="font-weight-bolder mb-0">{{auth()->user()->name}}</p>
                                <small class="text-uppercase">{{auth()->user()->email}}</small>
                            </div>
                        </div>
                        <div class="d-md-none d-block py-3">
                            <div class="text-light font-weight-bolder">{{__('ui.balance')}}</div>
                            <div class="text-uppercase text-light big font-weight-bolder">{{auth()->user()->balance}} FJT</div>
                        </div>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('success') || session()->has('error'))
    <div class="modal visible">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('ui.notifications')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success">{{__('ui.' . session('success'))}}</div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">{{__('ui.' . session('error'))}}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="modal @error('address') visible @enderror" id="wallet">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{route('cabinet.tron.update')}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">{{__('ui.connect')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__('ui.wallet_connect_hint')}}</p>
                        <p>{{__('ui.for_example')}}: TRGhNNfnmgLegT4zHNjEqDSADjgmnHvubJ</p>
                        <div class="form-group">
                            <input name="address" value="{{old('address', auth()->user()->tron_address)}}" type="password" class="@error('address') is-invalid @enderror form-control form-control-lg" placeholder="{{__('ui.wallet_connect_placeholder')}}">
                            @error('address')<div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('ui.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('ui.connect')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
