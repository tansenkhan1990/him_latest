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
           button type="button" class="btn btn-primary">Invitation and quotas</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Reports</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Add Group +</abutton>
        </a>
    </div>
    <br>

    <div class="container">
        <p>
            @if($organiser!=null)
            @foreach($organiser as $org)
                {{$org->p_vorname}}, {{$org->p_name}}
            <a href="{{ route('PersonDetailInfo', ['id' =>$org->p_id]) }}">  detail</a>
        @endforeach
                @endif
        </p>
        <div class="row">
            <div class="col-md-6">
                <h2>Registration</h2>
                <ul class="list-group">
                    @if($registrations)
                        @foreach($registrations as $reg)
                    <li class="list-group-item">{{$reg->first_name}} ,
                        @if($reg->status==0)
                        {{$reg->family_name}} (open)
                        @endif
                        @if($reg->status==1)
                            {{$reg->family_name}} (decline)
                        @endif
                        @if($reg->status==2)
                            {{$reg->family_name}} (accepted)
                        @endif
                        @if($reg->status==3)
                            {{$reg->family_name}} (withdraw)
                        @endif

                        <a href="#">edit</a>
                    </li>
                        @endforeach
                        @endif
                </ul>
            </div>

            <div class="col-md-6">
                <h2>Teilnehmer</h2>
                <ul class="list-group">
                    @if($telemar)
                        @foreach($telemar as $tel)
                    <li class="list-group-item">
                        {{$tel->vorname}}, {{$tel->name}}
                    <a href="#">edit</a>
                    </li>

                        @endforeach
                        @endif
                </ul>
            </div>

        </div>



    </div>




@endsection