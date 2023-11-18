@section('title', 'CryptoNews Forgot')
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
                    <form class="fogotForm">
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    {{ __('email') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <input name="email" type="email" value="" class="king-form-tall-text" required>
                                    <div class="king-form-tall-note">A message will be sent to your email address with  instructions.</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="notify-fogot"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="king-form-tall-buttons">
                                    <button type="submit" class="king-form-tall-button king-form-tall-button-send"><span class="icon-loader"></span> Send Reset Password Email</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    @endsection
    @section('scripts')
        <script>
            $('.fogotForm').submit(function (e) { 
                e.preventDefault();
                const data = $(this).serializeArray();
                $('.icon-loader').html(`<i class="fas fa-spinner fa-spin"></i>`);
                $('.notify-fogot').html(``);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "{{ route('post.forgot')}}",
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if (response && response.result === 'ok') {
                            $('.notify-fogot').html(` <div class="king-suggest-next" style="border-radius:10px;margin-top: 10px;margin-bottom: 20px">${response.message} <strong style="color: #e60023"> Automatically redirect later <span id="countdowntimer"></span></strong></div>`);
                            var timeleft = 10;
                            var downloadTimer = setInterval(function(){
                            timeleft--;
                            document.getElementById("countdowntimer").textContent = timeleft;
                            if(timeleft <= 0)
                                location.href = "{{ route('get.login')}}";
                            },1000);
                        } else
                        if (response.result === 'fail') {
                            $('.icon-loader').html(``);
                            $('.notify-fogot').html(`<div class="king-form-tall-error">${response.message}</div>`)
                        }
                    }
                });
                return false;
            });
        </script>
    @endsection
