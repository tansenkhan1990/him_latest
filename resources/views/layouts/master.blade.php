<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <title>Title</title>
</head>
<body>
<div class="container">
    <a href="{{route('welcome')}}">
    <div class="template headersection clear">
        <div class="logo">
            <img src={{ asset('punkte_gelb50.png') }}>
        </div>
        <div class="logo2">
            <img src={{ asset('hausdorff-center-logo_gelb50.png') }}>
        </div>
        <div class="logo3">
            <img src={{ asset('uni-bonn.jpg') }}>
        </div>
    </div>
    </a>
</div>


@yield('content')

</body>
</html>


