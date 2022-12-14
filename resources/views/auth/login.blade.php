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
                    <form class="loginForm">
                        @csrf
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    {{ __('email') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="email" dir="auto" type="text" value="" class="king-form-tall-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    {{ __('password') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data" style="margin-top: 10px">
                                    <input name="password" dir="auto" type="password" value="" class="king-form-tall-text">
                                    <div class="king-form-tall-note"><a href="{{env('APP_URL')}}/forgot">{{ __('forgot_my_password') }}</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="notify-login"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    <label>
                                        <input name="remember" type="checkbox" value="1" class="king-form-tall-checkbox">{{ __('remember') }}
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="king-form-tall-buttons">
                                    <button type="submit" class="king-form-tall-button king-form-tall-button-login"><span class="icon-loader"></span> {{ __('log_in') }}</button>
                                    <span class="king-form-tall-note">
                                        <a href="{{env('APP_URL')}}/register" class="hllink">{{ __('register') }}</a>
                                    </span>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="king-part-custom king-inner">
                    <div> 
                        <a class="google-signin open-login-button"
                            href="https://demos.kingthemes.net/login?login=google&amp;to=login"> <span class="google-signin-text">Login using Google</span>
                        </a>
                    </div>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>
@endsection
@section('scripts')
    <script>
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
                        location.href = "{{ route('home')}}";
                    } else
                    if (response.result === 'fail') {
                        $('.notify-login').html(`<div class="king-form-tall-error">${response.message}</div>`)
                    }
                }
            });
            return false;
        });
    </script>
@endsection