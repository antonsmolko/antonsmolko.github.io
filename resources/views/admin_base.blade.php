<!doctype html>

<html>

<head>
    @section('head')
    @show
</head>

<body>
<div class="header">
    @section('header')
    @show
</div>

<div class="content">
    <div class="wrapper">
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