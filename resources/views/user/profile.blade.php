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
                    <div data-king-img-src="https://res.cloudinary.com/dsldtailo/image/upload/v1670949819/findsta/default/happy-new-year-2023-background-with-minimal-red-line_1361-4043.webp_qmvgim.png" class="king-box-bg"></div>
                    <div class="user-box-up">
                        <div class="user-box-links"></div>
                        <a href="#" class="user-box-alink"><img data-king-img-src="{{$profile->avatar}}" class="king-avatar king-lazy" width="140" height="140">
                        </a>
                    </div>
                </div>
                <div class="user-box-in">
                    <div class="user-box-name">
                        <a href="{{ route('user.get.myseting')}}">
                            <h3>{{$profile->fname}} {{$profile->lname}}</h3>
                        </a>
                    </div>
                    <div class="king-stats">
                        <span><strong>0</strong>{{__('count_posts')}}</span><span><strong>0</strong>{{__('count_following')}}</span><span><strong>0</strong>{{__('count_followers')}}</span>
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
                <a href="{{ route('user.get.myprofile')}}" class="king-nav-sub-link king-nav-sub-selected">{{__('info_my_profile')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-account">
                <a href="{{ route('user.get.myseting')}}" class="king-nav-sub-link">{{__('info_my_details')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-favorites">
                <a href="{{ route('user.get.myfavorite')}}" class="king-nav-sub-link">{{__('info_my_favorites')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-messages">
                <a href="{{ route('user.get.message')}}" class="king-nav-sub-link">{{__('info_messages')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-follower">
                <a href="{{ route('user.get.follower')}}" class="king-nav-sub-link">{{__('info_followers')}}</a>
            </li>
            <li class="king-nav-sub-item king-nav-sub-following">
                <a href="{{ route('user.get.following')}}" class="king-nav-sub-link">{{__('info_following')}}</a>
            </li>
        </ul>
        <div class="king-nav-sub-clear">
        </div>
        <div class="king-main one-page">
            <div class="king-main-in">
                <div class="king-part-form-profile king-inner">
                    <form class="king-template-user">
                        <table class="king-form-wide-table">
                            <tr id="level">
                                <td class="king-form-wide-label">
                                    {{__('input_type_system')}}
                                </td>
                                <td class="king-form-wide-data">
                                    @if ($user->type === 'system')
                                        <span class="king-form-wide-static">{{__('input_type_system')}}</span>
                                    @else
                                        <span class="king-form-wide-static">{{__('input_type_website')}}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_fname')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->fname}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_lname')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->lname}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_contact')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->contact}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_location')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->address}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_career')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->career}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_resume')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->resume}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_website')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->website}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_facebook')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->social->facebook}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_skype')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->social->skype}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_google')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->social->google}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_youtube')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->social->youtube}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_twitter')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->social->twitter}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_pinterest')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->social->pinterest}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label">
                                    {{__('label_linkedIn')}}
                                </td>
                                <td class="king-form-wide-data">
                                    <span class="king-form-wide-static">{{$profile->social->linkedIn}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="king-form-wide-label" style="vertical-align:top; border-bottom: none">
                                    {{__('label_about')}}
                                </td>
                                <td class="king-form-wide-data"  style="vertical-align:top; border-bottom: none">
                                    <span class="king-form-wide-static">{{$profile->bio}}</span>
                                </td>
                            </tr>
                        </table>
                        <a href="{{ route('user.get.myseting')}}" class="king-form-wide-button king-form-wide-button-account">{{__('edit_profile')}}</a>
                    </form>
                </div>
            </div> <!-- king-main-in -->
        </div> <!-- king-main -->
    </div>
@endsection
@push('scripts')
@endpush
