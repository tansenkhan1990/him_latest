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
        <h2>SWB</h2>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Wohnung</th>
                <th>Strom: Kd.-Nr.</th>
                <th>Vertragsnr</th>
                <th>Abschlag</th>
                <th>Änderung Abschlagshöhe</th>
                <th>Gas: Kd.-Nr.</th>
                <th>Vertragsnr</th>
                <th>Abschlag</th>
                <th>Änderung Abschlagshöhe</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($hotelOverview as $hotel)
                <tr>
                    <td>{{$hotel->strasse}},{{$hotel->wohnungs_nr}}</td>
                    <td>{{$hotel->strom}}</td>
                    <td>{{$hotel->vstrom}}</td>
                    <td>{{$hotel->astrom}}</td>
                    <td>{{$hotel->hstrom}}</td>
                    <td>{{$hotel->gas}}</td>
                    <td>{{$hotel->vgas}}</td>
                    <td>{{$hotel->agas}}</td>
                    <td>{{$hotel->hgas}}</td>

                    <td>
                        <a href="#">edit</a><a href="#"> , delete
                        </a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection