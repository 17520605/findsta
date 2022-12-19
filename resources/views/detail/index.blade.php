<? ?>
@section('og-image', $blog->poster)
@section('og-title', $blog->title)
@section('og-description', $blog->desc)
@section('title', 'Findsta - '.$blog->title.'')
@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    
    @if ($blog->type === 'image')
        @if ($blog->fileId != 0)
            <div class="king-video-in">
                <div class="king-video">
                    <div class="king-gallery owl-carousel">
                        <a href="{{$blog->src}}">
                            <img class="gallery-img king-lazy" data-king-img-src="{{$blog->src}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @elseif($blog->type === 'video')
        <div class="king-video-in">
            <div class="king-video">
                @if ($blog->source === 'youtube')
                    <iframe width="800" height="450" src="{{$blog->src}}" frameborder="0" allowfullscreen></iframe>
                @else
                    <video id="my-video" class="video-js vjs-theme-forest" controls preload="auto" width="960" height="540" data-setup="{}">
                        <source src="{{$blog->src}}" type="video/mp4">
                    </video>
                @endif
            </div>
        </div>
    @elseif($blog->type === 'audio')
        <div class="king-video-in">
            <DIV CLASS="king-video">
                <DIV id="audio-playlist" CLASS="king-playlist-uo">
                    <img src="{{$blog->poster}}" class="king-playlist-thumb" >
                    <div class="vjs-playlist king-playlist-post" id="king-playlist" style="display:block;"></div>
                    <div class="king-playlist">
                        <div class="vjs-playlist" id="king-playlist" style="display:none;"></div>
                        <audio id="audio-vjs" class="video-js vjs-theme-sea" autoplay controls preload="auto" height="60" data-setup="{}"></audio >
                        <script type="application/json" class="king-playlist-data">[{"name":"{{$blog->title}}","sources":[{"src":"{{$blog->src}}","type":"audio\/mpeg"}]},{"name":"Sunny weather","sources":[{"src":"https:\/\/demos.kingthemes.net\/king-include\/uploads\/2022\/03\/125454-bensound-sunny.mp3","type":"audio\/mpeg"}]},{"name":"Energy","sources":[{"src":"https:\/\/demos.kingthemes.net\/king-include\/uploads\/2022\/03\/922863-bensound-energy.mp3","type":"audio\/mpeg"}]},{"name":"Tender","sources":[{"src":"https:\/\/demos.kingthemes.net\/king-include\/uploads\/2022\/03\/59745-bensound-tenderness.mp3","type":"audio\/mpeg"}]}]</script>
                    </div>
                </DIV>
            </DIV>
        </div>
    @endif
    <div id="king-body-wrapper" class="king-body-in">
        <div class="king-main post-page">
            <div class="king-main-in">
                <div class="king-part-q-view king-inner">
                    <div class="share-bar">
                        @if (Auth::check())
                            <form>
                                <div class="king-voting king-voting-net" id="voting_3">
                                    <div class="king-vote-buttons-netup">
                                        <button id="btn-like" title="{{__('tooltip_like')}}" {{$blog->like === true ? "disabled" : null}} style="opacity: {{$blog->like === true ? '0.3' : '1'}}" name="vote_3_1_q3" data-vote-id="{{$blog->id}}" onclick="return qa_vote_click(this);"  type="button" value="+"  class="king-vote-first-button king-vote-up-button"></button>
                                    </div>
                                    <div class="king-vote-count king-vote-count-net">
                                        <span class="king-netvote-count">
                                            <span id="count-vote" class="king-netvote-count-data">{{$blog->likecount}}</span>
                                            <input type="hidden" value="{{$blog->likecount}}" id="value-vote">
                                        </span>
                                    </div>
                                    <div class="king-vote-buttons-netdown">
                                        <button id="btn-disklike" title="{{__('tooltip_dislike')}}" {{$blog->like === false ? "disabled" : null}} style="opacity: {{$blog->like === false ? '0.3' : '1'}}" name="vote_3_-1_q3" data-vote-id="{{$blog->id}}" onclick="return qa_vote_click(this);" type="button" value="&ndash;" class="king-vote-second-button king-vote-down-button"></button>
                                    </div>
                                </div>
                            </form>
                            <span class="king-favoriting" id="favoriting">
                                <button title="{{$blog->favorite ? __('tooltip_remove_favorite') : __('tooltip_add_favorite')}}" data-favoriteid="{{$blog->id}}" onclick="return favorite(this);" value="Follow" class="{{$blog->favorite ? 'king-unfavorite-button' : 'king-favorite-button' }} "><i class="fa-solid fa-heart"></i></button>
                            </span>
                        @endif
                        <div class="share-link" data-toggle="modal" data-target="#sharemodal" role="button"><i data-toggle="tooltip" data-placement="top" class="fas fa-share" title="{{__('tooltip_share')}}"></i></div>
                        @if (Auth::check())
                            <a href="#" class="share-link {{$blog->bookmark ? 'selected':''}}" data-toggle="tooltip" data-placement="right" title="{{__('tooltip_bookmark')}}" data-bookmarkid="{{$blog->id}}" onclick="return bookmark(this);"><i class="far fa-bookmark"></i></a>
                        @endif
                    </div>
                    <div class="king-q-view hentry question" id="q3">
                        <div class="rightview">
                            <div class="pheader">
                                <H1>
                                    <span class="entry-title">{{$blog->title}}</span>
                                </H1>
                            </div>
                            <div class="post-content">
                                <p>{!!$blog->content!!}</p>
                            </div>
                            <div class="king-q-view-tags">
                            
                                <ul class="king-q-view-tag-list">
                                    @foreach ($blog->tags as $item)
                                    <li class="king-q-view-tag-item"><a href="{{ env('APP_URL') }}/tag/{{$item}}" rel="tag" class="king-tag-link">{{$item}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div style="margin: 10px 0px">   
                                <span class="king-view-count">
                                    <span class="king-view-count-data">{{number_format_short($blog->viewer)}}</span><span class="king-view-count-pad">
                                        {{__('views')}}</span>
                                </span>
                                <span class="meta-when">
                                    <span class="meta-when-data"><span class="published updated"><span class="value-title" title="2021-03-17T14:47:39+0000">{{$blog->updated_at->format('d M Y')}}</span></span></span>
                                </span>
                                <span class="king-view-count" style="float: right">
                                    <span class="king-view-count-data">{{__('author')}} : {{$blog->author}}</span></span>
                                </span>
                            </div>
                            <div class="prev-next">
                                @if ($next)
                                    <A href="{{ env('APP_URL') }}/{{$next->id}}/{{$next->slug}}" class="king-next-q"><i class="fas fa-angle-left"></i> <span>{{$next->title}}</span></A>
                                @endif
                                @if ($previous)
                                    <A href="{{ env('APP_URL') }}/{{$previous->id}}/{{$previous->slug}}" class="king-prev-q"> <span>{{$previous->title}}</span> <i class="fas fa-angle-right"></i></A>
                                @endif
                            </div>
                        </div>
                    </div> <!-- END king-q-view -->

                    <div id="sharemodal" class="king-modal-login">
                        <div class="king-modal-content">
                            <div class="social-share">
                                <h3>{{__('share')}}</h3>
                                <a class="post-share share-fb" data-toggle="tooltip" data-placement="top"
                                    title="Facebook" href="#" target="_blank" rel="nofollow"
                                    onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}','facebook-share-dialog','width=626,height=436');return false;"><i
                                        class="fab fa-facebook-square"></i></i></a>
                                <a class="social-icon share-tw" href="#" data-toggle="tooltip"
                                    data-placement="top" title="Twitter" rel="nofollow" target="_blank"
                                    onclick="window.open('http://twitter.com/share?text={{ $blog->title }};url={{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}','twitter-share-dialog','width=626,height=436');return false;"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="social-icon share-pin" href="#" data-toggle="tooltip"
                                    data-placement="top" title="Pin this" rel="nofollow" target="_blank"
                                    onclick="window.open('//pinterest.com/pin/create/button/?url={{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}','pin-share-dialog','width=626,height=436');return false;"><i
                                        class="fab fa-pinterest-square"></i></a>
                                <a class="social-icon share-em"
                                    href="mailto:?subject={{ $blog->title }}&amp;body={{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}"
                                    data-toggle="tooltip" data-placement="top" title="Email this"><i
                                        class="fas fa-envelope"></i></a>
                                <a class="social-icon share-tb" href="#" data-toggle="tooltip"
                                    data-placement="top" title="Tumblr" rel="nofollow" target="_blank"
                                    onclick="window.open( 'http://www.tumblr.com/share/link?url={{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}','tumblr-share-dialog','width=626,height=436' );return false;"><i
                                        class="fab fa-tumblr-square"></i></a>
                                <a class="social-icon share-linkedin" href="#" data-toggle="tooltip"
                                    data-placement="top" title="LinkedIn" rel="nofollow" target="_blank"
                                    onclick="window.open( 'http://www.linkedin.com/shareArticle?mini=true&amp;url={{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}','linkedin-share-dialog','width=626,height=436');return false;"><i
                                        class="fab fa-linkedin"></i></a>
                                <a class="social-icon share-vk" href="#" data-toggle="tooltip"
                                    data-placement="top" title="Vk" rel="nofollow" target="_blank"
                                    onclick="window.open(`http://vkontakte.ru/share.php?url={{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}`,'vk-share-dialog','width=626,height=436');return false;"><i
                                        class="fab fa-vk"></i></a>
                                <a class="social-icon share-wapp"
                                    href="whatsapp://send?text{{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}"
                                    data-action="share/whatsapp/share" data-toggle="tooltip" data-placement="top"
                                    title="whatsapp"><i class="fab fa-whatsapp-square"></i></a>
                                <h3>{{__('link_copy')}}</h3>
                                <input type="text" id="modal-url"
                                    value="{{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}">
                                <span class="copied" style="display: none;">{{__('copied')}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="pboxes">
                        <ul class="reactions" data-postid="3" data-valid="0">
                            <li class="reaction-item " id="reac1">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:0%;"></span>
                                    <span class="reaction-percent">0%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="1" data-voted="3" data-uvoted="0"
                                    onclick="return reacclick(this);">Haha</div>
                            </li>
                            <li class="reaction-item " id="reac2">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:0%;"></span>
                                    <span class="reaction-percent">0%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="2" data-voted="4" data-uvoted="0"
                                    onclick="return reacclick(this);">Love</div>
                            </li>
                            <li class="reaction-item " id="reac3">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:0%;"></span>
                                    <span class="reaction-percent">0%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="3" data-voted="3" data-uvoted="0"
                                    onclick="return reacclick(this);">Lol</div>
                            </li>
                            <li class="reaction-item " id="reac4">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:0%;"></span>
                                    <span class="reaction-percent">0%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="4" data-voted="0" data-uvoted="0"
                                    onclick="return reacclick(this);">Cute</div>
                            </li>
                            <li class="reaction-item " id="reac5">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:0%;"></span>
                                    <span class="reaction-percent">0%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="5" data-voted="0" data-uvoted="0"
                                    onclick="return reacclick(this);">Omg</div>
                            </li>
                            <li class="reaction-item " id="reac6">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:0%;"></span>
                                    <span class="reaction-percent">0%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="6" data-voted="0" data-uvoted="0"
                                    onclick="return reacclick(this);">WTF</div>
                            </li>
                            <li class="reaction-item " id="reac7">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:0%;"></span>
                                    <span class="reaction-percent">0%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="7" data-voted="0" data-uvoted="0"
                                    onclick="return reacclick(this);">Cry</div>
                            </li>
                            <li class="reaction-item " id="reac8">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:0%;"></span>
                                    <span class="reaction-percent">0%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="8" data-voted="0" data-uvoted="0"
                                    onclick="return reacclick(this);">Angry</div>
                            </li>
                        </ul>
                        <p style="text-align: center;padding-bottom: 10px">{{__('developing_function')}}</p>
                    </div>
                    <div class="maincom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#comments" data-toggle="tab"><i
                                        class="fa-solid fa-comment-dots"></i> {{__('tab_comments')}}</a></li>
                            <li><a href="#fbcomments" data-toggle="tab"><i class="fab fa-facebook"></i>  {{__('tab_comments')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="comments">
                                <div class="king-part-a-form">
                                    <input id="id-blog-detail" type="hidden" value="{{$blog->id}}">
                                    <input id="slug-blog-detail" type="hidden" value="{{$blog->slug}}">
                                    <div class="king-a-form" id="anew">
                                        <h2>Your Comment</h2>
                                        @if (Auth::check())
                                            <form class="commentForm">
                                                <table class="king-form-tall-table">
                                                    <tr>
                                                        <td class="king-form-tall-data">
                                                            <textarea name="message" ROWS="5" COLS="40" class="king-form-tall-text"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-label">
                                                            <label>
                                                                <input name="a_notify1" type="checkbox" class="king-form-tall-checkbox"> Email me (nguyenhuuminhkhai@gmail.com) if my Comment is voted or replied on
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" class="king-form-tall-buttons">
                                                            <button type="submit" class="king-form-tall-button king-form-tall-button-answer"><span class="icon-loader-comment"></span> Add Comment</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        @else
                                            <form  class="commentForm">
                                                <table class="king-form-tall-table">
                                                    <tbody><tr>
                                                        <td class="king-form-tall-data">
                                                            <textarea name="message" rows="5" cols="40" class="king-form-tall-text"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-label">
                                                            {{__('name_comment')}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-data">
                                                            <input name="name" type="text" value="" class="king-form-tall-text">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-label">
                                                            <label>
                                                                <input name="a_notify"  id="a_email_shown_comment" type="checkbox" class="king-form-tall-checkbox">
                                                                <span style="display: none;"></span><span id="a_email_hidden" style="">{{__('email_replied')}}</span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    </tbody><tbody id="a_email_display_comment" style="display: none;">
                                                        <tr>
                                                            <td class="king-form-tall-data">
                                                                <input name="email" type="text" value="" class="king-form-tall-text">
                                                                <span class="notify-comment"></span>
                                                                <div class="king-form-tall-note">{{__('comment_privacity')}}</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td class="king-form-tall-data">
                                                                <div class="king-form-tall-note">{{__('comment_privacity')}} <a href="{{env('APP_URL')}}/login">{{__('login')}}</a> {{__('or')}} <a href="{{env('APP_URL')}}/register">{{__('register')}}</a>.</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="1" class="king-form-tall-buttons">
                                                                <button type="submit" class="king-form-tall-button king-form-tall-button-answer"><span class="icon-loader-comment"></span> {{__('add_comment')}}</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        @endif
                                    </div> <!-- END king-a-form -->
                                </div>
                                <div class="king-part-a-list">
                                    <div class="king-a-list" id="a_list">
                                        @foreach ($comments as $comment)
                                        <div class="king-a-list-item hentry answer" id="a{{$comment->id}}">
                                            <div class="king-a-item-main">
                                                <div class="commentmain">
                                                    <div class="a-top">
                                                        <span class="king-a-item-avatar-meta">
                                                            <span class="king-a-item-avatar">
                                                                <a href="$" class="king-avatar-link"><img src="{{$comment->userId ? $comment->profile->avatar : $comment->avatar}}" width="43" height="80" class="king-avatar-image" alt="" /></a>
                                                            </span>
                                                        </span>
                                                        <span class="meta-who">
                                                            <span class="meta-who-data">
                                                                <span class="vcard author"><a href="#" class="king-user-link url nickname">{{$comment->name}}</a></span>
                                                            </span>
                                                        </span>
                                                        <div class="king-a-item-content">
                                                            <a name="20"></a>
                                                            <div class="entry-content">{{$comment->message}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="a-alt">
                                                        <div class="king-a-selection"></div>
                                                        <form method="post" action="{{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}/removecomment">
                                                            @csrf
                                                            <input type="hidden" name="commentId" value="{{$comment->id}}">
                                                            <div class="king-a-item-buttons">
                                                                    <span class="king-form-light-button king-form-light-button-edit" data-comment-id="{{$comment->id}}" title="Edit this Comment" onclick="return showReplyForm(this)"> {{__('reply')}}</span>
                                                                @if (Auth::check())
                                                                    @if ($comment->userId = Auth::user()->id)
                                                                        <button class="king-form-light-button king-form-light-button-edit" title="Edit this Comment" type="submit" onclick="return changeIconSniper(this)"> {{__('delete')}}</button>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </form>
                                                        <span class="meta-when">
                                                            <span class="meta-when-data">
                                                                <span class="published updated"><span class="value-title">{{$comment->updated_at}}</span></span>
                                                            </span>
                                                        </span>
                                                    </div>                                                    
                                                </div>
                                                <div class="king-c-form" id="form-reply-{{$comment->id}}" style="margin-left: 120px;display: none;">
                                                    <h2>Your comment on this Comment:</h2>
                                                    @if (Auth::check())
                                                        <form class="replyForm">
                                                            <table class="king-form-tall-table">
                                                                <input type="hidden" name="commentId" value="{{$comment->id}}">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="king-form-tall-data">
                                                                            <textarea name="message" rows="5" cols="40" class="king-form-tall-text"></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="king-form-tall-label">
                                                                            <label>
                                                                                <input name="c20_notify" type="checkbox" value="1" class="king-form-tall-checkbox" />
                                                                                {{__('lable_checkbox_1')}} (nguyenhuuminhkhai@gmail.com) {{__('lable_checkbox_2')}}
                                                                            </label>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="1" class="king-form-tall-buttons">
                                                                            <button type="submit" class="king-form-tall-button king-form-tall-button-comment"><span class="icon-loader-reply"></span> Add Comment</button>
                                                                            <button type="button" class="king-form-tall-button king-form-tall-button-cancel" data-comment-id="{{$comment->id}}" onclick="return hideReplyForm(this)"> Cancel</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    @else
                                                        <form class="replyForm">
                                                            <input type="hidden" name="commentId" value="{{$comment->id}}">
                                                            <table class="king-form-tall-table">
                                                                <tbody><tr>
                                                                    <td class="king-form-tall-data">
                                                                        <textarea name="message" rows="5" cols="40" class="king-form-tall-text"></textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="king-form-tall-label">
                                                                        {{__('name_comment')}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="king-form-tall-data">
                                                                        <input name="name" type="text" value="" class="king-form-tall-text">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="king-form-tall-label">
                                                                        <label>
                                                                            <input name="a_notify2" data-email-reply="{{$comment->id}}" type="checkbox" class="king-form-tall-checkbox a_email_shown_reply" >
                                                                            <span style="display: none;"></span><span id="a_email_hidden" style=""> {{__('email_replied')}}</span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                </tbody><tbody id="a_email_display_reply_{{$comment->id}}" style="display: none;">
                                                                    <tr>
                                                                        <td class="king-form-tall-data">
                                                                            <input name="email" type="text" value="" class="king-form-tall-text">
                                                                            <span class="notify-comment"></span>
                                                                            <div class="king-form-tall-note"> {{__('comment_privacity')}}</div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="king-form-tall-data">
                                                                            <div class="king-form-tall-note">{{__('comment_verification')}} <a href="{{env('APP_URL')}}/login">{{__('login')}}</a> {{__('or')}} <a href="{{env('APP_URL')}}/register">{{__('register')}}</a>.</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="1" class="king-form-tall-buttons">
                                                                            <button type="submit" class="king-form-tall-button king-form-tall-button-comment"><span class="icon-loader-reply"></span> {{__('add_comment')}}</button>
                                                                            <button type="button" class="king-form-tall-button king-form-tall-button-cancel" data-comment-id="{{$comment->id}}" onclick="return hideReplyForm(this)"> {{__('cancel')}}</button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    @endif
                                                </div>
                                                @foreach ($comment->reply as $reply)
                                                    <div class="king-a-item-c-list" id="c{{$reply->id}}_list" style="margin-bottom: 10px">
                                                        <div class="king-c-list-item  hentry comment" id="{{$reply->id}}">
                                                            <span class="king-c-item-avatar-meta">
                                                                <span class="king-c-item-avatar">
                                                                    <a href="#" class="king-avatar-link"><img src="{{$reply->userId ? $reply->profile->avatar : $reply->avatar}}" width="80" height="80" class="king-avatar-image" alt=""></a>
                                                                </span>
                                                            </span>
                                                            <span class="meta-who">
                                                                <span class="meta-who-data"><span class="vcard author"><a href="#" class="king-user-link url nickname">{{$reply->name}}</a></span></span>
                                                            </span>
                                                            <div class="king-c-item-content">
                                                                <a name="60"></a><div class="entry-content">{{$reply->message}}</div>
                                                            </div>
                                                            <div class="king-c-item-footer">
                                                                <form method="post" action="{{ env('APP_URL') }}/{{ $blog->id }}/{{ $blog->slug }}/removereply">
                                                                    @csrf
                                                                    <input type="hidden" name="replyId" value="{{$reply->id}}">
                                                                    @if (Auth::check())
                                                                        @if ($comment->userId = Auth::user()->id)
                                                                            <button class="king-form-light-button king-form-light-button-edit" title="Edit this Comment" type="submit" onclick="return changeIconSniper(this)"> {{__('delete')}}</button>
                                                                        @endif
                                                                    @endif
                                                                    <span class="meta-when">
                                                                        <span class="meta-when-data"><span class="published updated"><span class="value-title" >{{$reply->updated_at}}</span></span></span>
                                                                    </span>
                                                                </form>
                                                            </div>
                                                            <div class="king-c-item-clear">
                                                            </div>
                                                        </div> <!-- END king-c-item -->
                                                    </div> 
                                                @endforeach
                                                <!-- END king-c-form -->
                                            </div>
                                            <!-- END king-a-item-main -->
                                            <div class="king-a-item-clear"></div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>                                
                            </div>
                            <div class="tab-pane " id="fbcomments">
                                <div class="fbcomments">
                                    <div class="fb-comments"
                                        data-href="https://demos.kingthemes.net/3/single-image-iphone-wallpaper"
                                        data-width="100%" data-numposts="10">
                                        <div style="display: flex;justify-content: center">
                                            <img style="width: 250px; cursor: pointer;" src="{{asset('assets/images/fb.png') }}" alt="">
                                        </div>
                                        <p style="text-align: center">{{__('developing_function')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="king-widgets-main king-widgets-main-low">
                    <div class="king-widget-main king-widget-main-low">
                        <div class="ilgilit under-content">
                            <div class="widget-title">
                                {{__('related_posts')}}
                            </div>
                            <div class="ilgili">
                                @foreach ($relateds as $related)
                                <div class="simple-posts">
                                    <a href="{{ env('APP_URL') }}/{{ $related->id }}/{{ $related->slug }}">
                                        <div class="simple-post">
                                            <div class="king-box-bg" data-king-img-src="{{ $related->thumbnail }}"></div>
                                        </div>
                                    </a>
                                    <div class="simple-post-content">
                                        <a href="{{ env('APP_URL') }}/{{ $related->id }}/{{ $related->slug }}" class="simple-post-title">{{$related->title}}</a>
                                    </div>
                                    <div class="simple-post-meta">
                                        <span><i class="fa fa-comment" aria-hidden="true"></i> {{ $related->comments }}</span>
                                        <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $related->viewer }}</span>
                                        <span><i class="fas fa-chevron-up"></i> {{ $related->votes }}</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>
    {{-- <div class="king-error">
        Your comment will be checked and approved shortly.
    </div> --}}

@endsection
@section('scripts')
    <script>
        $('.commentForm').submit(function (e) { 
            var id = $('#id-blog-detail').val();
            var slug = $('#slug-blog-detail').val();
            e.preventDefault();
            const data = $(this).serializeArray();
            $('.icon-loader-comment').html(`<i class="fas fa-spinner fa-spin"></i>`);
            $('.notify-comment').html(``);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: `{{ env('APP_URL') }}/${id}/${slug}/addcomment`,
                data: data,
                dataType: "json",
                success: function (response) {
                    document.location.reload(true);
                }
            });
            return false;
        });
        $('.replyForm').submit(function (e) { 
            var id = $('#id-blog-detail').val();
            var slug = $('#slug-blog-detail').val();
            e.preventDefault();
            const data = $(this).serializeArray();
            $('.icon-loader-reply').html(`<i class="fas fa-spinner fa-spin"></i>`);
            $('.notify-reply').html(``);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: `{{ env('APP_URL') }}/${id}/${slug}/addreply`,
                data: data,
                dataType: "json",
                success: function (response) {
                    document.location.reload(true);
                }
            });
            return false;
        });
    </script>
    <script>
        function showReplyForm(elem) {
            let id = elem.getAttribute('data-comment-id');
            let idForm = 'form-reply-' + id;
            const element = document.getElementById(idForm);
            element.style.display = "block";
        }        
        function hideReplyForm(elem) {
            let id = elem.getAttribute('data-comment-id');
            let idForm = 'form-reply-' + id;
            const element = document.getElementById(idForm);
            element.style.display = "none";
        }
        function changeIconSniper(elem) {
            elem.innerHTML='';
	        elem.innerHTML ='<i class="fas fa-spinner fa-pulse"></i> Deleting';
        }
    </script>
    <script>
        $("#a_email_shown_comment").change(function() {
            if(this.checked) {
                $("#a_email_display_comment").css("display","block")
            }
            else
            {
                $("#a_email_display_comment").css("display","none")
            }
        });
        $(".a_email_shown_reply").change(function() {
            debugger;
            var checked = $(this).prop('checked')
            if(checked)
            {
                var checkedId = $(this).attr("data-email-reply");
                let idReply = 'a_email_display_reply_' + checkedId;
                if(checkedId) {
                    $("#"+idReply).css("display","block")
                }
                else
                {
                    $("#"+idReply).css("display","none")
                }
            }else
            {
                var checkedId = $(this).attr("data-email-reply");
                let idReply = 'a_email_display_reply_' + checkedId;
                $("#"+idReply).css("display","none")
            }
        });

        var player = videojs(document.querySelector("#audio-vjs"), {
            controlBar: {
                fullscreenToggle: false,
                volumePanel: { inline: false, volumeControl: { vertical: true } },
            },
            inactivityTimeout: 0,
        });
    </script>
@endsection