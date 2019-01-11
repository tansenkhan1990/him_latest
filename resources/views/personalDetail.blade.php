@extends('layouts.masterHomePage')
@section('content')
    <div class="container">


            <div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-primary">Basic Data</a>
                <a href="#" class="btn btn-primary">Contact Detail</a>
                <a href="#" class="btn btn-primary">Private Address</a>
                <a href="#" class="btn btn-primary">Status</a>
                <a href="#" class="btn btn-primary">Guest Visit</a>
                <a href="#" class="btn btn-primary">Child Care</a>
                <a href="#" class="btn btn-primary">Body/Function</a>
                <a href="#" class="btn btn-primary">Him Activites</a>
                <a href="#" class="btn btn-primary">Profile</a>
            </div>

        <h2>Basic Information</h2>
        <div class="panel panel-default">
            <div class="panel-body">First Name:  {{$vorname}}</div>
            <div class="panel-body">Last Name:   {{$name}}</div>
            <div class="panel-body">Email:  @if($mail1!=null)
            {{$mail1}}

                @elseif($mail2!=null)
                    , {{$mail2}}

                @else
                    Not Given
                                                @endif

            </div>
            <div class="panel-body">Address: {{$street}}, {{$place}} , {{$prefix}}
                , {{$persondesh}}</div>
            <div class="panel-body">Nationality:   {{$personNation}}</div>
            <div class="panel-body">Name Suffix: {{ $nameSuffix}}</div>
            <div class="panel-body">Salutation:   {{$sal}}</div>
            <div class="panel-body">Date of Birth:   {{$birthDay}}</div>
            <div class="panel-body">VIP: {{ $VIP}}</div>
            <div class="panel-body">Gender: {{ $gender}}</div>
            <div class="panel-body">Status: {{ $statusPerson}}</div>
            <div class="panel-body">Title: {{ $tit}}</div>
            <div class="panel-body">Group: {{ $group}}</div>
            <div class="panel-body">Remarks: {{ $remarks}}</div>
            <div class="panel-body">IT Account: @if($account!=null){{ $account}}
            @else
            none
                                                 @endif
            </div>
            <div class="panel-body">Personal WebSite: @if($www!=null)
                {{ $www}}
                                                        }
            @else
                    none


                @endif
            </div>
            <div class="panel-body">Institution: @if($institute1!=null)
                                                     {{$institute1}}
                                                     @elseif($institute1=null)
                {{$institute2}}
                @elseif($institute2=null)

                none
                                                     @endif
                </div>


        </div>




        </div>






@endsection