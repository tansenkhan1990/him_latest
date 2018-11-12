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
    <a href="{{ route('showDetatilEvent', ['id' =>$evtId]) }}"
       button type="button" class="btn btn-primary">basic data</abutton>
    </a>
    <a href="#"
       button type="button" class="btn btn-primary">participants</abutton>
    </a>
</div>

<br>

    <div class="container">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Short_title</th>
                <th>Type</th>
                <th>Responsible</th>
                <th>Organizer</th>
                <th>Research Area</th>
                <th>Research Letter</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>budget</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$title}}</td>
                <td>{{$short_title}}</td>
                <td>{{$type}}</td>
                <td>
                    @foreach($userName as $us)
                        {{$us->name}} {{$us->vorname}}
                        @endforeach
                </td>
                <td>
                   @foreach ($pok as $pk)

                    @foreach ($pk as $p)
                        {{$p->name}} {{$p->vorname}},
                        @endforeach

                    @endforeach

                </td>
                <td>
                    @if($research=='none')
                        none
                    @else
                    @foreach($research as $res)

                        {{$res->title}}
                </td>
                <td>
                    {{$res->letter}}

                    @endforeach
                        @endif
                </td>
                <td>{{$start}}</td>
                <td>{{$end}}</td>
                <th>{{$budget}}</th>
                @if(Auth::User()->id==2)
                <td><a href="#"
                       button type="button" class="btn btn-primary">edit</abutton></td>

                    @else
                    <td><a href="#"
                           button type="button" class="btn btn-primary">Detail</abutton></td>
                @endif
            </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>@copyright by <I>Hausdorff center for Mathematics</I> </p>
    </div>
@endsection