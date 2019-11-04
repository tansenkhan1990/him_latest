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
        <a href="{{route('participants',['id' =>$evtId])}}"
           button type="button" class="btn btn-primary">Perticipant</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Reports</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Invitation</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Quotas</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Add Group +</abutton>
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
                <th>Institute</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>budget</th>
                <th>Bemerkungen</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$title}}</td>
                <td>{{$short_title}}</td>
                <td>{{$type}}</td>
                <td>
                    @foreach($userName as $us1)
                        @foreach($us1 as $us)
                            {{$us->name}} {{$us->vorname}}
                        @endforeach
                    @endforeach
                </td>
                <td>

                    @foreach ($pok as $pak)
                        @foreach ($pak as $bag)
                            {{$bag->vorname}}<br>
                        @endforeach
                    @endforeach


                </td>
                <td>
                    @if($research=='none')
                        none
                    @else
                        @foreach($research as $res)

                            {{$res->title}}
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($research=='none')
                        none
                    @else
                        @foreach($research as $res)
                            {{$res->letter}}

                        @endforeach
                    @endif
                </td>
                <td>{{$start}}</td>
                <td>{{$end}}</td>
                <td>
                    {{$budget}}

                </td>
                <td>
                    {{$remarks}}
                </td>
                @if(Auth::User()->id==2)
                    <td><abutton href="#"
                                 button type="button" class="btn btn-primary">edit</abutton></a></td>

                @else
                    <td><abutton href="#"
                                 button type="button" class="btn btn-primary">Detail</abutton></a></td>
                @endif
            </tr>
            </tbody>
        </table>



    </div>


    <div class="footer">
        <p>@copyright by <I>Hausdorff center for Mathematics</I> </p>
    </div>
@endsection