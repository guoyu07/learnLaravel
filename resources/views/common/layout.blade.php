<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{--<link rel="stylesheet" href="{{ elixir('css/test/all.css') }}">--}}
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div id="header">
                @include('common.nav')
            </div>
            <div id="main">
                @yield('main') {{--要插入子页面的地方--}}
            </div>
            <div id="footer">
                @yield('script')
            </div>
        </div>
    </div>
</body>
</html>