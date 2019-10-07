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
    </div>
    <br>

    <div class="container">

        <div class="row">
            <div class="col-md-8">.col-md-8</div>
            <div class="col-md-4">.col-md-4</div>
        </div>
        <div class="row">
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4">.col-md-4</div>
            <div class="col-md-4">.col-md-4</div>
        </div>
        <div class="row">
            <div class="col-md-6">.col-md-6</div>
            <div class="col-md-6">.col-md-6</div>
        </div>

    </div>



    <div class="footer">
        <p>@copyright by <I>Hausdorff center for Mathematics</I> </p>
    </div>
@endsection