<!doctype html>

<html>

<head>
    @section('head')
    @show
    @stack('styles')
    @stack('script')
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
        <div class="container">
            @section('admin_navbar')
            @show
            @section('content')
            @show
        </div>
    </div>

    <div class="footer">
        @section('footer')
        @show
    </div>
</body>

</html>