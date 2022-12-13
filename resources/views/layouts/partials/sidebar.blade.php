<div class="rightsidebar">
    <div class="king-widgets-side king-widgets-side-top">
        <div class="king-widget-side king-widget-side-top">
            <div class="tagcloud king-widget-wb">
                <div class="widget-title">
                    {{__('tag_clouds')}}
                </div>
                <a href="{{env('APP_URL')}}/tag/video">video</a>
                <a href="{{env('APP_URL')}}/tag/music">music</a>
                <a href="{{env('APP_URL')}}/tag/art">art</a>
                <a href="{{env('APP_URL')}}/tag/vimeo">vimeo</a>
                <a href="{{env('APP_URL')}}/tag/instagram">instagram</a>
                <a href="{{env('APP_URL')}}/tag/design">design</a>
                <a href="{{env('APP_URL')}}/tag/list">list</a>
                <a href="{{env('APP_URL')}}/tag/blog">blog</a>
                <a href="{{env('APP_URL')}}/tag/playlist">playlist</a>
                <a href="{{env('APP_URL')}}/tag/btc">btc</a>
                <a href="{{env('APP_URL')}}/tag/news">news</a>
                <a href="{{env('APP_URL')}}/tag/soundcloud">soundcloud</a>
                <a href="{{env('APP_URL')}}/tag/wallpaper">wallpaper</a>
            </div>
        </div>
        <div class="king-widget-side king-widget-side-top">
            <div class="ilgilit">
                <div class="widget-title">
                    {{__('top_videos')}}
                </div>
                <div class="ilgili">
                    @foreach ($topvideos as $topvideo)
                        <div class="simple-posts"><a href="{{ env('APP_URL') }}/{{ $topvideo->id }}/{{ $topvideo->slug }}">
                            <div class="simple-post">
                                <div class="king-box-bg"
                                    data-king-img-src="{{$topvideo->thumbnail}}">
                                </div>
                            </div>
                        </a>
                        <div class="simple-post-content"><a href="{{ env('APP_URL') }}/{{ $topvideo->id }}/{{ $topvideo->slug }}"
                                class="simple-post-title">{{$topvideo->title}}</a></div>
                        <div class="simple-post-meta"><span><i class="fa fa-eye" aria-hidden="true"></i> 210
                            </span><span><i class="fa fa-comment" aria-hidden="true"></i> 0</span><span><i
                                    class="fas fa-chevron-up"></i> 0</span></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="king-widget-side king-widget-side-top">
            <div class="king-widget-wb">
                <div class="widget-title">
                    {{__('categories')}}
                </div>
                <div class="king-cat-side">
                    <ul class="king-nav-cat-list king-nav-cat-list-1">
                        @foreach ($categories as $category)
                        <li class="king-nav-cat-item king-nav-cat-entertainment">
                            <a href="./{{ $category->slug}}" class="king-nav-cat-link"><span style="color: {{ $category->color}}"><i
                                        class="fa-brands {{ $category->icon}}"></i></span>{{ $category->name}}</a>
                            <span class="king-nav-cat-note">(1)</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="king-nav-cat-clear">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="king-sidebar king-widget-wb">
        <div
            style="display: block;
            position: relative;
            background-color: #afadc4a3;
            height: 220px;
            width: 100%;
            text-align: center;
            line-height: 220px;
            font-size: 22px;
            margin: auto;
            border-radius: 14px;
            padding: 2px;
            color: #fff;
            border: 2px dashed #ffffff;">
            <img style="width: 100%;height:100%;object-fit: cover;border-radius: 14px;" src="https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/167047936/original/3728fdd42eb2fac30262425a549a90d3b637be13/do-the-best-banner-design-for-you.jpg" alt=""></div>
    </div>

</div>
