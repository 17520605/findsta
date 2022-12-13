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
                    <form method="post" action="https://demos.kingthemes.net/register">
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    Username:
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="handle" id="handle" dir="auto" type="text" value=""
                                        class="king-form-tall-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    Password:
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="password" id="password" dir="auto" type="password" value=""
                                        class="king-form-tall-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    Email:
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="email" id="email" dir="auto" type="text" value=""
                                        class="king-form-tall-text">
                                    <div class="king-form-tall-note">Privacy: Your email address will not be shared or
                                        sold to third parties.</div>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    Anti-spam verification:
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <div id="qa_captcha_div_1">
                                        <center>
                                            <div class="g-recaptcha" data-sitekey="6Ldd6DcfAAAAAGPRXpyzLSOWRQd8gLVaGDNTCAR9"
                                                data-theme="light" data-type="image"></div>
                                        </center>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    <label>
                                        <input name="terms" id="terms" type="checkbox" value="1"
                                            class="king-form-tall-checkbox">
                                        Check if you accept Terms & Conditions
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="king-form-tall-buttons">
                                    <input onclick="qa_show_waiting_after(this, false);" value="Register" title=""
                                        type="submit" class="king-form-tall-button king-form-tall-button-register">
                                    <span class="king-form-tall-note">
                                        <a href="{{env('APP_URL')}}/login" class="hllink">Login</a>
                                    </span>
                                    <br>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="doregister" value="1">
                        <input type="hidden" name="code" value="0-1669303577-2ce5374822928ca8dd0c83ea3de58f2505c45461">
                    </form>
                </div>
                <div class="king-part-custom king-inner">
                    <div> <a class="google-signin open-login-button"
                            href="https://demos.kingthemes.net/login?login=google&amp;to=register">

                            <span class="google-signin-text">Login using Google</span>
                        </a></div>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>


@endsection
@push('scripts')

@endpush