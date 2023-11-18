@section('title', 'CryptoNews Register')
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
                    <form class="registerForm">
                        @csrf
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    {{__('first_name')}}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="fname" id="fname" dir="auto" type="text" value=""
                                        class="king-form-tall-text" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    {{__('last_name')}}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="lname" id="lname" dir="auto" type="text" value=""
                                        class="king-form-tall-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    {{__('email')}}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="email" id="email" dir="auto" type="email" value="" class="king-form-tall-text" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    {{__('password')}}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="password" id="password" dir="auto" type="password" value="" class="king-form-tall-text" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="notify-register"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <div class="king-form-tall-note" style="margin-top: 20px;margin-bottom: 20px">{{__('privacy_your_email')}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="king-form-tall-buttons">
                                    <button type="submit" class="king-form-tall-button king-form-tall-button-register"><span class="icon-loader-register"></span> {{ __('register') }}</button>
                                    <span class="king-form-tall-note">
                                        <a href="{{env('APP_URL')}}/login" class="hllink">{{__('log_in')}}</a>
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
                            href="#"><span class="google-signin-text">{{__('login_with_google')}}</span>
                        </a>
                    </div>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>
@endsection
@section('scripts')
    <script>
        $('.registerForm').submit(function (e) { 
            e.preventDefault();
            const data = $(this).serializeArray();
            $('.icon-loader-register').html(`<i class="fas fa-spinner fa-spin"></i>`);
            $('.notify-register').html(``);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('post.register')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response && response.result === 'ok') {
                        location.href = "{{ route('get.login')}}";
                    } else if (response.result === 'fail') 
                    {
                        $('.icon-loader-register').html(``);
                        $('.notify-register').html(`<div class="king-form-tall-error">${response.message}</div>`)
                    }
                }
            });
            return false;
        });
    </script>
@endsection