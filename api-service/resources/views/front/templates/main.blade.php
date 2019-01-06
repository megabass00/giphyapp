<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        GiphyAPP | @yield('title', 'Default')
    </title>

    <link rel="stylesheet" href="/css/frontend.css">
    @yield('css')
</head>
<body>
    @include('front.templates.navbar')

    <div class="container" id="content">
        @yield('content')
    </div>

    @include('front.templates.footer')

    <script src="/js/frontend.js"></script>
    @yield('js')

</body>
</html>