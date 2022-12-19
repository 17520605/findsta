<ul class="socialicons">
    <li class="facebook"><a href="#" target="_blank" data-toggle="tooltip" data-placement="top"
            title="Join our Facebook page !"><i class="fab fa-facebook-f"></i></a></li>
    <li class="twitter"><a href="#" target="_blank" data-toggle="tooltip" data-placement="top"
            title="Follow us on Twitter !"><i class="fab fa-twitter"></i></a></li>
    <li class="instagram"><a href="#" target="_blank" data-toggle="tooltip" data-placement="top"
            title="Follow us on Instagram !"><i class="fab fa-instagram"></i></a></li>
    <li class="youtube"><a href="#" target="_blank" data-toggle="tooltip" data-placement="top"
            title="Follow us on Youtube !"><i class="fab fa-youtube"></i></a></li>
    <li class="pinterest"><a href="#" target="_blank" data-toggle="tooltip" data-placement="top"
            title="Follow us on Pinterest !"><i class="fab fa-pinterest-p"></i></a></li>
    <li class="pinterest"><a href="./feed" data-toggle="tooltip" data-placement="top" title="RSS"><i
                class="fa-solid fa-rss"></i></a></li>
    <li>
        <div class="btn-change-lang" data-toggle="modal" data-target="#langsmodal" role="button"
            style="border: 1px solid #f2f5f8;text-align: center;border-radius: 14px;margin: 0 6px;font-size: 13px;height: 40px;padding:0 10px;line-height: 40px;cursor:pointer;">
            <i class="fa-solid fa-language"></i> {{ __('language') }}
        </div>
    </li>
    <div id="langsmodal" class="king-modal-login">
        <div class="king-modal-content">
            <div name="langss">
                <table class="king-form-tall-table">
                    <tr>
                        <td class="king-form-tall-label">
                            {{ __('language') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="king-form-tall-data">
                            <label><input name="user_lang" type="radio" value="en" {{Session::get('language') === ('en') ? 'checked' : (Session::get('language') === null ? 'checked': null)}} class="king-form-tall-radio"> English - (US)</label><br>
                            <label><input name="user_lang" type="radio" value="kr" {{Session::get('language') === 'kr' ? 'checked' : null}} class="king-form-tall-radio"> Korea - 대한민국</label><br>
                            <label><input name="user_lang" type="radio" value="vi" {{Session::get('language') === 'vi' ? 'checked' : null}} class="king-form-tall-radio"> Việt Nam - Vietnamese</label><br>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="1" class="king-form-tall-buttons">
                            <button class="king-change-language" onclick="changeLanguage()">{{ __('lang_switch') }}</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</ul>
<ul class="king-nav-footer-list">
    <li class="king-nav-footer-item king-nav-footer-feedback">
        <a href="{{route('get.feedback')}}" class="king-nav-footer-link">{{ __('send_feedback') }}</a>
    </li>
    <li class="king-nav-footer-item king-nav-footer-custom-5">
        <a href="#" class="king-nav-footer-link"><i class="fas fa-address-card"></i>{{ __('about_us') }}</a>
    </li>
    <li class="king-nav-footer-item king-nav-footer-privacy-policy">
        <a href="./privacy-policy" class="king-nav-footer-link"><i
                class="fas fa-user-secret"></i>{{ __('privacy_policy') }}</a>
    </li>
    <li class="king-nav-footer-item king-nav-footer-custom-3">
        <a href="#" class="king-nav-footer-link"><i class="far fa-life-ring"></i>{{ __('support') }}</a>
    </li>
    <li class="king-nav-footer-item king-nav-footer-custom-2">
        <a href="#" class="king-nav-footer-link"><i class="fas fa-user-md"></i>{{ __('careers') }}</a>
    </li>
    <li class="king-nav-footer-item king-nav-footer-custom-1">
        <a href="#" class="king-nav-footer-link"><i class="far fa-address-card"></i>{{ __('testimonials') }}</a>
    </li>
</ul>
<div class="king-nav-footer-clear">
</div>
<div class="king-attribution" id="insertfooter">
    {{ date('Y') }} © <A href="#">Findsta</A> | {{ __('all_rights_reserved') }}
</div>
<div class="king-footer-clear">
</div>