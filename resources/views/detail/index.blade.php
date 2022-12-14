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
    @endif
    <div id="king-body-wrapper" class="king-body-in">
        <div class="king-main post-page">
            <div class="king-main-in">
                <div class="king-part-q-view king-inner">
                    <div class="share-bar">
                        <FORM method="post" action="https://demos.kingthemes.net/3/single-image-iphone-wallpaper">
                            <div class="king-voting king-voting-net" id="voting_3">
                                <div class="king-vote-buttons-netup">
                                    <button title="I like this" name="vote_3_1_q3" onclick="return qa_vote_click(this);"
                                        type="submit" value="+"
                                        class="king-vote-first-button king-vote-up-button"></button>
                                </div>
                                <div class="king-vote-count king-vote-count-net">
                                    <span class="king-netvote-count">
                                        <span class="king-netvote-count-data">0<span class="votes-up"><span
                                                    class="value-title" title="0"></span></span><span
                                                class="votes-down"><span class="value-title"
                                                    title="0"></span></span></span><span
                                            class="king-netvote-count-pad">
                                            votes</span>
                                    </span>
                                </div>
                                <div class="king-vote-buttons-netdown">
                                    <button title="I dislike this" name="vote_3_-1_q3" onclick="return qa_vote_click(this);"
                                        type="submit" value="&ndash;"
                                        class="king-vote-second-button king-vote-down-button"></button>
                                </div>
                            </div>
                            <input type="hidden" name="code"
                                value="1-1669304788-cc60331768d7b208f416b3968d8bcc4a986adf19">
                        </FORM>
                        <FORM method="post" action="https://demos.kingthemes.net/3/single-image-iphone-wallpaper">
                            <span class="king-favoriting" id="favoriting">
                                <button title="Add this Post to my favorites" name="favorite_Q_3_1"
                                    onclick="return qa_favorite_click(this);" type="submit" value="Follow"
                                    class="king-favorite-button"><i class="fa-solid fa-heart"></i></button>
                            </span>
                            <input type="hidden" name="code"
                                value="1-1669304788-953d96b746213be4588524a06e15234203f99db1">
                        </FORM>
                        <div class="share-link" data-toggle="modal" data-target="#sharemodal" role="button"><i data-toggle="tooltip" data-placement="top" class="fas fa-share" title="Share"></i></div>
                        @if (Auth::check())
                            <a href="#" class="share-link" data-toggle="tooltip" data-placement="right" title="Bookmark"data-bookmarkid="3" onclick="return bookmark(this);"><i class="far fa-bookmark"></i></a>
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
                                <h3>Share</h3>
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
                                    <span class="reaction-result" style="height:21%;"></span>
                                    <span class="reaction-percent">21%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="1" data-voted="3" data-uvoted="0"
                                    onclick="return reacclick(this);">Haha</div>
                            </li>
                            <li class="reaction-item " id="reac2">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:29%;"></span>
                                    <span class="reaction-percent">29%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="2" data-voted="4" data-uvoted="0"
                                    onclick="return reacclick(this);">Love</div>
                            </li>
                            <li class="reaction-item " id="reac3">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:21%;"></span>
                                    <span class="reaction-percent">21%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="3" data-voted="3" data-uvoted="0"
                                    onclick="return reacclick(this);">Lol</div>
                            </li>
                            <li class="reaction-item " id="reac4">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:7%;"></span>
                                    <span class="reaction-percent">7%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="4" data-voted="1" data-uvoted="0"
                                    onclick="return reacclick(this);">Cute</div>
                            </li>
                            <li class="reaction-item " id="reac5">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:7%;"></span>
                                    <span class="reaction-percent">7%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="5" data-voted="1" data-uvoted="0"
                                    onclick="return reacclick(this);">Omg</div>
                            </li>
                            <li class="reaction-item " id="reac6">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:7%;"></span>
                                    <span class="reaction-percent">7%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="6" data-voted="1" data-uvoted="0"
                                    onclick="return reacclick(this);">WTF</div>
                            </li>
                            <li class="reaction-item " id="reac7">
                                <div class="reaction-in">
                                    <span class="reaction-result" style="height:7%;"></span>
                                    <span class="reaction-percent">7%</span>
                                    <span class="reaction-voted"></span>
                                </div>
                                <div class="reaction" data-id="7" data-voted="1" data-uvoted="0"
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
                    </div>
                    <div class="maincom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#comments" data-toggle="tab"><i
                                        class="fa-solid fa-comment-dots"></i> Comments</a></li>
                            <li><a href="#fbcomments" data-toggle="tab"><i class="fab fa-facebook"></i> Comments</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="comments">
                                <div class="king-part-a-form">
                                    <div class="king-a-form" id="anew">
                                        <h2>Your Comment</h2>
                                        @if (Auth::check())
                                            <form method="post"
                                                action="https://demos.kingthemes.net/3/single-image-iphone-wallpaper"
                                                name="a_form">
                                                <table class="king-form-tall-table">
                                                    <tr>
                                                        <td class="king-form-tall-data">
                                                            <TEXTAREA name="a_content" id="a_content" ROWS="5" COLS="40" class="king-form-tall-text"></TEXTAREA>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-label">
                                                            <label>
                                                                <input name="a_notify" type="checkbox" value="1"
                                                                    class="king-form-tall-checkbox">
                                                                Email me (nguyenhuuminhkhai@gmail.com) if my Comment is
                                                                voted or replied on
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" class="king-form-tall-buttons">
                                                            <input onclick=" return qa_submit_answer(3, this);"
                                                                value="Add Comment" title="" type="submit"
                                                                class="king-form-tall-button king-form-tall-button-answer">
                                                        </td>
                                                    </tr>
                                                </table>
                                                <input type="hidden" name="a_editor" value="">
                                                <input type="hidden" name="a_doadd" value="1">
                                                <input type="hidden" name="code"
                                                    value="1-1669304788-228e82fb16acd66b699050fe5cf5a7624bf2cff1">
                                            </form>
                                        @else
                                            <form method="post" action="../30/wild-flower-illustration" name="a_form">
                                                <table class="king-form-tall-table">
                                                    <tbody><tr>
                                                        <td class="king-form-tall-data">
                                                            <textarea name="a_content" id="a_content" rows="5" cols="40" class="king-form-tall-text"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-label">
                                                            Your name to display (optional)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-data">
                                                            <input name="a_name" type="text" value="" class="king-form-tall-text">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-label">
                                                            <label>
                                                                <input name="a_notify" id="a_notify" onclick="if (document.getElementById('a_notify').checked) document.getElementById('a_email').focus();" type="checkbox" value="1" class="king-form-tall-checkbox">
                                                                <span id="a_email_shown" style="display: none;">Email me at this address if my Comment is voted or replied on:</span><span id="a_email_hidden" style="">Email me if my Comment is replied on</span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    </tbody><tbody id="a_email_display" style="display: none;">
                                                        <tr>
                                                            <td class="king-form-tall-data">
                                                                <input name="a_email" id="a_email" type="text" value="" class="king-form-tall-text">
                                                                <div class="king-form-tall-note">Privacy: Your email address will only be used for sending these notifications.</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody><tr>
                                                        <td class="king-form-tall-label">
                                                            Anti-spam verification:
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="king-form-tall-data">
                                                            <div id="qa_captcha_div_1"><center><div class="g-recaptcha" data-sitekey="6Ldd6DcfAAAAAGPRXpyzLSOWRQd8gLVaGDNTCAR9" data-theme="light" data-type="image"><div style="width: 304px; height: 78px;"><div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ldd6DcfAAAAAGPRXpyzLSOWRQd8gLVaGDNTCAR9&amp;co=aHR0cHM6Ly9kZW1vcy5raW5ndGhlbWVzLm5ldDo0NDM.&amp;hl=en&amp;type=image&amp;v=pn3ro1xnhf4yB8qmnrhh9iD2&amp;theme=light&amp;size=normal&amp;cb=gfb4a1hbl1de" width="304" height="78" role="presentation" name="a-bj5tjjccix5h" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div></center></div>
                                                            <div class="king-form-tall-note">To avoid this verification in future, please <a href="../login">log in</a> or <a href="../register">register</a>.</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="1" class="king-form-tall-buttons">
                                                            <input onclick=" return qa_submit_answer(30, this);" value="Add Comment" title="" type="submit" class="king-form-tall-button king-form-tall-button-answer">
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                                <input type="hidden" name="a_editor" value="">
                                                <input type="hidden" name="a_doadd" value="1">
                                                <input type="hidden" name="code" value="0-1670920436-04bca61bcea6a91cc8fc53b456dd581e1c680ba5">
                                            </form>
                                        @endif
                                    </div> <!-- END king-a-form -->
                                </div>
                                <div class="king-part-a-list">
                                    <div class="king-a-list" id="a_list">

                                    </div> <!-- END king-a-list -->
                                </div>
                            </div>
                            <div class="tab-pane " id="fbcomments">
                                <div class="fbcomments">
                                    <div class="fb-comments"
                                        data-href="https://demos.kingthemes.net/3/single-image-iphone-wallpaper"
                                        data-width="100%" data-numposts="10"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="king-widgets-main king-widgets-main-low">
                    <div class="king-widget-main king-widget-main-low">
                        <div class="ilgilit under-content">
                            <div class="widget-title">
                                Related Posts
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
                                        <span><i class="fa fa-eye" aria-hidden="true"></i> 447 </span>
                                        <span><i class="fa fa-comment" aria-hidden="true"></i> 0</span>
                                        <span><i class="fas fa-chevron-up"></i> 0</span>
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

@endsection
@push('scripts')

@endpush