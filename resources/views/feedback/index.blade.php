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
                    <form class="feedbackForm">
                        @csrf
                        <table class="king-form-tall-table">
                            <tr>
                                <td class="king-form-tall-label">
                                    {{__('feedback_content')}}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    <textarea name="content" id="message" rows="5" cols="40" class="king-form-tall-text"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    {{__('feedback_name')}}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    @if (Auth::check())
                                        <input name="name" type="text" value="{{$profile->lname}} {{$profile->fname}}" class="king-form-tall-text">
                                    @else
                                        <input name="name" type="text" value="" class="king-form-tall-text">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-label">
                                    {{__('feedback_email')}}
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-tall-data">
                                    
                                    @if (Auth::check())
                                        <input name="email" type="text" value="{{$profile->email}}" class="king-form-tall-text">
                                    @else
                                        <input name="email" type="text" value="" class="king-form-tall-text">
                                    @endif
                                    <div class="king-form-tall-note" style="margin-top: 10px;margin-bottom: 10px"> {{__('feedback_privacy')}}</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1" class="king-form-tall-buttons">
                                    <button type="submit" class="king-form-tall-button king-form-tall-button-send"><span class="icon-loader-feedback"></span> {{__('send_feedback')}}</button>
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
        const url = new URL(location.href);
        $('.feedbackForm').submit(function (e) { 
            e.preventDefault();
            const data = $(this).serializeArray();
            $('.icon-loader-feedback').html(`<i class="fas fa-spinner fa-spin"></i>`);
            $.ajax({
                type: "post",
                url: "{{ route('post.feedback')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    $('.icon-loader-feedback').html(``);
                    if (response && response.result === 'ok') {
                        tata.text('Send successfully', response.message, {
                            animate: 'slide',
                            closeBtn: true,
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 800);
                    } else
                    if (response.result === 'fail') {
                        alert(response.message)
                        // $('.notify-login').html(`<div class="king-form-tall-error">${response.message}</div>`)
                    }
                }
            });
            return false;
        });
    </script>
@stop