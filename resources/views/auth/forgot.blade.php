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
                    <form method="post" action="./forgot">
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    Email or Username:
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="emailhandle" id="emailhandle" type="text" value=""
                                        class="king-form-tall-text">
                                    <div class="king-form-tall-note">A message will be sent to your email address with
                                        instructions.</div>
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
                                <td colspan="1" class="king-form-tall-buttons">
                                    <input value="Send Reset Password Email" title="" type="submit"
                                        class="king-form-tall-button king-form-tall-button-send">
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="doforgot" value="1">
                        <input type="hidden" name="code" value="0-1670861699-0837d116d15ba061a5ee3f6015766df2d44c823f">
                    </form>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->


    @endsection
    @section('script')

    @stop
