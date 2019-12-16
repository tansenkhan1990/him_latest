@extends('layouts.masterHomePage')
@section('content')

    <br>
    <div class="container">
        <h2>hotels</h2>
        <a href="{{route('hotelOverview')}}"><button type="button" class="btn-primary">Show All</button></a>
        <a href="{{route('hotelActive')}}"><button type="button" class="btn-primary">Show Active</button></a><br>
        <br>
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
            @foreach($hotelOverview as $hotel)
                <tr>
                    <td>{{$hotel->name}}</td>
                    <td>{{$hotel->short_title}}</td>
                    <td>{{$hotel->hotelkontingente_von}}</td>
                    <td>{{$hotel->hotelkontingente_bis}}</td>
                    <td>{{$hotel->hotelkontingente_anzahl_0}}</td>
                    <td>{{$hotel->hotelkontingente_anzahl_1}}</td>
                    <td>{{$hotel->hotelkontingente_anzahl_3}}</td>
                    <td>{{$hotel->hotelkontingente_preise}}</td>
                    <td>{{$hotel->hotelkontingente_bestatigung}}</td>
                    <td>@if($hotel->hotelkontingente_abrufkontingent==0)
                            hotel Quota
                        @endif
                        @if($hotel->hotelkontingente_abrufkontingent==1)
                            Abrufkontingent
                        @endif
                    </td>
                    <td>
                        <a href="#">edit</a><a href="#"> , delete</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection