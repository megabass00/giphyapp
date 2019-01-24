<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Default') | GiphyAPP Admin</title>

    <link rel="stylesheet" href="{{ asset('css/backend.css') }}">

    @yield('css')
</head>
<body>
    @include('admin.templates.navbar')
    
    <div class="container" id="content">
        <div class="jumbotron mt-3">
            <h2>
                @yield('title')
            </h2>
            <small>
                @yield('description')
            </small>
            <hr>
            @include('flash::message')
            @yield('content')
        </div>
    </div>
    @include('front.templates.footer')

    <script src="{{ asset('js/backend.js') }}"></script>
    @yield('js')
</body>
</html>