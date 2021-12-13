<div class="card card-body shadow-lg">
    <div class="row no-gutters">
        @if($item->image)
            <div class="col-md-5 px-2 mb-md-0 mb-2">
                <img src="/storage/{{$item->image}}" alt="" class="rouneded-0 img-fluid"/>
            </div>
        @endif
        <div class="@if($item->image) col-md-7 @endif px-2">
            <div class="eq-height">
                <p class="caption mb-1">{{$item->name}}</p>
                <div class="small mb-2">{{strlen($item->preview) > 130 ? substr($item->preview, 0, 130) . " ..." : $item->preview}}</div>
            </div>
            <a class="small" href="{{route('posts.show', $item->id)}}" class="link-default">{{__('ui.links.more')}}</a>
        </div>
    </div>
</div>