@extends('layouts.site')

@section('content')
@if($startups->count())
<section>
	<h2 class="text-center mb-3">{{__('ui.startups.title')}}</h2>
	<div class="container">
		<div class="row eq-group">
			@foreach($startups as $item)
			<div class="col-md-4 mb-3">
				<div class="card custom-shadow overflow-hidden">
					<div class="preview_img" @if($item->image) style="background-image: url(/storage/{{$item->image}})" @else style="background-image: url(/img/noimg.jpg)" @endif></div>
					<div class="card-body ">
						<div class="eq-height">
							<h4 class="caption">{{$item->name}}</h4>
							<p class="small text-muted mb-0">{{strlen($item->preview) > 130 ? substr($item->preview, 0, 130) . " ..." : $item->preview}}</p>
						</div>
						<hr>
						<small><b>{{__('ui.startups.price')}}</b></small> {{$item->price_real}} of {{$item->price_of}}
						<div><a class="small" href="{{route('startups.show', $item->id)}}" class="link-default">{{__('ui.links.more')}}</a></div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endif
<section>
	<div class="overlay center"></div>
	<div class="container">
		<h2 class="text-center mb-3">
			{{__('ui.howtobuy.title')}}
		</h2>
		<div class="block">
			<div class="row no-gutters">
				@foreach(__('ui.howtobuy.items') as $key => $item)
				<div class="col-md-4 mb-3 mb-md-0 px-2">
					<div class="d-flex align-items-top">
						<div>
							<div class="number mr-3">{{$key + 1}}</div>
						</div>
						<div class="pt-2">
							<div class="h5">{{$item['title']}}</div>
							<div>{{$item['text']}}</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="text-center mt-3"><a href="{{route('cabinet.index')}}" class="btn rounded-pill btn-primary px-4">{{__('ui.signupnow')}}</a></div>
		</div>
	</div>
</section>
<section>
	<div class="overlay right"></div>
	<div class="container">
		<h2 class="text-center">{{__('ui.whatsis.title')}}</h2>
		<p class="text-center mb-3">{{__('ui.whatsis.text')}}</p>
		<div class="row">
			@foreach(__('ui.whatsis.items') as $key => $item)
			<div class="col-md-4 mb-3 mb-md-0">
				<div class="block text-center">
					<img src="/img/wtf-{{$key + 1}}.png" class="img-fluid mb-3" style="max-height: 64px" alt="">
					<div class="h5 mb-0">{{$item['title']}}</div>
					<p class="small mb-0">{{$item['text']}}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<section>
	<div class="container special">
		<h2 class="text-center">{{__('ui.special.title')}}</h2>
		<p class="text-center mb-3">{{__('ui.special.text')}}</p>
		<div class="row mb-1">
			<div class="col-md-4 mb-3 mb-md-0">
				<div class="card px-2 py-3 shadow">
					<div class="d-flex align-items-center">
						<div class="text-center money-value mr-2">
							<div class="big">
								<span class="text-primary">$</span>
								<span>0.5</span>
							</div>
							<span class="small">{{__('ui.special.offer2')}}</span>
						</div>
						<div class="flex-grow-1">
							<div class="money-title text-uppercase text-center">{{__('ui.special.offer1')}}</div>
							<div class="text-uppercase text-center font-weight-bolder">$500 {{__('ui.special.to')}} $3000</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3 mb-md-0">
				<div class="card px-2 py-3 shadow">
					<div class="d-flex align-items-center">
						<div class="text-center money-value mr-2">
							<div class="big">
								<span class="text-primary">$</span>
								<span>0.35</span>
							</div>
							<span class="small">{{__('ui.special.offer3')}}</span>
						</div>
						<div class="flex-grow-1">
							<div class="money-title text-uppercase text-center">{{__('ui.special.offer1')}}</div>
							<div class="text-uppercase text-center font-weight-bolder">$3000 {{__('ui.special.to')}} $10000</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-3 mb-md-0">
				<div class="card px-2 py-3 shadow">
					<div class="d-flex align-items-center">
						<div class="text-center money-value mr-2">
							<div class="big">
								<span class="text-primary">$</span>
								<span>0.25</span>
							</div>
							<span class="small">{{__('ui.special.offer5')}}</span>
						</div>
						<div class="flex-grow-1">
							<div class="money-title text-uppercase text-center">{{__('ui.special.offer4')}}</div>
							<div class="text-uppercase text-center font-weight-bolder">{{__('ui.special.offer6')}} 10000</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center mt-4">
			<a href="{{route('cabinet.account')}}" class="btn rounded-pill btn-primary px-5">{{__('ui.special.buy')}}</a>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-5 order-2 order-md-1">
				<div class="card card-body mb-3 mb-md-0" style="padding-top: 55px; padding-bottom: 45px">
					<h5 class="font-weight-bolder mb-3">{{__('ui.calculator.subname')}}</h5>
					<calculator button="{{__('ui.calculator.button')}}"></calculator>
				</div>
			</div>
			<div class="col-md-7 mb-3 mb-md-0 order-1  order-md-2">
				<img src="/img/calc.png" class="img-fluid">
			</div>
		</div>
	</div>
</section>
@if($posts->count())
<section>
	<h2 class="text-center">{{__('ui.news.title')}}</h2>
	<p class="text-center mb-3">{{__('ui.news.text')}}</p>
	<div class="container eq-group">
		<div class="row">
			@foreach($posts as $item)
			<div class="col-md-6 mb-3">
				@include('components.media-card', ['item' => $item])
			</div>
			@endforeach
		</div>
		<div class="text-center mt-3"><a href="{{route('posts.index')}}" class="btn rounded-pill btn-default">{{__('ui.news.button')}}</a></div>
	</div>
</section>
@endif
@stop