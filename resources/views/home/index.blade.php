@section('title', 'Findsta Home')
@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <div id="king-body-wrapper" class="king-body-in">
        @if (count($features) > 4)
            <div class="king-featureds grids-2">
                <div class="king-featured-grid">
                    <div class="featured-posts grid-1">
                        <a href="{{ env('APP_URL') }}/{{ $features[0]->id }}/{{ $features[0]->slug }}">
                            <div class="featured-post">
                                <div class="king-box-bg" data-king-img-src="{{ $features[0]->thumbnail }}">
                                </div>
                            </div>
                        </a>
                        <div class="featured-content">
                            <a href="{{ env('APP_URL') }}/{{ $features[0]->id }}/{{ $features[0]->slug }}"
                                class="featured-title">{{ $features[0]->title }}</a>
                            <div class="featured-meta">
                                <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $features[0]->viewer }} </span>
                                <span><i class="fa fa-comment" aria-hidden="true"></i> {{ $features[0]->comments }}</span>
                                <span><i class="fas fa-chevron-up"></i> {{ $features[0]->votes }}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="featured-posts grid-2">
                        <a href="{{ env('APP_URL') }}/{{ $features[1]->id }}/{{ $features[1]->slug }}">
                            <div class="featured-post">
                                <div class="king-box-bg" data-king-img-src="{{ $features[1]->thumbnail }}">
                                </div>
                            </div>
                        </a>
                        <div class="featured-content">
                            <a href="{{ env('APP_URL') }}/{{ $features[1]->id }}/{{ $features[1]->slug }}"
                                class="featured-title">{{ $features[1]->title }}</a>
                            <div class="featured-meta">
                                <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $features[1]->viewer }} </span>
                                <span><i class="fa fa-comment" aria-hidden="true"></i> {{ $features[1]->comments }}</span>
                                <span><i class="fas fa-chevron-up"></i> {{ $features[1]->votes }}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="featured-posts grid-3">
                        <a href="{{ env('APP_URL') }}/{{ $features[2]->id }}/{{ $features[2]->slug }}">
                            <div class="featured-post">
                                <div class="king-box-bg" data-king-img-src="{{ $features[2]->thumbnail }}">
                                </div>
                            </div>
                        </a>
                        <div class="featured-content">
                            <a href="{{ env('APP_URL') }}/{{ $features[2]->id }}/{{ $features[2]->slug }}"
                                class="featured-title">{{ $features[2]->title }}</a>
                            <div class="featured-meta">
                                <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $features[2]->viewer }} </span>
                                <span><i class="fa fa-comment" aria-hidden="true"></i> {{ $features[2]->comments }}</span>
                                <span><i class="fas fa-chevron-up"></i> {{ $features[2]->votes }}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="featured-posts grid-4">
                        <a href="{{ env('APP_URL') }}/{{ $features[3]->id }}/{{ $features[3]->slug }}">
                            <div class="featured-post">
                                <div class="king-box-bg" data-king-img-src="{{ $features[3]->thumbnail }}">
                                </div>
                            </div>
                        </a>
                        <div class="featured-content">
                            <a href="{{ env('APP_URL') }}/{{ $features[3]->id }}/{{ $features[3]->slug }}"
                                class="featured-title">{{ $features[3]->title }}</a>
                            <div class="featured-meta">
                                <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $features[3]->viewer }} </span>
                                <span><i class="fa fa-comment" aria-hidden="true"></i> {{ $features[3]->comments }}</span>
                                <span><i class="fas fa-chevron-up"></i> {{ $features[3]->votes }}</span>
                            </div>
                        </div>
                    </div>
    
                    <div class="featured-posts grid-5">
                        <a href="{{ env('APP_URL') }}/{{ $features[4]->id }}/{{ $features[4]->slug }}">
                            <div class="featured-post">
                                <div class="king-box-bg" data-king-img-src="{{ $features[4]->thumbnail }}">
                                </div>
                            </div>
                        </a>
                        <div class="featured-content">
                            <a href="{{ env('APP_URL') }}/{{ $features[4]->id }}/{{ $features[4]->slug }}"
                                class="featured-title">{{ $features[4]->title }}</a>
                            <div class="featured-meta">
                                <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $features[4]->viewer }} </span>
                                <span><i class="fa fa-comment" aria-hidden="true"></i> {{ $features[4]->comments }}</span>
                                <span><i class="fas fa-chevron-up"></i> {{ $features[4]->votes }}</span>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>  
        @endif
        <ul class="king-nav-sub-list">
            <li class="king-nav-sub-item king-nav-sub-recent">
                <h3 style="padding: 20px">{{__('list_new_post')}}</h3>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <div class="king-main full-page">
            <div class="king-main-in">
                <div class="king-part-q-list king-inner">
                    <div class="container with-side">
                        <div class="grid-sizer"></div>
                        @foreach ($lists as $list)
                            <div class="box king-q-list-item" id="q{{ $list->id }}">
                                <div class="king-post-upbtn">
                                    @if ($list->type === 'audio')
                                        <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}" class="king-listen magnefic-button mgbutton" data-toggle="tooltip" data-placement="right" title="" data-original-title="Listen"><i class="fa-solid fa-headphones"></i></a>
                                    @else
                                        <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}" class="ajax-popup-link magnefic-button mgbutton" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_quick_view')}}"><i class="fa-solid fa-chevron-up"></i></a>
                                    @endif
                                    @if (Auth::check())
                                        <a href="javascript:void(0)" class="king-readlater {{$list->bookmark ? 'selected' : ''}}" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_bookmark')}}" data-bookmarkid="{{ $list->id }}" onclick="return bookmark(this);"> <i class="far fa-bookmark"></i></a>
                                    @endif
                                    <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}" class="ajax-popup-share magnefic-button" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_share')}}"><i class="fas fa-share-alt"></i></a>
                                </div>
                                <div class="king-q-item-main">
                                    <a class="item-a"
                                        href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}">
                                        <span class="post-featured-img"><img class="item-img king-lazy" width="800" height="auto"
                                                data-king-img-src="{{ $list->thumbnail }}" alt="" /></span>
                                    </a>
                                    <div class="king-post-content">
                                        <div class="king-q-item-title">
                                            <div class="king-title-up">
                                                @if ($list->type === 'video')
                                                    <a class="king-post-format" href="{{ env('APP_URL') }}/videos"><i
                                                            class="fas fa-video"></i> Video</a>
                                                @elseif ($list->type === 'image')
                                                    <a class="king-post-format" href="{{ env('APP_URL') }}/images"><i
                                                            class="fas fa-image"></i> Image</a>
                                                @elseif ($list->type === 'audio')
                                                    <a class="king-post-format" href="{{ env('APP_URL') }}/images"><i
                                                            class="fa-solid fa-headphones"></i> Audio</a>
                                                @endif
                                                <a class="king-post-format" href="{{ env('APP_URL') }}/news"><i
                                                        class="fas fa-newspaper"></i> News</a>
                                                <span class="metah-where">
                                                    <span class="metah-where-data"><a href="{{ env('APP_URL') }}/category/{{ $list->category }}"
                                                            class="king-category-link">{{ $list->category }}</a></span>
                                                </span>
                                            </div>
                                            <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}">
                                                <h2
                                                    style="overflow: hidden;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 2;
                                            -webkit-box-orient: vertical;">
                                                    {{ $list->title }}</h2>
                                            </a>
                                        </div>
                                        <div class="post-meta">
                                            <div class="king-p-who">
                                                <img data-king-img-src="https://ui-avatars.com/api/?name={{ $list->author }}&background=random&rounded=true"
                                                    class="king-avatar king-lazy" width="27" height="27"><a
                                                    href="#" class="king-user-link">{{ $list->author }}</a>
                                            </div>
                                            <div>
                                                <span><i class="fa fa-comment" aria-hidden="true"></i> {{ $list->comments }}</span>
                                                <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $list->viewer }}</span>
                                                <span><i class="fas fa-chevron-up"></i> {{ $list->votes }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($pagination)
                    <div class="king-page-links">
                        <ul class="king-page-links-list">
                            <li class="king-page-links-item pagination-page-item prev {{$pagination["prev"] === false ? 'disabled' : ''}}" data-page="{{$pagination["prev"]}}">
                                <a class="king-page-prev"> &laquo;</a>
                            </li>
                            @for ($i = $pagination["first"]; $i <= $pagination["last"]; $i++)
                                <li class="king-page-links-item pagination-page-item page-item {{$i == $pagination["current"] ? 'active' : ''}}" data-page="{{$i}}">
                                    <a class="king-page-link page-link" onclick="return changeIconLoadPage(this)">{{$i}}</a>
                                </li>
                            @endfor
                            <li class="king-page-links-item pagination-page-item next {{$pagination["next"] === false ? 'disabled' : ''}}" data-page="{{$pagination["next"]}}">
                                <a class="king-page-next"> &raquo;</a>
                            </li>
                        </ul>
                        <div class="king-page-links-clear">
                        </div>
                    </div>
                @endif
            </div> <!-- king-main-in -->
            @includeIf('layouts.partials.sidebar')
        </div> <!-- king-main -->
    </div>
@endsection
@section('scripts')
<script>
    var url = new URL(window.location.href);
    function changeParams(param, value){
		if(param && value && param != '' && value != ''){
			url.searchParams.set(param, value);
			url = new URL(url.href);
		}
	}

	$(document).ready(function () {
		$('.pagination-page-item').not('.disabled').click(function () {
			$('.pagination-page-item').removeClass('active');
			$(this).addClass('active'); 0
			let page = $(this).attr('data-page');
			changeParams('page', page);
			window.location.href = url.href;
		});
    });

    function changeIconLoadPage(elem) {
        elem.innerHTML='';
        elem.innerHTML ='<i class="fas fa-spinner fa-pulse"></i>';
    }
</script>
@stop