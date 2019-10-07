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
    <a href="{{route('home')}}">
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
<div class="container">
    <nav class="navbar navbar" id="pokopoko">
        <div class="container-fluid">
            <div class="navbar-header">

            </div>
            <ul class="nav navbar-nav">

                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li ><a href="{{route('event')}}">Event</a></li>
                @if(Auth::user()->id==2)
                    <li><a href="{{ route('userAdd') }}">Add User </a></li>
                    <li><a href="{{ route('showUser') }}">User list</a></li>
                @endif
            </ul>

            <form class="navbar-form navbar-left" action="{{route('searchPerson')}}">
                <div class="form-group">
                    <input type="text" name="firstname" class="form-control"  placeholder="first name" >
                    <input type="text" name="lastname" class="form-control"  placeholder="last name" >
                    <input type="text" name="university" class="form-control"  placeholder="university">
                </div>
                <button type="submit" class="btn btn-primary">search</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#collapseExample"  data-toggle="collapse" >more</a></li>
                <li><a href="{{route('getUpdateProfile')}}">Update Profile</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>

        </div>
    </nav>
</div>
<div class="container" id="ping">
    <div class="collapse" id="collapseExample">
        <div class="well">
            <div class="row">

                <div class="col-md-1"><button type="button" class="btn btn-default">Apartment</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">Hotels</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">Jobs</button></div>
                <div class="col-md-2"><button type="button" class="btn btn-default">Receivables</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">Bicyles</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">Phone</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">SWB</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">Report</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">Import</button></div>

            </div>
        </div>
    </div>
</div>
@yield('content')

</body>
</html>