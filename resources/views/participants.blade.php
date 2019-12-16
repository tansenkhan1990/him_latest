@extends('layouts.masterHomePage')
@section('content')

    <br>

    <div class="container">
        <a href="{{ route('showDetatilEvent', ['id' =>$id]) }}"
           button type="button" class="btn btn-primary">basic data</abutton>
        </a>
        <a href="{{route('participants',['id' =>$id])}}"
           button type="button" class="btn btn-primary">Perticipant</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Add Group +</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Qutas +</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Sub event</abutton>
        </a>
        <a href="#"
           button type="button" class="btn btn-primary">Report</abutton>
        </a>
    </div>
    <br>

    <div class="container">
        <h2>Organisar:</h2>
        <p>
            @if($organiser!=null)
                @foreach($organiser as $org)
                    {{$org->p_vorname}}, {{$org->p_name}}
                    <a href="{{ route('PersonDetailInfo', ['id' =>$org->p_id]) }}">  detail</a>
                @endforeach
            @endif
        </p>
    </div>

        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Registration
                    <a href="#" class="btn btn-info btn-sm">
                        <span class="glyphicon glyphicon-plus"></span> Add
                    </a>
                </h2>
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


            <div class="container">
                <div class="row">
                <div class="col-md-12">
                <h2>Einladungen</h2>
                <ul class="list-group">
                    @if($invitation)
                        @foreach($invitation as $tel)
                            <li class="list-group-item">
                                {{$tel->p_vorname}}, {{$tel->p_name}}
                                <a href="#">edit</a>
                            </li>

                        @endforeach
                    @endif
                </ul>
            </div>



    </div>
            </div>



@endsection