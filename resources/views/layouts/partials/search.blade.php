<div class="king-search">
    <div class="king-search-in">
        <div>
            <input id="headerSearchInput"  type="text" name="q" value="" class="king-search-field" placeholder="{{__('search')}}" autocomplete="off" style="width: calc(100% - 75px);" required>
            <button id="headerSearchBtn" class="king-search-button"><i class="fas fa-search fa-lg"></i></button>
        </div>
        <div id="king_live_results" class="liveresults" >
            <h3>Tìm kiếm được đề xuất</h3>
            <a href="{{env('APP_URL')}}/tag/cryptocurrencies">cryptocurrencies</a>
            <a href="{{env('APP_URL')}}/tag/stablecoin">stablecoin</a>
            <a href="{{env('APP_URL')}}/tag/deFi">deFi </a>
            <a href="{{env('APP_URL')}}/tag/tokens">tokens</a>
            <a href="{{env('APP_URL')}}/tag/blockchain">blockchain</a>
            <a href="{{env('APP_URL')}}/tag/crypto">crypto</a>
            <a href="{{env('APP_URL')}}/tag/coins">coins</a>
            <a href="{{env('APP_URL')}}/tag/news">news</a>
            <a href="{{env('APP_URL')}}/tag/nft">NFT</a>
        </div>
    </div>
</div>
