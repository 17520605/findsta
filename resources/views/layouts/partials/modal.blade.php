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
        <button type="button" class="king-modal-close" onclick="return closebookmodal()">
            <i class="icon fa fa-fw fa-times"></i>
        </button>
        <div class="king-modal-header">
            <h2 class="modal-title">{{ __('bookmarks') }}</h2>
        </div>
        <div id="king-rlater-inside">
            <div class="bm-posts">
                <div class="loading-bookmark">
                    <span class="loader"></span>
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