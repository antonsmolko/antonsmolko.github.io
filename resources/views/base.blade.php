<!doctype html>

<html>

<head>
    @section('head')
    @show
    @stack('styles')
</head>

<body>
    <div class="navbar">
        @section('navbar')
        @show
    </div>
    <div class="header">
        @section('header')
        @show
    </div>

    <div class="content">
        <div class="wrapper">
            @section('content')
            @show
        </div>
    </div>

    <div class="footer">
        @section('footer')
        @show
    </div>
</body>
    @stack('script')
</html>