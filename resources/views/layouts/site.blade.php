<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{__('ui.title')}}">
    <meta name="author" content="Ansonika">
    <title>{{__('ui.title')}}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <!-- BASE CSS -->
    <link href="/css/app.css" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body id="front">
	<div>
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark pb-0">
				<div class="container">
					<a class="navbar-brand" href="{{route('home')}}"><img src="/img/logo.png" alt=""></a>
					<div>
						<a class="mode mr-2 d-inline-block d-md-none" href="#">
							<img src="/img/icons/sun.svg" class="sun">
							<img src="/img/icons/moon.svg" class="moon">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto d-flex align-items-center">
							@auth
							<li class="nav-item"><a class="nav-link pt-1" href="{{route('cabinet.index')}}"><img src="/img/icons/user.svg" alt=""></a></li>
							@else
							<li class="nav-item"><a class="nav-link pt-1" href="{{route('login')}}"><img src="/img/icons/user.svg" alt=""></a></li>
							@endauth
							<li class="nav-item @if(Route::is('home')) active @endif"><a class="nav-link" href="{{route('home')}}">{{__('ui.links.home')}}</a></li>
							<li class="nav-item @if(Route::is('about')) active @endif"><a class="nav-link" href="{{route('about')}}">{{__('ui.links.about')}}</a></li>
							<li class="nav-item @if(Route::is('posts.*')) active @endif"><a class="nav-link" href="{{route('posts.index')}}">{{__('ui.links.blog')}}</a></li>
							<li class="nav-item d-none d-md-block">
								<a class="nav-link mode pt-1" href="#">
									<img src="/img/icons/sun.svg" class="sun">
									<img src="/img/icons/moon.svg" class="moon">
								</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link d-flex justify-content-center align-items-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="/flags/4x3/{{$lang}}.svg" width="24px">
									<i class="fa fa-chevron-down ml-2"></i>
								</a>
								<div class="dropdown-menu py-0" aria-labelledby="navbarDropdown">
									@foreach($langs as $key => $item)
										<a class="dropdown-item" href="{{route('lang', $key)}}"><img src="/flags/4x3/{{$key}}.svg" width="24px"> {{$item}}</a>
									@endforeach
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			@if(Route::is('home'))
			<div class="container pb-3 pb-md-0 position-relative">
				<div class="img"></div>
				<div class="jumbotron px-0">
					<h1>{{__('ui.banner.title')}}</h1>
					<p style="width: 100%; max-width: 500px;">{{__('ui.banner.text')}}</p>
					<a href="{{route('cabinet.index')}}" class="btn rounded-pill btn-primary px-5">{{__('ui.banner.button')}}</a>
				</div>
				@if(env('APP_ENV') != 'local')
				<div class="tradingview-widget-container my-5">
					<div class="tradingview-widget-container__widget"></div>
					<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
					{
					"symbols": [
						{
						"proName": "FOREXCOM:SPXUSD",
						"title": "S&P 500"
						},
						{
						"proName": "FOREXCOM:NSXUSD",
						"title": "NASDAQ 100"
						},
						{
						"proName": "FX_IDC:EURUSD",
						"title": "EUR/USD"
						},
						{
						"proName": "BITSTAMP:BTCUSD",
						"title": "BTC/USD"
						},
						{
						"proName": "BITSTAMP:ETHUSD",
						"title": "ETH/USD"
						}
					],
					"showSymbolLogo": true,
					"colorTheme": "dark",
					"isTransparent": false,
					"displayMode": "adaptive",
					"locale": "ru"
					}
					</script>
				</div>
				@endif
				<div class="row">
					<div class="col-4 text-primary text-center d-md-flex d-block align-items-center justify-content-start mb-3 mb-md-0">
						<img src="/img/menu2.png" class="d-inline-block mr-md-3 mr-0 mb-3 mb-md-0" width="48px">
						<div>{{__('ui.banner.link1')}}</div>
					</div>
					<div class="col-4 text-primary text-center d-md-flex d-block align-items-center justify-content-start mb-3 mb-md-0">
						<img src="/img/menu3.png" class="d-inline-block mr-md-3 mr-0 mb-3 mb-md-0" width="48px">
						<div>{{__('ui.banner.link2')}}</div>
					</div>
					<div class="col-4 text-primary text-center d-md-flex d-block align-items-center justify-content-start mb-3 mb-md-0">
						<img src="/img/menu1.png" class="d-inline-block mr-md-3 mr-0 mb-3 mb-md-0" width="48px">
						<div>{{__('ui.banner.link3')}}</div>
					</div>
				</div>
			</div>
			@endif
		</header>
		<main class="d-block pb-5" id="app">
			<div class="container py-3">
				<div class="bread d-flex align-items-center">
					@yield('bread')
				</div>
			</div>
			@yield('content')
		</main>
	</div>
	<footer>
		<div class="container py-5">
			<div class="row">
				<div class="col-md-3">
					<p><img src="/img/logo.png" width="192" height="42" data-retina="true" alt=""></p>
					<p>{{__('ui.footer.desc')}}</p>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
							<p class="font-weight-bolder">{{__('ui.footer.links')}}</p>
							<a href="{{route('posts.index')}}" class="text-white d-block">{{__('ui.links.blog')}}</a>
							<a href="{{route('login')}}" class="text-white d-block">{{__('ui.links.login')}}</a>
							<a href="{{route('register')}}" class="text-white d-block">{{__('ui.links.register')}}</a>
						</div>
						<div class="col-md-6">
							<p class="font-weight-bolder">{{__('ui.footer.contacts')}}</p>
							<a href="mailto:support@fijico.org" class="d-block text-white mb-2">support@fijico.org</a>
							<a href="https://twitter.com/fjtfuji?s=21" class="mx-2"><img src="/img/icons/tw.svg" alt=""></a>
							<a href="https://t.me/fuji_company" class="mx-2"><img src="/img/icons/tg.svg" alt=""></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
