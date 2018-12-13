<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        GiphyAPP | @yield('title', 'Default')
    </title>

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.0.0/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-5.5.0/css/fontawesome.min.css') }}">
</head>
<body>
    @include('front.templates.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('front.templates.footer')

    <script src="{{ asset('plugins/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-4.0.0/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/fontawesome-5.5.0/js/all.js') }}"></script>
    <script src="{{ asset('plugins/clipboard/clipboard.min.js') }}"></script>

</body>
</html>