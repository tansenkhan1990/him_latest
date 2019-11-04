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
        <a href="{{ route('showDetatilEvent', ['id' =>$id]) }}"
           button type="button" class="btn btn-primary">basic data</abutton>
        </a>
        <a href="{{route('participants',['id' =>$id])}}"
           button type="button" class="btn btn-primary">Perticipant</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Reports</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Invitation and quotas</abutton>
        </a>

        <a href="#"
           button type="button" class="btn btn-primary">Add Group +</abutton>
        </a>
    </div>
    <br>

    <div class="container">
        Orgainzer:demo name for organizar<a href="#">  detail</a>
        <div class="row">
            <div class="col-md-6">
                <h2>Registration</h2>
                <ul class="list-group">
                    <li class="list-group-item">First item</li>
                    <li class="list-group-item">Second item</li>
                    <li class="list-group-item">Third item</li>
                </ul>
            </div>

            <div class="col-md-6">
                <h2>Teilnehmer</h2>
                <ul class="list-group">
                    <li class="list-group-item">First item</li>
                    <li class="list-group-item">Second item</li>
                    <li class="list-group-item">Third item</li>
                </ul>
            </div>

        </div>



    </div>



    <div class="footer">
        <p>@copyright by <I>Hausdorff center for Mathematics</I> </p>
    </div>
@endsection