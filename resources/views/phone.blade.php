@extends('layouts.masterHomePage')
@section('content')

    <div class="container center_div">

        <form class="navbar-form navbar-left"  action="{{route('searchEvent')}}">
            <div class="form-group">
                <input type="text" name="event" class="form-control" placeholder="search event
 with title" >
            </div>
            <button type="submit" class="btn btn-primary">search</button>
        </form>
    </div>
    <br>
    <div class="container">
        <h2>phone Detail</h2>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Appartment</th>
                <th>Area Code</th>
                <th>Phone number</th>
                <th>Booking</th>
                <th>Registration number</th>
                <th>Username</th>
                <th>DSL Password</th>
                <th>(SSID) WLAN Password</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach($hotelOverview as $hotel)
                <tr>
                    <td>{{$hotel->strasse}}</td>
                    <td>{{$hotel->rufnummer_prefix}}</td>
                    <td>{{$hotel->rufnummer}}</td>
                    <td>{{$hotel->buchungskonto}}</td>
                    <td>{{$hotel->tonline_id}}</td>
                    <td>{{$hotel->kennwort}}</td>
                    <td>{{$hotel->richtige_id}}</td>
                    <td>{{$hotel->anschluss}}</td>
                    <td>
                        <a href="#">edit</a><a href="#"> , delete
                        </a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection