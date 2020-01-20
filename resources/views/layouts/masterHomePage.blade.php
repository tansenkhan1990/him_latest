<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    {{--for calander--}}

    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--end calander--}}

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
                    <input type="text" id="firstName" name="firstname"
                           class="form-control"  placeholder="first name"  >
                    <input type="text" id="lastName" name="lastname" class="form-control"  placeholder="last name" >
                    <input type="text" id="university" name="university" class="form-control"  placeholder="university">
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

                <div class="col-md-1"><a href="{{route('hotelOverview')}}"><button type="button" class="btn btn-default">Hotels</button></a></div>
                <div class="col-md-2"><a href="{{route('cost')}}"><button type="button" class="btn btn-default">Receivables</button></a></div>
                <div class="col-md-1">
                    <a href="{{route('phone')}}">
                        <button type="button" class="btn btn-default">Phone</button>
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="{{route('swb')}}">
                        <button type="button" class="btn btn-default">
                            SWB</button>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('appartment')}}">
                        <button type="button" class="btn btn-default">
                            Appartment</button>
                    </a>
                </div>

                <div class="col-md-1"><button type="button" class="btn btn-default">Jobs</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">Report</button></div>
                <div class="col-md-1"><button type="button" class="btn btn-default">Import</button></div>

            </div>
        </div>
    </div>

    <div class="container center_div">
    <form class="navbar-form navbar-left"  action="{{route('searchEvent')}}">
        <div class="form-group">
            <input type="text" id="autosearchEvent" name="event" class="form-control" placeholder="search event
 with title" >
        </div>
        <button type="submit" class="btn btn-primary">search</button>
    </form>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $( "#firstName" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url : '{{route('autocompleteFirstName')}}',
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            return obj.vorname;
                        });

                        response(resp);
                    }
                });
            },
        });

    });

    $(document).ready(function() {
        $( "#university" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url : '{{route('autocompleteuniversity')}}',
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            return obj.university;
                    });

                        response(resp);
                    }
                });
            },
        });

    });

    $(document).ready(function() {
        $( "#lastName" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url : '{{route('autocompleteLastName')}}',
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            return obj.name;
                        });

                        response(resp);
                    }
                });
            },
        });

    });

    $(document).ready(function() {
        $( "#autosearchEvent" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url : '{{route('autosearchEvent')}}',
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            return obj.title;
                        });

                        response(resp);
                    }
                });
            },
        });

    });
</script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

@yield('content')

</body>
</html>