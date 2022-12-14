@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <div id="king-body-wrapper" class="king-body-in">
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
                            <span><i class="fa fa-eye" aria-hidden="true"></i> 576 </span>
                            <span><i class="fa fa-comment" aria-hidden="true"></i> 1</span>
                            <span><i class="fas fa-chevron-up"></i> 0</span>
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
                            <span><i class="fa fa-eye" aria-hidden="true"></i> 381 </span>
                            <span><i class="fa fa-comment" aria-hidden="true"></i> 0</span>
                            <span><i class="fas fa-chevron-up"></i> 0</span>
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
                            <span><i class="fa fa-eye" aria-hidden="true"></i> 681 </span>
                            <span><i class="fa fa-comment" aria-hidden="true"></i> 0</span>
                            <span><i class="fas fa-chevron-up"></i> 1</span>
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
                            <span><i class="fa fa-eye" aria-hidden="true"></i> 445 </span>
                            <span><i class="fa fa-comment" aria-hidden="true"></i> 0</span>
                            <span><i class="fas fa-chevron-up"></i> 0</span>
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
                            <span><i class="fa fa-eye" aria-hidden="true"></i> 466 </span>
                            <span><i class="fa fa-comment" aria-hidden="true"></i> 0</span>
                            <span><i class="fas fa-chevron-up"></i> 0</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
                                    <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}" class="ajax-popup-link magnefic-button mgbutton" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_quick_view')}}"><i class="fa-solid fa-chevron-up"></i></a>
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
                                    {{-- <A class="item-a" href="./29/multiple-wallpaper-images-enjoy-it">
                                    <span class="post-featured-img"><img class="item-img king-lazy" width="800"
                                            height="450"
                                            data-king-img-src="https://demos.kingthemes.net/king-include/uploads/2022/03/316676-macos-monterey-1920x1080-wwdc-2021-5k-23424.jpg"
                                            alt="" /></span>
                                </A> --}}
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
                                                <img data-king-img-src="https://demos.kingthemes.net/?qa=image&amp;qa_blobid=14473541867296403178&amp;qa_size=107"
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
                    </div>
                </div>
                <div class="king-page-links">
                    <ul class="king-page-links-list">
                        <li class="king-page-links-item">
                            <span class="king-page-selected">1</span>
                        </li>
                        <li class="king-page-links-item">
                            <a href="./?start=15" class="king-page-link">2</a>
                        </li>
                        <li class="king-page-links-item">
                            <a href="./?start=15" class="king-page-link">3</a>
                        </li>
                        <li class="king-page-links-item">
                            <a href="./?start=15" class="king-page-next"> &raquo;</a>
                        </li>
                    </ul>
                    <div class="king-page-links-clear">
                    </div>
                </div>
            </div> <!-- king-main-in -->
            @includeIf('layouts.partials.sidebar')
        </div> <!-- king-main -->
    </div>


@endsection
@section('scripts')
@stop