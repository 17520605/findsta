<div class="king-search">
    <div class="king-search-in">
        <div>
            <input id="headerSearchInput"  type="text" name="q" value="" class="king-search-field" placeholder="{{__('search')}}" autocomplete="off" style="width: calc(100% - 75px);" required>
            <button id="headerSearchBtn" class="king-search-button"><i class="fas fa-search fa-lg"></i></button>
        </div>
        <div id="king_live_results" class="liveresults" >
            <h3>Discover</h3>
            <a class="sresults" href="{{env('APP_URL')}}/tag/video">video</a>
            <a class="sresults" href="{{env('APP_URL')}}/tag/music">music</a>
            <a class="sresults" href="{{env('APP_URL')}}/tag/music">image</a>
            <a class="sresults" href="{{env('APP_URL')}}/tag/news">news</a>
            <a class="sresults" href="{{env('APP_URL')}}/tag/blog">blog</a>
            <a class="sresults" href="{{env('APP_URL')}}/tag/art">art</a>
            <a class="sresults" href="{{env('APP_URL')}}/tag/youtube">youtube</a>
            <a class="sresults" href="{{env('APP_URL')}}/tag/instagram">instagram</a>
        </div>
    </div>
</div>
