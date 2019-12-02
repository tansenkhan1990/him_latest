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
        <h2>hotels</h2>
        <a href="{{route('hotelOverview')}}"><button type="button" class="btn-primary">Show All</button></a>
        <a href="#"><button type="button" class="btn-primary">Show Active</button></a><br>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Hotel edit
                    Sort.
                    Search</th>
                <th>Event
                    Sort.
                    Search</th>
                <th>Arrival
                    Sort
                    Search</th>
                <th>Departure Sort. Search</th>
                <th>Number EZ
                    Sort
                    Search</th>
                <th>Number of DZ
                    Sort
                    Search</th>
                <th>Number Twins
                    Sort
                    Search</th>
                <th>Prices
                    Sort
                    Search</th>
                <th>Confirmation until
                    Sort
                    Search</th>
                <th>Quota
                    Sort
                    Search</th>
                <th>Actions</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>edit, delete</td>
            </tr>

            </tbody>
        </table>
    </div>

@endsection