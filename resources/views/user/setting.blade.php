@section('title', 'CryptoNews Custom Profile')
@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <div class="user-boxx king-profile">
        <div class="user-box">
            <div class="user-box-pt">
                <div class="user-box-cover">
                    <div data-king-img-src="https://res.cloudinary.com/dsldtailo/image/upload/v1670949819/cryptonexnews/default/happy-new-year-2023-background-with-minimal-red-line_1361-4043.webp_qmvgim.png"
                        class="king-box-bg"></div>
                    <div class="user-box-up">
                        <div class="user-box-links"></div>
                        <a href="#" class="user-box-alink"><img data-king-img-src="{{ $profile->avatar }}"
                                class="king-avatar king-lazy" width="140" height="140">
                        </a>
                    </div>
                </div>
                <div class="user-box-in">
                    <div class="user-box-name">
                        <a href="{{ route('user.get.myseting') }}">
                            <h3>{{ $profile->fname }} {{ $profile->lname }}</h3>
                        </a>
                    </div>
                    <div class="king-stats">
                        <span><strong>0</strong>{{ __('count_posts') }}</span><span><strong>0</strong>{{ __('count_following') }}</span><span><strong>0</strong>{{ __('count_followers') }}</span>
                    </div>
                    <div class="user-box-buttons">
                        <div id="follow_73"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="king-body-wrapper" class="king-body-in">
        <ul class="king-nav-sub-list">
            <li class="king-nav-sub-item king-nav-sub-profile">
                <a href="{{ route('user.get.myprofile') }}" class="king-nav-sub-link">{{ __('info_my_profile') }}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-account">
                <a href="{{ route('user.get.myseting') }}"
                    class="king-nav-sub-link king-nav-sub-selected">{{ __('info_my_details') }}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-favorites">
                <a href="{{ route('user.get.myfavorite') }}" class="king-nav-sub-link">{{ __('info_my_favorites') }}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-messages">
                <a href="{{ route('user.get.message') }}" class="king-nav-sub-link">{{ __('info_messages') }}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-follower">
                <a href="{{ route('user.get.follower') }}" class="king-nav-sub-link">{{ __('info_followers') }}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-following">
                <a href="{{ route('user.get.following') }}" class="king-nav-sub-link">{{ __('info_following') }}</a>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <div class="king-main one-page">
            <div class="king-main-in">
                <div class="king-part-form-profile king-inner">
                    <form enctype="multipart/form-data" class="updateInfoForm"
                        action="{{ route('users.save-edit', $user->id) }}" method="POST">
                        @csrf
                        <table class="king-form-wide-table">
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_type') }}
                                </td>
                                <td class="king-form-wide-data">
                                    @if ($user->type === 'system')
                                        <span class="king-form-wide-static">{{ __('input_type_system') }}</span>
                                    @else
                                        <span class="king-form-wide-static">{{ __('input_type_website') }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_email') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="email" type="text" value="{{ $profile->email }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_private_messages') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="messages" type="checkbox" value="1" checked
                                        class="king-form-wide-checkbox">
                                    <span class="king-form-wide-note">{{ __('input_private_messages') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label" style="vertical-align:top;">
                                    {{ __('label_avatar') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <label>
                                        <span style="margin:2px 0; display:inline-block;position: relative;;">
                                            <img id="avatar-img" src="{{ $profile->avatar }}" class="king-avatar-image"
                                                alt="">
                                            <i class="fa-sharp fa-solid fa-circle-plus change-avatar"></i>
                                        </span>
                                        <input id="avatar-file" name="avatar" type="file" style="display: none"
                                            accept="image/*">
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_fname') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="fname" type="text" value="{{ $profile->fname }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_lname') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="lname" type="text" value="{{ $profile->lname }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_contact') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="contact" type="text" value="{{ $profile->contact }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_location') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="address" type="text" value="{{ $profile->address }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_career') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="career" type="text" value="{{ $profile->career }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_resume') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="resume" type="text" value="{{ $profile->resume }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_website') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="website" type="text" value="{{ $profile->website }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_facebook') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="facebook" type="text" value="{{ $profile->social->facebook }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_skype') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="skype" type="text" value="{{ $profile->social->skype }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_google') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="google" type="text" value="{{ $profile->social->google }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_youtube') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="youtube" type="text" value="{{ $profile->social->youtube }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_twitter') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="twitter" type="text" value="{{ $profile->social->twitter }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_pinterest') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="pinterest" type="text" value="{{ $profile->social->pinterest }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_linkedIn') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="linkedIn" type="text" value="{{ $profile->social->linkedIn }}"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label" style="vertical-align:top;">
                                    {{ __('label_about') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <textarea name="bio" rows="5" cols="40" class="king-form-wide-text">{{ $profile->bio }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <input type="hidden" name="fileChange" value="0">
                                <td colspan="3" class="king-form-wide-buttons">
                                    <button id="submit-edit-profile" type="submit"
                                        class="king-form-wide-button king-form-wide-button-save"><span
                                            class="icon-loader-edit-profile"></span> {{ __('save_profile') }}</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="king-part-form-password king-inner">
                    <h2>{{ __('change_password') }}</h2>
                    <form action="{{ route('users.change-password', $user->id) }}" method="POST">
                        @csrf
                        <table class="king-form-wide-table">
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_old_password') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{ __('input_old_password') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_new_password') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="newpassword1" type="password" value=""
                                        class="king-form-wide-text" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{ __('label_retype_new_password') }}
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="newpassword2" type="password" value="" disabled
                                        class="king-form-wide-text" required>
                                    <span class="notify-password"></span>
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="3" class="king-form-wide-buttons">
                                    <button id="submit-change-password" disabled type="submit"
                                        class="king-form-wide-button king-form-wide-button-change"><span
                                            class="icon-loader-edit-profile"></span> {{ __('change_password') }}</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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
                $('#submit-change-password').prop('disabled', true);
            } else if (password === repasword) {
                $('.notify-password').html('');
                $('#submit-change-password').prop('disabled', false);
            }else if(repasword === '')
            {
                $('.notify-password').html('');
                $('#submit-change-password').prop('disabled', false);
            }
        });
        $('#submit-edit-profile').click(function() {
            $('.icon-loader-edit-profile').html(`<i class="fas fa-spinner fa-spin"></i>`);
        });
        $('#avatar-file').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#avatar-img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                var last_name = $("input[name=lname]").val();
                var first_name = $("input[name=fname]").val();
                var avatar = 'https://ui-avatars.com/api/?name=' + last_name + ' ' + first_name +
                    '&background=random&rounded=true';
                $('#avatar-img').attr('src', avatar);
            }
            $("input[name=fileChange]").val('1');
        });
    </script>
@endsection
