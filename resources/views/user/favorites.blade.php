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
                        <div class="box king-q-list-item king-q-favorited king-class-video" id="q9">
                            <div class="king-post-upbtn">
                                <a href="./9/mp4-video-simple-post" class="ajax-popup-link magnefic-button mgbutton"
                                    data-toggle="tooltip" data-placement="right" title="Quick View"><i
                                        class="fa-solid fa-chevron-up"></i></a>
                                <a href="#" class="king-readlater" data-toggle="tooltip" data-placement="right"
                                    title="Bookmark" data-bookmarkid="9" onclick="return bookmark(this);">
                                    <i class="far fa-bookmark"></i>
                                </a>
                                <a href="./9/mp4-video-simple-post" class="ajax-popup-share magnefic-button"
                                    data-toggle="tooltip" data-placement="right" title="Share"><i
                                        class="fas fa-share-alt"></i></a>
                            </div>
                            <div class="king-q-item-main">
                                <A class="item-a" HREF="./9/mp4-video-simple-post">
                                    <span class="post-featured-img"><img class="item-img king-lazy" width="1280"
                                            height="720"
                                            data-king-img-src="https://demos.kingthemes.net/king-include/uploads/2021/03/143534.jpg"
                                            alt="" /></span>
                                </A>
                                <div class="king-post-content">
                                    <div class="king-q-item-title">
                                        <div class="king-title-up">
                                            <a class="king-post-format" href="./type"><i class="fas fa-video"></i>
                                                Video</a>
                                            <span class="metah-where">
                                                <span class="metah-where-data"><a href="./technology"
                                                        class="king-category-link">Technology</a></span>
                                            </span>
                                        </div>
                                        <A HREF="./9/mp4-video-simple-post">
                                            <h2>Mp4 video simple post</h2>
                                        </A>
                                    </div>
                                    <div class="post-meta">
                                        <div class="king-p-who">
                                            <img data-king-img-src="https://demos.kingthemes.net/?qa=image&amp;qa_blobid=14473541867296403178&amp;qa_size=107"
                                                class="king-avatar king-lazy" width="27" height="27"><a
                                                href="./user/king" class="king-user-link">king</a>
                                        </div>
                                        <div>
                                            <span><i class="fa fa-comment" aria-hidden="true"></i> 0</span>
                                            <span><i class="fa fa-eye" aria-hidden="true"></i> 105</span>
                                            <span><i class="fas fa-chevron-up"></i> 0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
