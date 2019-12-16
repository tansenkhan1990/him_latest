@extends('layouts.masterHomePage')
@section('content')

    <br>
    <div class="container">
        <h2>Receivables</h2>
        <br>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>

                <th>Person</th>
                <th>Amount</th>

            </tr>
            </thead>
            <tbody>
            @foreach($hotelOverview as $hotel)
                <tr>
                    <td>
                        <a href="{{ route('PersonDetailInfo',
                         ['id' =>$hotel->personen_id]) }}">
                            {{$hotel->personen_vorname}}
                        {{$hotel->personen_name}}
                        </a>
                    </td>

                    <td>
                       <a href="#"> {{$hotel->kosten}}
                       </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection