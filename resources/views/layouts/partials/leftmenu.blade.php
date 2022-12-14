<div class="leftmenu kingscroll">
    <div class="leftmenu-left">
        <span>
            <button type="button" class="king-left-close" data-dismiss="modal" aria-label="Close"></button>
            @if (Auth::check())
                <a class="leftmenu-lout" href="{{ route('user.get.message')}}" data-toggle="tooltip" data-placement="right" title="{{__('private_messages')}}"><i class="fa-regular fa-envelope"></i></a>
                <a class="leftmenu-lout" href="{{ route('user.get.myfavorite')}}" data-toggle="tooltip" data-placement="right" title="{{__('my_favorites')}}"><i class="fa-solid fa-heart"></i></a>
                <a class="leftmenu-lout" href="{{ route('user.get.myseting')}}" data-toggle="tooltip" data-placement="right" title="{{__('my_settings')}}"><i class="fa-solid fa-gear"></i></a>
            @endif
        </span>
        <span>
            <input type="checkbox" id="king-night" class="hide"><label for="king-night" class="king-nightb"><i class="fa-solid fa-sun"></i><i class="fa-solid fa-moon"></i></label>
            @if (Auth::check())
                <a class="leftmenu-lout" href="{{ route('get.logout')}}" data-toggle="tooltip" data-placement="right" title="{{__('logout')}}"><i class="fas fa-sign-out-alt"></i></a>
            @endif
        </span>
    </div>
    <div class="king-nav-main">
        <ul class="king-nav-main-list">
            <li class="king-nav-main-item king-nav-main-home">
                <a href="{{ env('APP_URL') }}" class="king-nav-main-link active"><i class="fas fa-home"></i>{{ __('home') }}</a></a>
            </li>
            <li class="king-nav-main-item king-nav-main-hot">
                <a href="{{ env('APP_URL') }}" class="king-nav-main-link"><i class="fa-solid fa-clapperboard"></i> {{ __('videos') }}</a>
            </li>
            <li class="king-nav-main-item king-nav-main-news">
                <a href="{{ env('APP_URL') }}/audios" class="king-nav-main-link"><i class="fa-solid fa-headphones"></i> {{ __('audios') }}</a>
            </li>
            <li class="king-nav-main-item king-nav-main-ask">
                <a href="{{ env('APP_URL') }}/images" class="king-nav-main-link"><i class="fas fa-image"></i> {{ __('images') }}</a>
            </li>
            <li class="king-nav-main-item king-nav-main-tag">
                <a href="{{ env('APP_URL') }}/news" class="king-nav-main-link"><i class="fas fa-newspaper"></i> {{ __('news') }}</a>
            </li>
            <li class="king-nav-main-item king-nav-main-tag">
                <a href="{{ env('APP_URL') }}/hot" class="king-nav-main-link"><i class="fa-solid fa-fire-flame-simple"></i> {{ __('hot') }}!</a>
            </li>
            @if (Auth::check())
                <li class="king-nav-main-item king-nav-main-user">
                    <a href="{{ env('APP_URL') }}/follow" class="king-nav-main-link"><i class="fa-solid fa-star"></i> {{ __('follow') }}</a>
                </li>
            @endif
        </ul>
        <div class="king-nav-main-clear">
        </div>
    </div>
</div>
