@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <div class="head-title">
        <span class="cat-title" style="background-color: #000000;"><i class="fa-solid fa-headphones"></i> Audios
            @if (Auth::check())
                <li class="king-nav-main-item king-nav-main-user">
                    <div class="follow-tc nfllowing" data-id="3" data-type="cat" onclick="return followTc(this);"><i class="fas fa-plus fa-lg"></i> <span>Follow</span></div>
                </li>
            @endif 
        </span>
    </div>
    <div id="king-body-wrapper" class="king-body-in">
        <div class="king-main full-page">
            <div class="king-main-in">
                <div class="king-part-q-list king-inner">
                    <div class="container without-side">
                        <div class="grid-sizer"></div>
                        @if (count($lists) > 0)
                            @foreach ($lists as $list)
                                <div class="box king-q-list-item" id="q{{ $list->id }}">
                                    <div class="king-post-upbtn">
                                        <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}" class="ajax-popup-link magnefic-button mgbutton" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_quick_view')}}"><i class="fa-solid fa-chevron-up"></i></a>
                                        @if (Auth::check())
                                            <a href="javascript:void(0)" class="king-readlater {{$list->bookmark ? 'selected' : ''}}" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_bookmark')}}" data-bookmarkid="{{ $list->id }}" onclick="return bookmark(this);"> <i class="far fa-bookmark"></i></a>
                                        @endif
                                        <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}" class="ajax-popup-share magnefic-button" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_share')}}"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                    <div class="king-q-item-main">
                                        <a class="item-a"
                                            href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}">
                                            <span class="post-featured-img"><img class="item-img king-lazy" width="800"
                                                    height="auto" data-king-img-src="{{ $list->thumbnail }}"
                                                    alt="" /></span>
                                        </a>
                                        <div class="king-post-content">
                                            <div class="king-q-item-title">
                                                <div class="king-title-up">
                                                    @if ($list->type === 'video')
                                                        <a class="king-post-format" href="#video"><i
                                                                class="fas fa-video"></i> Video</a>
                                                    @elseif ($list->type === 'image')
                                                        <a class="king-post-format" href="#images"><i
                                                                class="fas fa-image"></i> Image</a>
                                                    @elseif ($list->type === 'audio')
                                                        <a class="king-post-format" href="#images"><i
                                                                class="fa-solid fa-headphones"></i> Audio</a>
                                                    @endif
                                                    <a class="king-post-format" href="#news"><i
                                                            class="fas fa-newspaper"></i> News</a>
                                                    <span class="metah-where">
                                                        <span class="metah-where-data"><a href="#"
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
                                                    <span><i class="fa fa-comment" aria-hidden="true"></i> 0</span>
                                                    <span><i class="fa fa-eye" aria-hidden="true"></i> 210</span>
                                                    <span><i class="fas fa-chevron-up"></i> 0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div style="position: relative; width: 100%; margin-top: 100px">
                                <div class="nopost" style="width: 40%;">
                                <i class="far fa-frown-open fa-4x" style="font-size: 150px;"></i>{{ __('nothing_found') }} !</div>
                            </div>
                        @endif

                    </div>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>
@endsection
@push('scripts')

@endpush