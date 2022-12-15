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