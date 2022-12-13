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
                        <div class="user-box-links"></div><a href="../../user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh"
                            class="user-box-alink"><img
                                data-king-img-src="https://demos.kingthemes.net/?qa=image&amp;qa_blobid=16288416615195025482&amp;qa_size=220"
                                class="king-avatar king-lazy" width="140" height="140"></a>
                    </div>
                </div>
                <div class="user-box-in">
                    <div class="user-box-name"><a href="../../user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh">
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
                <a href="../../user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh" class="king-nav-sub-link">All Post</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-profile">
                <a href="../../user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh/profile" class="king-nav-sub-link">User Khai Nguyễn
                    Hữu Minh</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-account">
                <a href="../../account" class="king-nav-sub-link">My details</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-favorites">
                <a href="../../favorites" class="king-nav-sub-link">My favorites</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-messages">
                <a href="../../messages" class="king-nav-sub-link">Private Messages</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-wall">
                <a href="../../user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh/wall" class="king-nav-sub-link">Wall</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-follower">
                <a href="../../user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh/follower" class="king-nav-sub-link">Followers</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-following">
                <a href="../../user/Khai+Nguy%E1%BB%85n+H%E1%BB%AFu+Minh/following"
                    class="king-nav-sub-link king-nav-sub-selected">Following</a>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <DIV CLASS="king-main full-page">
            <DIV CLASS="king-main-in">
                <div class="king-part-custom king-inner">
                    <div class="nopost"><i class="far fa-frown-open fa-4x"></i> Nothing Found !</div>
                </div>
            </div> <!-- king-main-in -->
        </DIV> <!-- king-main -->
    </DIV>
@endsection
@push('scripts')
@endpush
