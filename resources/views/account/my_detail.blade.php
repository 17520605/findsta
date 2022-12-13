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
                    <div data-king-img-src="https://demos.kingthemes.net/?qa=image&amp;qa_blobid=3562180120032919605&amp;qa_size=1280"
                        class="king-box-bg"></div>
                    <div class="user-box-up">
                        <div class="user-box-links"></div><a href="./user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh"
                            class="user-box-alink"><img
                                data-king-img-src="https://demos.kingthemes.net/?qa=image&amp;qa_blobid=16288416615195025482&amp;qa_size=220"
                                class="king-avatar king-lazy" width="140" height="140"></a>
                    </div>
                </div>
                <div class="user-box-in">
                    <div class="user-box-name"><a href="./user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh">
                            <h3>Khai Nguyễn Hữu Minh</h3>
                        </a></div>
                    <div class="user-box-tp"><span class="user-box-point"><strong>100</strong> Points</span></div>
                    <div class="king-stats">
                        <span><strong>0</strong>Posts</span><span><strong>0</strong>Following</span><span><strong>0</strong>Followers</span>
                    </div>
                    <div class="user-box-buttons">
                        <div id="follow_73"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <DIV id="king-body-wrapper" class="king-body-in">
        <ul class="king-nav-sub-list">
            <li class="king-nav-sub-item king-nav-sub-questions">
                <a href="./user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh" class="king-nav-sub-link">All Post</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-profile">
                <a href="./user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh/profile" class="king-nav-sub-link">User Khai Nguyễn Hữu
                    Minh</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-account">
                <a href="./account" class="king-nav-sub-link king-nav-sub-selected">My details</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-favorites">
                <a href="./favorites" class="king-nav-sub-link">My favorites</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-messages">
                <a href="./messages" class="king-nav-sub-link">Private Messages</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-wall">
                <a href="./user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh/wall" class="king-nav-sub-link">Wall</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-follower">
                <a href="./user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh/follower" class="king-nav-sub-link">Followers</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-following">
                <a href="./user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh/following" class="king-nav-sub-link">Following</a>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <DIV class="king-main one-page">
            <DIV class="king-main-in">
                <div class="king-part-form-profile king-inner">
                    <form enctype="multipart/form-data" method="post" action="./account">
                        <table class="king-form-wide-table">
                            <tr>
                                <td class="king-form-wide-label">
                                    Member for:
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">1 hour</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Type:
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">Registered user</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Username:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="handle" type="text" value="Khai Nguyễn Hữu Minh"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Email:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="email" type="text" value="nguyenhuuminhkhai@gmail.com"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Private messages:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="messages" type="checkbox" value="1" checked
                                        class="king-form-wide-checkbox">
                                    <span class="king-form-wide-note">Allow users to email you (without seeing your
                                        address)</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Wall posts:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="wall" type="checkbox" value="1" checked
                                        class="king-form-wide-checkbox">
                                    <span class="king-form-wide-note">Allow users to post on your wall (you will also be
                                        emailed)</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Cover:
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-cover-ac"><img src="./?qa=image&amp;qa_blobid=&amp;qa_size=100"
                                            width="96" height="96" class="king-avatar-image"
                                            alt="" /></span><input name="cover" type="file">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label" style="vertical-align:top;">
                                    Avatar:
                                </td>
                                <td class="king-form-wide-data">
                                    <label><input name="avatar" type="radio" value=""
                                            class="king-form-wide-radio"> <span
                                            style="margin:2px 0; display:inline-block;"><img
                                                src="./?qa=image&amp;qa_blobid=3562180120032919605&amp;qa_size=52"
                                                width="28" height="52" class="king-avatar-image"
                                                alt=""></span> Default</label>
                                    <br>
                                    <label><input name="avatar" type="radio" value="uploaded" checked
                                            class="king-form-wide-radio"> <span
                                            style="margin:2px 0; display:inline-block;"><img
                                                src="./?qa=image&amp;qa_blobid=16288416615195025482&amp;qa_size=52"
                                                width="52" height="52" class="king-avatar-image"
                                                alt=""></span><input name="file" type="file"></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Full name:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_5" type="text" value="Khai Nguyễn Hữu Minh"
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Location:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_6" type="text" value="" class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Website:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_7" type="text" value="" class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Facebook:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_8" type="text" value="" class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Twitter:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_9" type="text" value="" class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Instagram:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_10" type="text" value="" class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Reddit:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_11" type="text" value="" class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Pinterest:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_12" type="text" value="" class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    LinkedIn:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="field_13" type="text" value="" class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label" style="vertical-align:top;">
                                    About:
                                </td>
                                <td class="king-form-wide-data">
                                    <TEXTAREA name="field_14" ROWS="5" COLS="40" class="king-form-wide-text"></TEXTAREA>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="king-form-wide-buttons">
                                    <input onclick="qa_show_waiting_after(this, false);" value="Save Profile"
                                        title="" type="submit"
                                        class="king-form-wide-button king-form-wide-button-save">
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="dosaveprofile" value="1">
                        <input type="hidden" name="code"
                            value="1-1670926141-73dad9d8244d8b74d330553a98aa97f6ab9afcaf">
                    </form>
                </div>
                <div class="king-part-form-password king-inner">
                    <h2>Change Password</h2>
                    <form method="post" action="./account">
                        <table class="king-form-wide-table">
                            <tr>
                                <td class="king-form-wide-label">
                                    Old password:
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">None. To log in directly, set a password
                                        below.</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    New password:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="newpassword1" type="password" value=""
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    Retype new password:
                                </td>
                                <td class="king-form-wide-data">
                                    <input name="newpassword2" type="password" value=""
                                        class="king-form-wide-text">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="king-form-wide-buttons">
                                    <input value="Change Password" title="" type="submit"
                                        class="king-form-wide-button king-form-wide-button-change">
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="dochangepassword" value="1">
                        <input type="hidden" name="code"
                            value="1-1670926141-ed9c3fd918b9849519f999233a20931773e9df9f">
                    </form>
                </div>
                <div class="king-part-form-delaccount king-inner">
                    <h2>Delete my account</h2>
                    <form method="post" action="./account">
                        <input value="Delete" title="" type="submit"
                            class="king-form-wide-button king-form-wide-button-change">
                        <input type="hidden" name="delmyaccount" value="1">
                        <input type="hidden" name="code"
                            value="1-1670926141-19797b7532f00256a091372be05ba63c0ac2c380">
                    </form>
                </div>
            </div> <!-- king-main-in -->
        </DIV> <!-- king-main -->
    </DIV>
@endsection
@push('scripts')
@endpush
