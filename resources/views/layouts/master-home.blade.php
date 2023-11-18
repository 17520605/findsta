<!doctype html>
<html lang="en">
<head>
    <!--
     __  __       _                               _         _ _          _____            _             _               
    |  \/  |     | |                             | |       (_) |        / ____|          | |           | |              
    | \  / | __ _| | _____    __ _  __      _____| |__  ___ _| |_ ___  | |     ___  _ __ | |_ __ _  ___| |_   _   _ ___ 
    | |\/| |/ _` | |/ / _ \  / _` | \ \ /\ / / _ \ '_ \/ __| | __/ _ \ | |    / _ \| '_ \| __/ _` |/ __| __| | | | / __|
    | |  | | (_| |   <  __/ | (_| |  \ V  V /  __/ |_) \__ \ | ||  __/ | |___| (_) | | | | || (_| | (__| |_  | |_| \__ \
    |_|  |_|\__,_|_|\_\___|  \__,_|   \_/\_/ \___|_.__/|___/_|\__\___|  \_____\___/|_| |_|\__\__,_|\___|\__|  \__,_|___/ 

    -Facebook : https://www.facebook.com/nguyenhuuminhkhai/
    -Email : nguyenhuuminhkhai@gmail.com
    -Phone : +84 --- --- ---
    -Feedback https://cryptonexnews.com/feedback
    -Email cryptonexnews support : support247@cryptonexnews.com
    --->  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="W">
    <meta name="keywords" content="CryptoNexNews">
    <meta name="author" content="nguyenhuuminhkhai@gmail.com">                                                                                              
    <meta property="og:image" content="@yield('og-image')">
    <meta property="og:title" content="@yield('og-title')" />
    <meta property="og:description" content="@yield('og-description')" />
    <title>@yield('title')</title>                                         
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ header('Access-Control-Allow-Origin: *') }}
    {{ header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE') }}
    {{ header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With') }}
    @includeIf('layouts.partials.css')
</head>
<body class="king-template-home king-body-js-off">
    <header class="king-headerf">
        @includeIf('layouts.partials.header')
    </header>
    <div class="page-body">
        <!-- Container-fluid starts-->
        @yield('content')
        <!-- Container-fluid Ends-->
    </div>
    <footer class="king-footer">
        @includeIf('layouts.partials.footer')
    </footer>
    @includeIf('layouts.partials.js')
</body>

</html>
