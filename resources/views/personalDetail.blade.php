@extends('layouts.masterHomePage')
@section('content')

    

    <div class="container">



            <div class="btn-group btn-group-justified">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#bdata">Basic Data</a></li>
                    <li><a data-toggle="tab" href="#contact">Contact Detail</a></li>
                    <li><a data-toggle="tab" href="#paddress">Private address</a></li>
                    <li><a data-toggle="tab" href="#gvisit">Guest visit</a></li>
                    <li><a data-toggle="tab" href="#ccare">Child care</a></li>
                    <li><a data-toggle="tab" href="#bfunction">Body/Function</a></li>
                    <li><a data-toggle="tab" href="#hactivities">Him Activities</a></li>
                    <li><a data-toggle="tab" href="#status">status</a></li>
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

            <div id="contact" class="tab-pane fade">
                <h3>Contact Detail</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>


        </div>
    </div>







@endsection