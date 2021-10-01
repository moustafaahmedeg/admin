<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grains - @yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">

    @yield('css')
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="@yield('class')">
    @yield('content')

    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    @yield('script')
    <script src="/dist/js/adminlte.min.js"></script>
</body>
</html>

