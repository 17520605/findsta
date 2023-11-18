<div class="rightsidebar">
    <div class="king-widgets-side king-widgets-side-top">
        <div class="king-widget-side king-widget-side-top">
            <div class="tagcloud king-widget-wb">
                <div class="widget-title">
                    {{__('tag_clouds')}}
                </div>
                <a href="{{env('APP_URL')}}/tag/stablecoin">stablecoin</a>
                <a href="{{env('APP_URL')}}/tag/deFi">deFi </a>
                <a href="{{env('APP_URL')}}/tag/nft">NFT</a>
                <a href="{{env('APP_URL')}}/tag/tokens">tokens</a>
                <a href="{{env('APP_URL')}}/tag/blockchain">blockchain</a>
                <a href="{{env('APP_URL')}}/tag/cryptocurrencies">cryptocurrencies</a>
                <a href="{{env('APP_URL')}}/tag/crypto">crypto</a>
                <a href="{{env('APP_URL')}}/tag/coins">coins</a>
                <a href="{{env('APP_URL')}}/tag/news">news</a>
                <a href="{{env('APP_URL')}}/tag/ico">ICO </a>
            </div>
        </div>
        <div class="king-widget-side king-widget-side-top">
            <div class="ilgilit">
                <div class="widget-title">
                    Bitcoin Price Chart Widget
                    <div class="style">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" style="width: 100%; height: 660px;margin-top: 20px;">
                      <div class="tradingview-widget-container__widget"></div>
                      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                      {
                      "title_raw": "Cryptocurrencies",
                      "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
                      "gridLineColor": "rgba(233, 233, 234, 1)",
                      "scaleFontColor": "rgba(218, 221, 224, 1)",
                      "title": "Cryptocurrencies",
                      "tabs": [
                        {
                          "title_raw": "Overview",
                          "symbols": [
                            {
                              "s": "BITFINEX:BTCUSD"
                            },
                            {
                              "s": "BITFINEX:ETHUSD"
                            },
                            {
                              "s": "BITFINEX:XRPUSD"
                            },
                            {
                              "s": "COINBASE:BCHUSD"
                            },
                            {
                              "s": "COINBASE:LTCUSD"
                            },
                            {
                              "s": "BITFINEX:IOTUSD"
                            }
                          ],
                          "title": "Overview"
                        },
                        {
                          "title_raw": "Bitcoin",
                          "symbols": [
                            {
                              "s": "BITFINEX:BTCUSD"
                            },
                            {
                              "s": "COINBASE:BTCEUR"
                            },
                            {
                              "s": "COINBASE:BTCGBP"
                            },
                            {
                              "s": "BITFLYER:BTCJPY"
                            },
                            {
                              "s": "WEX:BTCRUR"
                            },
                            {
                              "s": "CME:BTC1!"
                            }
                          ],
                          "title": "Bitcoin"
                        },
                        {
                          "title_raw": "Ripple",
                          "symbols": [
                            {
                              "s": "BITFINEX:XRPUSD"
                            },
                            {
                              "s": "KRAKEN:XRPEUR"
                            },
                            {
                              "s": "KORBIT:XRPKRW"
                            },
                            {
                              "s": "BITSO:XRPMXN"
                            },
                            {
                              "s": "BINANCE:XRPBTC"
                            },
                            {
                              "s": "BITTREX:XRPETH"
                            }
                          ],
                          "title": "Ripple"
                        },
                        {
                          "title_raw": "Ethereum",
                          "symbols": [
                            {
                              "s": "COINBASE:ETHUSD"
                            },
                            {
                              "s": "KRAKEN:ETHEUR"
                            },
                            {
                              "s": "KRAKEN:ETHGBP"
                            },
                            {
                              "s": "KRAKEN:ETHJPY"
                            },
                            {
                              "s": "POLONIEX:ETHBTC"
                            },
                            {
                              "s": "WEX:ETHLTC"
                            }
                          ],
                          "title": "Ethereum"
                        },
                        {
                          "title_raw": "Bitcoin Cash",
                          "symbols": [
                            {
                              "s": "COINBASE:BCHUSD"
                            },
                            {
                              "s": "BITSTAMP:BCHEUR"
                            },
                            {
                              "s": "CEXIO:BCHGBP"
                            },
                            {
                              "s": "POLONIEX:BCHBTC"
                            },
                            {
                              "s": "HITBTC:BCHETH"
                            },
                            {
                              "s": "WEX:BCHLTC"
                            }
                          ],
                          "title": "Bitcoin Cash"
                        }
                      ],
                      "plotLineColorFalling": "rgba(255, 74, 104, 1)",
                      "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
                      "showChart": true,
                      "title_link": "/markets/cryptocurrencies/prices-all/",
                      "locale": "en",
                      "symbolActiveColor": "rgba(242, 250, 254, 1)",
                      "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
                      "height": 660,
                      "width": 400
                    }
                      </script>
</div>
                    <!-- TradingView Widget END -->
                    </div>
                </div>
                <div class="ilgili">
       
                </div>
            </div>
        </div>
        <div class="king-widget-side king-widget-side-top">
            <div class="king-widget-wb">
                <div class="widget-title">
                    {{__('categories')}}
                </div>
                <div class="king-cat-side">
                    <ul class="king-nav-cat-list king-nav-cat-list-1">
                        @foreach ($categories as $category)
                        <li class="king-nav-cat-item king-nav-cat-entertainment">
                            <a href="{{env('APP_URL')}}/category/{{ $category->slug}}" class="king-nav-cat-link"><span style="color: {{ $category->color}}"><i
                                        class="fa-brands fa fa-solid {{ $category->icon}}"></i></span>{{ $category->name}}</a>
                            <span class="king-nav-cat-note">(1)</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="king-nav-cat-clear">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="king-sidebar king-widget-wb">
        <div
            style="display: block;
            position: relative;
            background-color: #afadc4a3;
            height: 220px;
            width: 100%;
            text-align: center;
            line-height: 220px;
            font-size: 22px;
            margin: auto;
            border-radius: 14px;
            color: #fff;
            border: 2px dashed #ffffff;">
            <img style="width: 100%;height:100%;object-fit: cover;border-radius: 14px;" src="https://res.cloudinary.com/dsldtailo/image/upload/v1700288438/hero-image.fill.size_1248x702.v1651073033_norzrq.jpg" alt=""></div>
            <!--<div style="display: block;-->
            <!--    background-color: #afadc4a3;-->
            <!--    height: 220px;-->
            <!--    width: 100%;-->
            <!--    text-align: center;-->
            <!--    line-height: 220px;-->
            <!--    font-size: 22px;-->
            <!--    margin: auto;-->
            <!--    border-radius: 14px;-->
            <!--    color: #fff;-->
            <!--    border: 2px dashed #ffffff;">Ad Area</div>-->
    </div>

</div>
