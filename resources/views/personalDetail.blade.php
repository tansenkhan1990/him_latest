@extends('layouts.masterHomePage')
@section('content')

    

    <div class="container">



            <div class="btn-group btn-group-justified">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#bdata">Basic Data</a></li>
                    <li><a data-toggle="tab" href="#contact">Contact Detail</a></li>
                    <li><a data-toggle="tab" href="#paddress">Private address</a></li>
                    <li><a data-toggle="tab" href="#status">status</a></li>
                    <li><a data-toggle="tab" href="#gvisit">Guest visit</a></li>
                    <li><a data-toggle="tab" href="#ccare">Child care</a></li>
                    <li><a data-toggle="tab" href="#bfunction">Body/Function</a></li>
                    <li><a data-toggle="tab" href="#hactivities">Him Activities</a></li>
                    <li><a data-toggle="tab" href="#profile">Profile</a></li>
                </ul>
            </div>
        <div class="tab-content">

            <div id="bdata" class="tab-pane fade in active">
                <h3>Basic information</h3>
                <div class="panel panel-default">

                    <div class="row">
                        <div class="col-md-4"><div class="panel-body"><h5>Title</h5> {{ $tit}}</div>
                            <div class="panel-body"><h5>First Name</h5> {{$vorname}}</div>
                            <div class="panel-body"><h5>Last Name</h5> {{$name}}</div>
                            <div class="panel-body"><h5>Name Suffix</h5> {{ $nameSuffix}}</div>
                            <div class="panel-body"><h5>Gender</h5>{{ $gender}}</div>
                        </div>
                        <div class="col-md-4">

                            <div class="panel-body"><h5>VIP</h5>{{ $VIP}}</div>
                            <div class="panel-body"><h5>Date of Birth</h5>{{$birthDay}}</div>
                            <div class="panel-body"><h5>Group</h5>{{ $group}}</div>
                            <div class="panel-body"><h5>Nationality</h5> {{$personNation}}</div>
                            <div class="panel-body"><h5>Birth Place</h5>{{ $birthPlace}}</div>

                        </div>
                        <div class="col-md-4">
                            <div class="panel-body"><h5>Year of Phd</h5> {{$phd_year}}</div>
                            <div class="panel-body"><h5>IT Account</h5> @if($account!=null){{ $account}}
                                @else
                                    none
                                @endif
                            </div>
                            <div class="panel-body"><h5>Remarks</h5> {{ $remarks}}</div>
                            <div class="panel-body">Picture have to add</div>
                        </div>
                    </div>




            </div>
            </div>
            <div id="status" class="tab-pane fade">
                <h3>Status</h3>
                <div class="panel panel-default">
                    <div class="col-md-4">
                        <div class="panel-body"><h5>status:</h5> {{$guestStatus}}</div>
                        <div class="panel-body"><h5>from</h5>{{$from}}</div>
                        <div class="panel-body"><h5>to</h5> {{$to}}</div>
                    </div>
                </div>
            </div>

            <div id="contact" class="tab-pane fade">
                <h3>Contact Detail</h3>
                <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel-body"><h5>Telephone</h5> {{$telephone}}</div>
                    <div class="panel-body"><h5>Email</h5> {{$mail1}} ,{{$mail2}}</div>
                    <div class="panel-body"><h5>Fax</h5> {{$fax}}</div>
                    <div class="panel-body"><h5>Institutions</h5>
                        {{$institute1}} , {{$institute2}}</div>
                </div>
                <div class="col-md-4">
                    <div class="panel-body"><h5>WWW</h5> {{$www}}</div>
                    <div class="panel-body"><h5>University</h5>{{$university}}</div>
                    <div class="panel-body"><h5>Address1</h5>{{$address1}}</div>
                    <div class="panel-body"><h5>Address2</h5>{{$address2}}</div>
                </div>

                <div class="col-md-4">
                    <div class="panel-body"><h5>prefix</h5> {{$prefix}}</div>
                    <div class="panel-body"><h5>ort</h5>{{$place}}</div>
                    <div class="panel-body"><h5>suffix</h5>{{$suffix}}</div>
                    <div class="panel-body"><h5>land</h5>{{$persondesh}}</div>
                </div>

            </div>
                </div>


            </div>



            <div id="paddress" class="tab-pane fade">
                <h3>Private Address</h3>
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel-body"><h5>private phone</h5> {{$p_phone}}</div>
                            <div class="panel-body"><h5>Road (private)</h5> {{$p_street}}</div>
                            <div class="panel-body"><h5>prefix (private)</h5> {{$p_prefix}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel-body"><h5>place</h5> {{$p_place}}</div>
                            <div class="panel-body"><h5>suffix</h5> {{$p_suffix}}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel-body"><h5>country</h5> {{$p_country}}</div>
                            <div class="panel-body"><h5>Bank detail </h5> {{$bank}}</div>
                        </div>

                    </div>
                </div>


            </div>









        </div>
    </div>
@endsection