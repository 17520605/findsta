<div class="king-header">
    <div class="header-left">
        <div class="king-left-toggle" data-toggle="dropdown" data-target=".leftmenu" aria-expanded="false" role="button">
            <span class="left-toggle-line"></span>
        </div>
        <div class="king-logo">
            <a href="{{env('APP_URL')}}" class="king-logo-link" title="King MEDIA">
              <img class="king-logol" src="{{ asset('logo/679494-kmedia.png') }}">
              <img class="king-logon" src="{{ asset('logo/543191-kmediaw.png') }}">
              <img class="king-mlogo" src="{{ asset('logo/313493-v7logo.png') }}">
              <img class="king-mlogon" src="{{ asset('logo/320249-favnew.png') }}">
            </a>
        </div>
    </div>
    <div class="header-middle">
        <ul class="king-nav-head-list">
            <li class="king-nav-head-item king-nav-head-home">
                <a href="{{ env('APP_URL') }}" id="home-head" class="king-nav-head-link active"><i class="fas fa-home"></i>
                    {{ __('home') }}</a>
            </li>
            <li class="king-nav-head-item king-nav-head-shorts">
                <a href="{{ env('APP_URL') }}/videos" id="videos-head" class="king-nav-head-link"><i class="fa-solid fa-clapperboard"></i>
                    {{ __('videos') }}</a>
            </li>
            <li class="king-nav-head-item king-nav-head-updates">
                <a href="{{ env('APP_URL') }}/audios" id="audios-head" class="king-nav-head-link"><i class="fa-solid fa-headphones"></i>
                    {{ __('audios') }}</a>
            </li>
            <li class="king-nav-head-item king-nav-head-reactions">
                <a href="{{ env('APP_URL') }}/images" id="images-head" class="king-nav-head-link"><i class="fa-solid fa-image"></i> {{ __('images') }}</a>
            </li>
            <li class="king-nav-head-item king-nav-head-type">
                <a href="{{ env('APP_URL') }}/news" id="news-head" class="king-nav-head-link"><i class="fas fa-newspaper"></i> {{ __('news') }}</a>
            </li>
            <li class="king-nav-head-item king-nav-head-hot">
                <a href="{{ env('APP_URL') }}/hot" id="hots-head" class="king-nav-head-link"><i class="fa-solid fa-fire-flame-simple"></i>
                    {{ __('hot') }}!</a>
            </li>
        </ul>
        <div class="king-nav-head-clear">
        </div>
        <div class="menutoggle" data-toggle="dropdown" data-target=".king-mega-menu" aria-expanded="false"><i
                class="fas fa-angle-down"></i></div>
        <div class="king-mega-menu">
            <div class="king-cat">
                <ul class="king-nav-cat-list king-nav-cat-list-4">
                    @foreach ($categories as $category)
                    <li class="king-nav-cat-item king-nav-cat-art">
                        <a href="{{ env('APP_URL') }}/category/{{ $category->slug}}" class="king-nav-cat-link"><span style="color:{{ $category->color}}"><i
                                    class="fa-brands {{ $category->icon}}"></i></span>{{ $category->name}}</a>
                        <span class="king-nav-cat-note">(4)</span>
                    </li>
                    @endforeach
                </ul>
                <div class="king-nav-cat-clear">
                </div>
            </div>
        </div>
    </div>
    <div class="header-right">
        <ul>
            @if (Auth::check())
                <li>
                    <div class="king-havatar" data-toggle="dropdown" data-target=".king-dropdown" aria-expanded="false">
                        <img data-king-img-src="{{ get_info_user(get_data_user('web'),'avatar')}}" class="king-avatar king-lazy" width="40" height="40">
                    </div>
                    <div class="king-dropdown">
                        <a href="#">
                            <h3>{{ get_info_user(get_data_user('web'),'name')}}</h3>
                        </a>
                        <ul class="king-nav-user-list">
                            <li class="king-nav-user-item king-nav-user-account">
                                <a href="./account" class="king-nav-user-link">{{__('my_settings')}}</a>
                            </li>
                            <li class="king-nav-user-item king-nav-user-updates">
                                <a href="./favorites" class="king-nav-user-link">{{__('my_favorites')}}</a>
                            </li>
                            <li class="king-nav-user-item king-nav-user-logout">
                                <span class="king-nav-user-nolink"> <a class="" title="Logout" href="{{ route('get.logout')}}"
                                        rel="nofollow">{{__('logout')}}</a></span>
                            </li>
                        </ul>
                        <div class="king-nav-user-clear">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="king-rlater" data-toggle="modal" data-target="#rlatermodal"
                        onclick="return bookmodal();">
                        <i class="fa-solid fa-bookmark"></i>
                        <input type="hidden" class="king-bmcountin" id="bcount" value="0">
                        <span class="king-bmcount" id="bcounter">0</span>
                    </div>
                </li>
                <li>
                    <div class="king-rlater king-history-new-event-link" title="Change language" data-toggle="modal" data-target="#langsmodal" aria-expanded="true" role="button"><i class="fa-solid fa-globe"></i></div>
                </li>
            @else
                <li>
                    <a class="reglink hreg" href="{{env('APP_URL')}}/register">{{__('register')}}</a>
                </li>
                <li>
                    <div class="reglink" data-toggle="modal" data-target="#loginmodal" role="button" title="{{__('login')}}">
                        <i class="fa-solid fa-user"></i></div>
                </li>
            @endif
                <li>
                    <div class="king-rlater king-history-new-event-link" title="Show notifications"
                        data-toggle="dropdown" data-target=".king-notify" aria-expanded="true" role="button"><i
                            class="far fa-bell fa-lg"></i></div>
                    <div class="king-notify nfyWrap">
                        <div class="nfyTop">{{__('notifications')}}</div>
                        <div class="nfyContainer"></div>
                        <div class="nfyFooter"><a id="nfyReadClose">{{__('close')}}</a></div>
                    </div>
                </li>
                <li>
                    <div class="king-submit">
                        <span class="kingadd" data-toggle="dropdown" data-target=".king-submit" aria-expanded="false"
                            role="button"><i class="fa-solid fa-circle-plus"></i></span>
                        <div class="king-dropdown2">
                            <a href="./news" class="kingaddnews"><i class="fas fa-newspaper"></i> News</a>
                            <a href="./submit" class="kingaddimg"><i class="fas fa-image"></i> Image</a>
                            <a href="./video" class="kingaddvideo"><i class="fas fa-video"></i> Video</a>
                            <a href="./poll" class="kingaddpoll"><i class="fas fa-align-left"></i> Poll</a>
                            <a href="./list" class="kingaddlist"><i class="fas fa-bars"></i> List</a>
                            <a href="./trivia" class="kingaddtrivia"><i class="fas fa-times"></i> Trivia Quiz</a>
                            <a href="./music" class="kingaddmusic"><i class="fas fa-headphones-alt"></i> Music</a>
                        </div>
                    </div>
                </li>
                <li class="search-button"><span data-toggle="dropdown" data-target=".king-search" aria-expanded="false"
                    class="search-toggle"><i class="fas fa-search fa-lg"></i></span></li>
        </ul>
    </div>
</div>
@includeIf('layouts.partials.leftmenu')
@includeIf('layouts.partials.search')
@includeIf('layouts.partials.modal')
@section('script')
<script>
    var url = new URL(window.location.href);
    var activeMenu = url.pathname;
    if(activeMenu == '/home' )
    {
        $('#home-head').addClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/videos' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').addClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/audios' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').addClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/images' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').addClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/news' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').addClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/hots' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').addClass('active');
    }
</script>
@stop