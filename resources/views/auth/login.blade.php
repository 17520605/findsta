@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <div id="king-body-wrapper" class="king-body-in">
        <div class="king-main one-page">
            <div class="king-main-in">
                <div class="king-part-form king-inner">
                    <form method="post" action="https://demos.kingthemes.net/login">
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    {{ __('email') }}
                                </td>
                            </tr>
                           
                            
                            
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="emailhandle" id="emailhandle" dir="auto" type="text" value=""
                                        class="king-form-tall-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    {{ __('password') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="password" id="password" dir="auto" type="password" value=""
                                        class="king-form-tall-text">
                                    <div class="king-form-tall-note"><a href="{{env('APP_URL')}}/forgot">{{ __('forgot_my_password') }}</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    <label>
                                        <input name="remember" type="checkbox" value="1"
                                            class="king-form-tall-checkbox">
                                            {{ __('remember') }}
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="king-form-tall-buttons">
                                    <input value="{{ __('log_in') }}" title="" type="submit"
                                        class="king-form-tall-button king-form-tall-button-login">
                                    <span class="king-form-tall-note">
                                        <a href="{{env('APP_URL')}}/register" class="hllink">{{ __('register') }}</a>
                                    </span>
                                    <br>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="dologin" value="1">
                        <input type="hidden" name="code" value="0-1669303630-cce0b91303372f396b69ce6135188c6cb5eb1b18">
                    </form>
                </div>
                <div class="king-part-custom king-inner">
                    <div> <a class="google-signin open-login-button"
                            href="https://demos.kingthemes.net/login?login=google&amp;to=login">
                            <span class="google-signin-text">Login using Google</span>
                        </a></div>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>


@endsection
@push('scripts')

@endpush