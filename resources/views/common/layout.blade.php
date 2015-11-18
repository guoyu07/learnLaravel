<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div id="main">
        @yield('main') {{--要插入子页面的地方--}}
    </div>
    <div class="footer">
        @yield('script')
    </div>
</div>
</body>
</html>