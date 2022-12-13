<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    <title>Findsta interesting information</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ header('Access-Control-Allow-Origin: *') }}
    {{ header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE') }}
    {{ header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With') }}
    <title>@yield('title')</title>
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
