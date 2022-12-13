@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <DIV id="king-body-wrapper" class="king-body-in">
        <ul class="king-nav-sub-list">
            <li class="king-nav-sub-item king-nav-sub-inbox">
                <a href="./messages" class="king-nav-sub-link king-nav-sub-selected">Inbox</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-outbox">
                <a href="./messages/sent" class="king-nav-sub-link">Outbox</a>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <DIV class="king-main one-page">
            <DIV class="king-main-in">
                <div class="king-part-custom king-inner">
                    <div class="nopost"><i class="far fa-frown-open fa-4x"></i> Nothing Found !</div>
                </div>
            </div> <!-- king-main-in -->
        </DIV> <!-- king-main -->
    </DIV>
@endsection
@push('scripts')
@endpush
