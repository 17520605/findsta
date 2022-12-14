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
                <a href="{{ route('user.get.myfavorite')}}" class="king-nav-sub-link">{{__('info_my_favorites')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-messages">
                <a href="{{ route('user.get.message')}}" class="king-nav-sub-link">{{__('info_messages')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-follower">
                <a href="{{ route('user.get.follower')}}" class="king-nav-sub-link king-nav-sub-selected">{{__('info_followers')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-following">
                <a href="{{ route('user.get.following')}}" class="king-nav-sub-link">{{__('info_following')}}</a>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <div class="king-main full-page">
            <div class="king-main-in">
                <div class="king-part-custom king-inner">
                    <div class="nopost"><i class="far fa-frown-open fa-4x"></i>{{__('nothing_found')}} !</div>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>
@endsection
@push('scripts')
@endpush
