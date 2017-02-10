<!doctype html>

<html>

<head>
    @section('head')
    @show
    @stack('styles')
</head>

<body>
    <div class="header">
        @section('header')
        @show
    </div>

        @section('content')
        @show

    <div class="footer">
        @section('footer')
        @show
    </div>
    @stack('mane_script')
    @stack('script')
</body>

</html>