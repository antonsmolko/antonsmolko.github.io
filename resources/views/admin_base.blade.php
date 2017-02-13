<!doctype html>

<html>

<head>
    @section('head')
    @show
    @stack('meta')
    @stack('styles')
</head>

<body>
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
    @stack('script')
</body>

</html>