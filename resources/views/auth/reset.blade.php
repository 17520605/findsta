@section('title', 'Findsta Login')
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
                    <form class="resetForm">
                        @csrf
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    {{ __('password') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data" style="margin-top: 10px">
                                    <input name="newpassword1" dir="auto" type="password" value="" class="king-form-tall-text" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    {{ __('password') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data" style="margin-top: 10px">
                                    <input name="newpassword2" disabled dir="auto" type="password" value="" class="king-form-tall-text" required>
                                    <span class="notify-password"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="notify-reset"></span>
                                </td>
                            </tr>
                            <input type="hidden" id="input-email" name="email">
                            <input type="hidden" id="input-code" name="code">
                            <input type="hidden" id="input-time" name="time-code">
                            <tr>
                                <td colspan="1" class="king-form-tall-buttons">
                                    <button id="submit-reset-password" disabled type="submit" class="king-form-tall-button king-form-tall-button-reset"><span class="icon-loader"></span> Reset Password</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>
@endsection
@section('scripts')
    <script>
        function getParameterByName(name, url = window.location.href) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    var email = getParameterByName('email');
    if(email)
    {
        $('#input-email').val(email);
    }
    var code = getParameterByName('code');
    if(code)
    {
        $('#input-code').val(code);
    }
    var time_code = getParameterByName('time_code');
    if(time_code)
    {
        $('#input-time').val(time_code);
    }
    </script>
    <script>
        const isValidPassword = (password) => {
            let hasError1 = false;
            let hasError2 = false;
            let hasError3 = false;
            if (
                /^(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])[0-9a-zA-Z!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{3,}$/
                .test(
                    password
                )
            ) {
                if (password.trim().length < 6 || password.trim().length > 64)
                    hasError1 = true; // 8~64자 이내로 입력하세요.
            } else {
                if (password.trim().length < 6 || password.trim().length > 64)
                    hasError2 = true; // 8~64자 이내, 영문·숫자·특수문자를 조합해 입력하세요.
                else hasError3 = true; // 영문, 숫자, 특수문자를 조합하여 입력하세요.
            }

            return {
                hasError1,
                hasError2,
                hasError3,
            };
        };

        $("input[name='newpassword1']").on('keyup', function() {
            let password = $("input[name='newpassword1']").val();
            let checkpassword = isValidPassword(password);
            if (isValidPassword(password).hasError1) {
                $('.notify-password').html('<div class="king-form-tall-error" style="width: 80%;margin-top: 10px;margin-bottom: 20px;">Please enter within 8 to 64 characters.</div>');
                $("input[name='newpassword2']").prop('disabled', true);
                return;
            }
            else if (isValidPassword(password).hasError2) {
                $('.notify-password').html('<div class="king-form-tall-error" style="width: 80%;margin-top: 10px;margin-bottom: 20px;">Please enter a combination of English, numbers, and special characters.</div>');
                $("input[name='newpassword2']").prop('disabled', true);
                return;
            }
            else if (isValidPassword(password).hasError3) {
                $('.notify-password').html('<div class="king-form-tall-error" style="width: 80%;margin-top: 10px;margin-bottom: 20px;">Enter a combination of English, numbers, and special characters.</div>');
                $("input[name='newpassword2']").prop('disabled', true);
                return;
            }
            else {
                $('.notify-password').html('');
                $("input[name='newpassword2']").prop('disabled', false);
            }
        });

        $("input[name='newpassword2']").on('keyup', function() {
            var password = $("input[name='newpassword1']").val();
            var repasword = $("input[name='newpassword2']").val();
            if (password != repasword) {
                $('.notify-password').html('<div class="king-form-tall-error" style="width: 80%;margin-top: 10px;margin-bottom: 20px;">Password does not match above.</div>');
                $('#submit-reset-password').prop('disabled', true);
            } else if (password === repasword) {
                $('.notify-password').html('');
                $('#submit-reset-password').prop('disabled', false);
            }else if(repasword === '')
            {
                $('.notify-password').html('');
                $('#submit-reset-password').prop('disabled', false);
            }
        });
        $('#submit-edit-profile').click(function() {
            $('.icon-loader-edit-profile').html(`<i class="fas fa-spinner fa-spin"></i>`);
        });
    </script>
    <script>
        $('.resetForm').submit(function (e) { 
            e.preventDefault();
            const data = $(this).serializeArray();
            $('.icon-loader').html(`<i class="fas fa-spinner fa-spin"></i>`);
            $('.notify-reset').html(``);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{ route('post.reset')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response && response.result === 'ok') {
                        location.href = "{{ route('get.login')}}";
                    } else
                    if (response.result === 'fail') {
                        $('.icon-loader').html(``);
                        $('.notify-reset').html(`<div class="king-form-tall-error">${response.message}</div>`)
                    }
                }
            });
            return false;
        });
    </script>
@endsection