<div id="loginmodal" class="king-modal-login">
    {{-- Login --}}
    <div class="king-modal-content">
        <button type="button" class="king-modal-close" data-dismiss="modal" aria-label="Close"><i
                class="icon fa fa-fw fa-times"></i></button>
        <div class="king-modal-header">
            <h4 class="modal-title">{{ __('login') }}</h4>
        </div>
        <div class="king-modal-form">
            <form class="loginForm">
                @csrf
                <input type="text" class="modal-input" name="email" placeholder="{{ __('email') }}">
                <input type="password" class="modal-input" name="password" placeholder="{{ __('password') }}">
                <span class="notify-login"></span>
                <div id="king-rememberbox"><input type="checkbox" name="remember" id="king-rememberme" value="1">
                    <label for="king-rememberme" id="king-remember">{{ __('remember') }}</label>
                </div>
                <button type="submit" id="king-login"><span class="icon-loader"></span> {{ __('log_in') }}</button>
            </form>
        </div>
        <div class="king-modal-footer" style="padding: 10px">
            <ul class="king-nav-user-list">
            </ul>
            <div class="king-nav-user-clear">
            </div>
        </div>
        <span class="modal-reglink"><a href="https://demos.kingthemes.net/register">{{ __('register') }}</a></span>
    </div>
</div>
<div id="rlatermodal" class="king-modal-login">
    <div class="king-modal-content">
        <button type="button" class="king-modal-close" data-dismiss="modal" aria-label="Close"><i
                class="icon fa fa-fw fa-times"></i></button>
        <div class="king-modal-header">
            <h2 class="modal-title">{{ __('bookmarks') }}</h2>
        </div>
        <div id="king-rlater-inside">
            {{-- <div class="nopost"><i class="far fa-frown-open fa-4x"></i>{{ __('nothing_found') }} !</div> --}}
            <div class="bm-posts">
                <div class="bm-post">
                    <div class="bm-bg"
                        style="background-image:url(https://demos.kingthemes.net/king-include/uploads/2022/03/931366-elice-768x565.png);">
                        <a href="#" class="modalbook king-readlater selected" data-toggle="tooltip"
                            data-placement="right" title="Bookmark" data-bookmarkid="28"
                            onclick="return bookmark(this);">
                            <i class="far fa-bookmark"></i>
                        </a></div>
                    <div class="bm-content"><a
                            href="https://demos.kingthemes.net/28/only-a-music-expert-knows-these-lyrics-are-from-which-singer"
                            class="bm-title">Only a music expert knows these lyrics are from which singer ?</a></div>
                </div>
                <div class="bm-post">
                    <div class="bm-bg"
                        style="background-image:url(https://demos.kingthemes.net/king-include/uploads/2022/03/316676-macos-monterey-1920x1080-wwdc-2021-5k-23424.jpg);">
                        <a href="#" class="modalbook king-readlater selected" data-toggle="tooltip"
                            data-placement="right" title="Bookmark" data-bookmarkid="29"
                            onclick="return bookmark(this);">
                            <i class="far fa-bookmark"></i>
                        </a></div>
                    <div class="bm-content"><a href="https://demos.kingthemes.net/29/multiple-wallpaper-images-enjoy-it"
                            class="bm-title">Multiple wallpaper images , enjoy it</a></div>
                </div>
                <div class="bm-post">
                    <div class="bm-bg"
                        style="background-image:url(https://demos.kingthemes.net/king-include/uploads/2022/03/35171-fontcontrol_en.330c13d.jpg);">
                        <a href="#" class="modalbook king-readlater selected" data-toggle="tooltip"
                            data-placement="right" title="Bookmark" data-bookmarkid="30"
                            onclick="return bookmark(this);">
                            <i class="far fa-bookmark"></i>
                        </a></div>
                    <div class="bm-content"><a href="https://demos.kingthemes.net/30/wild-flower-illustration"
                            class="bm-title">Wild flower illustration</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        const url = new URL(location.href);
        $('.loginForm').submit(function (e) { 
            e.preventDefault();
            const data = $(this).serializeArray();
            $('.icon-loader').html(`<i class="fas fa-spinner fa-spin"></i>`);
            $('.notify-login').html(``);
            $.ajax({
                type: "post",
                url: "{{ route('post.login')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    $('.icon-loader').html(``);
                    if (response && response.result === 'ok') {
                        $('#loginmodal').modal('hide');
                        setTimeout(function() {
                            location.href = '/';
                        }, 500);
                    } else
                    if (response.result === 'fail') {
                        $('.notify-login').html(`<div class="king-form-tall-error">${response.message}</div>`)
                    }
                }
            });
            return false;
        });
    </script>
@stop