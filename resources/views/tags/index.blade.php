@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <div class="head-title">
        <span class="d-inline-block">#{{$tag}}</span>
    </div>
    <div id="king-body-wrapper" class="king-body-in">
        <div class="king-main full-page">
            <div class="king-main-in">
                <div class="king-part-q-list king-inner">
                    <div class="container without-side">
                        <div class="grid-sizer"></div>
                        @if (count($lists) > 0)
                            @foreach ($lists as $list)
                                <div class="box king-q-list-item king-class-video" id="q{{ $list->id }}">
                                    <div class="king-post-upbtn">
                                        <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}"
                                            class="ajax-popup-link magnefic-button mgbutton" data-toggle="tooltip"
                                            data-placement="right" title="Quick View"><i
                                                class="fa-solid fa-chevron-up"></i></a>
                                        <a href="#" class="king-readlater" data-toggle="tooltip"
                                            data-placement="right" title="Bookmark" data-bookmarkid="43"
                                            onclick="return bookmark(this);">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                        <a href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}"
                                            class="ajax-popup-share magnefic-button" data-toggle="tooltip"
                                            data-placement="right" title="Share"><i class="fas fa-share-alt"></i></a>
                                    </div>
                                    <div class="king-q-item-main">
                                        <a class="item-a"
                                            href="{{ env('APP_URL') }}/{{ $list->id }}/{{ $list->slug }}">
                                            <span class="post-featured-img"><img class="item-img king-lazy" width="800" height="auto" data-king-img-src="{{ $list->thumbnail }}" alt="" /></span>
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