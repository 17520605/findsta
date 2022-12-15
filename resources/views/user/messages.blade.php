@section('title', 'Findsta Messages')
@extends('layouts.master-home')
@section('content')
    <script>
        var b = document.getElementsByTagName('body')[0];
        b.className = b.className.replace('king-body-js-off', 'king-body-js-on');
    </script>
    <div id="king-body-wrapper" class="king-body-in">
        <ul class="king-nav-sub-list">
            <li class="king-nav-sub-item king-nav-sub-inbox">
                <a href="#" class="king-nav-sub-link king-nav-sub-selected">{{__('message_inbox')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-outbox">
                <a href="#" class="king-nav-sub-link">{{__('message_outbox')}}</a>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <div class="king-main one-page">
            <div class="king-main-in">
                <div class="king-part-custom king-inner">
                    <div class="nopost"><i class="far fa-frown-open fa-4x"></i>{{__('nothing_found')}} !</div>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>
@endsection
@push('scripts')
@endpush
