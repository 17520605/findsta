@section('title', 'CryptoNews Favorites')
@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <div class="user-boxx king-profile">
        <div class="user-box">
            <div class="user-box-pt">
                <div class="user-box-cover">
                    <div data-king-img-src="https://res.cloudinary.com/dsldtailo/image/upload/v1670949819/findsta/default/happy-new-year-2023-background-with-minimal-red-line_1361-4043.webp_qmvgim.png" class="king-box-bg"></div>
                    <div class="user-box-up">
                        <div class="user-box-links"></div>
                        <a href="#" class="user-box-alink"><img data-king-img-src="{{$profile->avatar}}" class="king-avatar king-lazy" width="140" height="140">
                        </a>
                    </div>
                </div>
                <div class="user-box-in">
                    <div class="user-box-name">
                        <a href="{{ route('user.get.myseting')}}">
                            <h3>{{$profile->fname}} {{$profile->lname}}</h3>
                        </a>
                    </div>
                    <div class="king-stats">
                        <span><strong>0</strong>{{__('count_posts')}}</span><span><strong>0</strong>{{__('count_following')}}</span><span><strong>0</strong>{{__('count_followers')}}</span>
                    </div>
                    <div class="user-box-buttons">
                        <div id="follow_73"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="king-body-wrapper" class="king-body-in">
        <ul class="king-nav-sub-list">
            <li class="king-nav-sub-item king-nav-sub-profile">
                <a href="{{ route('user.get.myprofile')}}" class="king-nav-sub-link">{{__('info_my_profile')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-account">
                <a href="{{ route('user.get.myseting')}}" class="king-nav-sub-link">{{__('info_my_details')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-favorites">
                <a href="{{ route('user.get.myfavorite')}}" class="king-nav-sub-link king-nav-sub-selected">{{__('info_my_favorites')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-messages">
                <a href="{{ route('user.get.message')}}" class="king-nav-sub-link">{{__('info_messages')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-follower">
                <a href="{{ route('user.get.follower')}}" class="king-nav-sub-link">{{__('info_followers')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-following">
                <a href="{{ route('user.get.following')}}" class="king-nav-sub-link">{{__('info_following')}}</a>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <div class="king-main full-page">
            <div class="king-main-in">
                <div class="king-part-q-list king-inner">
                    <div class="container without-side">
                        <div class="grid-sizer"></div>
                        @foreach ($favorites as $favorite)
                        <div class="box king-q-list-item king-q-favorited " id="q{{ $favorite->list->id }}">
                            <div class="king-post-upbtn">
                                @if ($favorite->list->type === 'audio')
                                    <a href="{{ env('APP_URL') }}/{{ $favorite->list->id }}/{{ $favorite->list->slug }}" class="king-listen magnefic-button mgbutton" data-toggle="tooltip" data-placement="right" title="" data-original-title="Listen"><i class="fa-solid fa-headphones"></i></a>
                                @else
                                    <a href="{{ env('APP_URL') }}/{{ $favorite->list->id }}/{{ $favorite->list->slug }}" class="ajax-popup-link magnefic-button mgbutton" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_quick_view')}}"><i class="fa-solid fa-chevron-up"></i></a>
                                @endif
                                @if (Auth::check())
                                    <a href="javascript:void(0)" class="king-readlater {{$favorite->list->bookmark ? 'selected' : ''}}" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_bookmark')}}" data-bookmarkid="{{ $favorite->list->id }}" onclick="return bookmark(this);"> <i class="far fa-bookmark"></i></a>
                                @endif
                                <a href="{{ env('APP_URL') }}/{{ $favorite->list->id }}/{{ $favorite->list->slug }}" class="ajax-popup-share magnefic-button" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_share')}}"><i class="fas fa-share-alt"></i></a>
                            </div>
                            <div class="king-q-item-main">
                                <a class="item-a"
                                    href="{{ env('APP_URL') }}/{{ $favorite->list->id }}/{{ $favorite->list->slug }}">
                                    <span class="post-featured-img"><img class="item-img king-lazy" width="800" height="auto"
                                            data-king-img-src="{{ $favorite->list->thumbnail }}" alt="" /></span>
                                </a>
                                <div class="king-post-content">
                                    <div class="king-q-item-title">
                                        <div class="king-title-up">
                                            @if ($favorite->list->type === 'video')
                                                <a class="king-post-format" href="{{ env('APP_URL') }}/videos"><i
                                                class="fas fa-video"></i> Video</a>
                                            @elseif ($favorite->list->type === 'image')
                                                <a class="king-post-format" href="{{ env('APP_URL') }}/images"><i
                                                        class="fas fa-image"></i> Image</a>
                                            @elseif ($favorite->list->type === 'audio')
                                                <a class="king-post-format" href="{{ env('APP_URL') }}/images"><i
                                                        class="fa-solid fa-headphones"></i> Audio</a>
                                            @endif
                                            <a class="king-post-format" href="{{ env('APP_URL') }}/news"><i
                                                    class="fas fa-newspaper"></i> News</a>
                                            <span class="metah-where">
                                                <span class="metah-where-data"><a href="{{ env('APP_URL') }}/category/{{ $favorite->list->category }}"
                                                        class="king-category-link">{{ $favorite->list->category }}</a></span>
                                            </span>
                                        </div>
                                        <a href="{{ env('APP_URL') }}/{{ $favorite->list->id }}/{{ $favorite->list->slug }}">
                                            <h2
                                                style="overflow: hidden;
                                        display: -webkit-box;
                                        -webkit-line-clamp: 2;
                                        -webkit-box-orient: vertical;">
                                                {{ $favorite->list->title }}</h2>
                                        </a>
                                    </div>
                                    <div class="post-meta">
                                        <div class="king-p-who">
                                            <img data-king-img-src="https://ui-avatars.com/api/?name={{ $favorite->list->author }}&background=random&rounded=true"
                                                class="king-avatar king-lazy" width="27" height="27"><a
                                                href="#" class="king-user-link">{{ $favorite->list->author }}</a>
                                        </div>
                                        <div>
                                            <span><i class="fa fa-comment" aria-hidden="true"></i> {{ $favorite->list->comments }}</span>
                                            <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $favorite->list->viewer }}</span>
                                            <span><i class="fas fa-chevron-up"></i> {{ $favorite->list->votes }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
        <div class="king-suggest-next">
            {{__('span_favorites')}}
        </div>
    </div>
@endsection
@push('scripts')
@endpush
