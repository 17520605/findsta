<div id="loginmodal" class="king-modal-login">
    {{-- Login --}}
    <div class="king-modal-content">
        <button type="button" class="king-modal-close" data-dismiss="modal" aria-label="Close"><i
                class="icon fa fa-fw fa-times"></i></button>
        <div class="king-modal-header">
            <h4 class="modal-title">{{ __('login') }}</h4>
        </div>
        <div class="king-modal-form">
            <form id="loginFormModal">
                @csrf
                <input type="email" class="modal-input" name="email" placeholder="{{ __('email') }}" required>
                <input type="password" class="modal-input" name="password" placeholder="{{ __('password') }}" required>
                <span class="notify-login"></span>
                <div><input type="checkbox" name="remember" value="1" >
                    <label for="king-rememberme">{{ __('remember') }}</label>
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
        <span class="modal-reglink"><a href="{{env('APP_URL')}}/register">{{ __('register') }}</a></span>
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