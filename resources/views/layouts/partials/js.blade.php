<link href="{{ asset('king-content/js/videojs/video-js.css') }}" rel="stylesheet">
<script src="{{ asset('king-content/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('king-content/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('king-content/js/videojs/video.min.js') }}"></script>
<script src="{{ asset('king-content/js/videojs/videojs-playlist.min.js') }}"></script>
<script src="{{ asset('king-content/js/videojs/videojs-playlist-ui.min.js') }}"></script>
<script src="{{ asset('king-plugin/king-notifications/script.js') }}"></script>
<script src="{{ asset('king-theme/default/js/main.js') }}"></script>
<script src="{{ asset('king-theme/default/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('king-theme/default/js/jquery-ias.min.js') }}"></script>
<script src="{{ asset('king-theme/default/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('king-theme/default/js/moment.min.js') }}"></script>
<!-- Plugins JS start-->
@stack('scripts')
@yield('scripts')
<!-- Plugins JS Ends-->
<script>
    function changeLanguage() {
        let language = $("input[name='user_lang']:checked").val();
        window.location.href = `{{ env('APP_URL') }}/change-language/${language}`
    };
    function search(keyword) {
        window.location.href = "{{ env('APP_URL') }}/search/"+ keyword;
    }

    $('#headerSearchInput').keypress(function(e) {
        if (e.which == 13) {
            let keyword = $('#headerSearchInput').val();
            search(keyword);
        }
    });

    $('#headerSearchBtn').click(function(e) {
        let keyword = $('#headerSearchInput').val();
        search(keyword);
    });

    $('#headerSearchInPageInput').keypress(function(e) {
        if (e.which == 13) {
            let keyword = $('#headerSearchInPageInput').val();
            search(keyword);
        }
    });

    $('#headerSearchInPageBtn').click(function(e) {
        let keyword = $('#headerSearchInPageInput').val();
        search(keyword);
    });
</script>
<script>
    var url = new URL(window.location.href);
    var activeMenu = url.pathname;
    if(activeMenu == '/home' )
    {
        $('#home-head').addClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/videos' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').addClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/audios' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').addClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/images' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').addClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/news' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').addClass('active');
        $('#hots-head').removeClass('active');
    }
    else if(activeMenu == '/hots' )
    {
        $('#home-head').removeClass('active');
        $('#videos-head').removeClass('active');
        $('#audios-head').removeClass('active');
        $('#images-head').removeClass('active');
        $('#news-head').removeClass('active');
        $('#hots-head').addClass('active');
    }
</script>
<script>
    $('#loginFormModal').on("submit", function (e) { 
        e.preventDefault();
        const data = $(this).serializeArray();
        $('.icon-loader').html(`<i class="fas fa-spinner fa-spin"></i>`);
        $('.notify-login').html(``);
        $.ajax({
            type: "post",
            url: "{{ route('post.login')}}",
            data: data,
            dataType: "json",
            success: function (response) {
                $('.icon-loader').html(``);
                if (response && response.result === 'ok') {
                    setTimeout(function() {
                        window.location = window.location.origin;
                        $('#loginmodal').modal('hide');
                    },1000);
                } else
                if (response.result === 'fail') {
                    $('.notify-login').html(`<div class="king-form-tall-error">${response.message}</div>`)
                }
            }
        });
        return false;
    });

</script>