@extends('layouts.site')

@section('content')
<div class="container my-5">
	<div class="row align-items-center">
		<div class="col-md-3 mb-3 text-center">
			<img src="/img/about1.png">
			<div class="h2 text-uppercase">{{__('ui.about.title1')}}</div>
		</div>
		<div class="col-md-9 mb-3">
			{!!__('ui.about.text1')!!}
		</div>
	</div>
	<hr class="my-5">
	<h2 class="mb-4 text-uppercase text-center">{{__('ui.about.title2')}}</h2>
	<div class="row justify-content-center mb-5">
		<div class="col-md-8">
			{!!__('ui.about.text2')!!}
		</div>
	</div>
	<h3 class="text-center">{{__('ui.about.download_title')}}</h3>
	<p class="text-center mb-4">{{__('ui.about.download_subtitle')}}</p>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="row align-items-center text-center">
				<div class="col-md-6 mb-3 text-center">
					<a href="/files/paper.pdf" target="_blank" class="file_link">
						<img src="/img/about3.png" class="img-fluid mb-2 dark-none">
						<img src="/img/about3w.png" class="img-fluid mb-2 dark-block">
						<div>{{__('ui.about.link1')}}</div>
					</a>
				</div>
				<div class="col-md-6 mb-3 text-center">
					<a href="/files/road.jpg" target="_blank" class="file_link">
						<img src="/img/about2.png" class="img-fluid mb-2 dark-none">
						<img src="/img/about2w.png" class="img-fluid mb-2 dark-block">
						<div>{{__('ui.about.link2')}}</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="block has-overlay py-5 dark rounded my-5">
		<div class="h2 text-center">{{__('ui.about.subscribe')}}</div>
		<p class="text-center">{{__('ui.about.news')}}</p>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="alert alert-calc rounded-pill d-flex justify-content-between align-items-center py-1 pr-1">
					<input type="text" class="transparent d-block flex-grow-1" placeholder="@enter email">
					<button class="btn btn-sm btn-primary rounded-pill">
						<span class="d-none d-md-inline-block">{{__('ui.about.button')}}</span>
						<i class="fa fa-check d-md-none"></i>
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
        @foreach($posts as $item)
        <div class="col-md-6 mb-3">
            <div class="card card-default card-body mb-3">
                <div class="media d-md-flex d-block">
                    @if($item->image)
                    <img src="/storage/{{$item->image}}" alt="" class="mr-3" width="256px">
                    @endif
                    <div class="media-body">
                        <p>{{$item->name}}</p>
                        <small>{{$item->preview}}</small>
                        <hr>
                        <a class="small" href="{{route('posts.show', $item->id)}}" class="link-default">read-more</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop