@extends('layouts.masterHomePage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10 text-right"><a href="{{ route('showDetatilEvent',
        ['id' =>$eventIdForPerson]) }}">
                    event: {{$eventOfPerson}}<br>
                    duration:{{$eventFrom}} To {{$eventTo}}
                </a>
            </div>
        </div>
        <br>





        <div class="btn-group btn-group-justified">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#bdata">Basic Data</a></li>
                <li><a data-toggle="tab" href="#contact">Contact Detail</a></li>
                <li><a data-toggle="tab" href="#paddress">Private address</a></li>
                <li><a data-toggle="tab" href="#status">status</a></li>
                <li><a data-toggle="tab" href="#finance">Guest Visit</a></li>
                <li><a data-toggle="tab" href="#care">Child care</a></li>
                <li><a data-toggle="tab" href="#bodyf">Body/Function</a></li>
                <li><a data-toggle="tab" href="#RA">Research Area</a></li>
                <li><a data-toggle="tab" href="#HA">Him Activities</a></li>
                <li><a data-toggle="tab" href="#profile">Profile</a></li>
                <li><a data-toggle="tab" href="#profile">Reports</a></li>
            </ul>
        </div>
        <div class="tab-content">


            <div id="bdata" class="tab-pane fade in active">
                <h3>Basic information</h3>
                <div class="panel panel-default">

                    <div class="row">
                        <div class="col-md-4"><div class="panel-body"><h5>Title</h5> {{ $tit}}</div>
                            <div class="panel-body"><h5>Stay from</h5> {{$guestStayFrom}} to {{$guestStayTo}}</div>
                            <div class="panel-body"><h5>Invited from</h5> {{$guestInviteFrom}} to {{$guestInviteTo}}</div>
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


            <!--him activities start-->
            <div id="HA" class="tab-pane fade">
                <h3>HIM Activities</h3>
                <!-- Standard button need to add the research area button-->

                <div class="panel panel-default">
                    <h3>Member</h3>
                    @if($eventNameForPerson2!=null)
                        @foreach($eventNameForPerson2 as $ent99)
                            <div class="panel-body">
                                <p>{{$ent99->title}}
                                    <a href="{{ route('showDetatilEvent',
        ['id' =>$ent99->e_id]) }}">Detail
                                    </a>
                                </p>
                            </div>
                        @endforeach

                    @endif

                    <div>
                        <h3>Organisar</h3>
                        @if($organizer!=null)
                            @foreach($organizer as $or)
                                <div class="panel-body">
                                    <p>{{$or->title}}
                                        <a href="{{ route('showDetatilEvent',
        ['id' =>$or->id]) }}">Detail</a>
                                    </p>
                                </div>
                            @endforeach

                        @endif

                    </div>

                    <div class="container">
                        <h3>Responsible</h3>
                        @if($organizer!=null)
                            @foreach($organizer as $or)
                                <div class="panel-body">
                                    <p>{{$or->title}}
                                        <a href="{{ route('showDetatilEvent',
        ['id' =>$or->id]) }}">Detail</a>
                                    </p>
                                </div>
                            @endforeach

                        @endif

                    </div>

                    <div class="container">
                        <h3>Travel</h3>
                        <p>

                        @if($researchNames!=null)
                            @foreach($researchNames as $researchNams)
                                <h2>{{$researchNams->ort}}</h2>
                                resesarch title: {{$researchNams->title}}
                                <a href="#">edit</a>
                                <br>
                                @endforeach
                                @endif

                                </p>

                    </div>



                </div>
            </div>

            <!--him avtivities end-->

            <!--research area start-->
            <div id="RA" class="tab-pane fade">
                <h3>Research Area</h3>
                <!-- Standard button need to add the research area button-->

                <div class="panel panel-default">
                    @if($researchNames!=null)
                        @foreach($researchNames as $researchNams)
                            <h2>{{$researchNams->ort}}</h2>
                            resesarch title: {{$researchNams->title}}
                            <a href="#">edit</a>
                            <br>
                        @endforeach
                    @endif
                </div>
            </div>
            <!--research area end-->


            <div id="status" class="tab-pane fade">
                <h3>Status</h3>
                <!-- Standard button -->

                <div class="panel panel-default">

                    <div class="panel-body"><h5>status:</h5> {{$guestStatus}}</div>
                    <div class="panel-body"><h5>Stay from</h5> {{$guestStayFrom}} to {{$guestStayTo}}</div>
                    <div class="panel-body"><h5>Invited from</h5> {{$guestInviteFrom}} to {{$guestInviteTo}}</div>


                </div>
            </div>
            <!--testing poko-->
            <div id="VC" class="tab-pane fade">
                <h3>Vacant office</h3>
                <!-- Standard button -->

                <div class="btn-group btn-group-justified">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#fin">Fees/reambursement</a></li>
                        <li><a data-toggle="tab" href="#currentLocation">Current location</a></li>
                        <li><a data-toggle="tab" href="#VF">vacant flat</a></li>
                        <li><a data-toggle="tab" href="#VC">Vanant office</a></li>
                    </ul>
                </div>


                <div class="panel panel-default">

                    <div class="container">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>HIM</th>
                                <th>HIM Annex</th>
                                <th>HCM-villa Maria</th>

                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                @if($workplacesVacant!=null)
                                    @foreach($workplacesVacant as $workplacesVacans)
                                        @foreach($workplacesVacans as $workVanant)
                                            <td>
                                                @if($workVanant->haus==1)
                                                    B:{{$workVanant->haus}},
                                                    A:{{$workVanant->nummer}}
                                                @else
                                                    none
                                                @endif
                                            </td>
                                            <td>
                                                @if($workVanant->haus==2)
                                                    B:{{$workVanant->haus}},
                                                    A:{{$workVanant->nummer}}
                                                @else
                                                    none
                                                @endif
                                            </td>
                                            <td>
                                                @if($workVanant->haus==3)
                                                    B:{{$workVanant->haus}},
                                                    A:{{$workVanant->nummer}}
                                                @else
                                                    none
                                                @endif
                                            </td>

                                            <td>
                                                <a href="{{ route('PersonDetailInfo',$workVanant->id) }}"
                                                   button type="button" class="btn btn-success">Book this</abutton></td>
                            </tr>
                            @endforeach
                            @endforeach
                            @endif

                            </tbody>

                        </table>
                    </div>


                </div>

            </div>
            <!--ending poko-->


            <!--current location-->
            <div id="currentLocation" class="tab-pane fade">
                <h3>Current working place</h3>
                <!-- Standard button -->

                <div class="btn-group btn-group-justified">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#fin">Fees/reambursement</a></li>
                        <li><a data-toggle="tab" href="#currentLocation">Current location</a></li>
                        <li><a data-toggle="tab" href="#VF">vacant flat</a></li>
                        <li><a data-toggle="tab" href="#VC">Vanant office</a></li>

                    </ul>
                </div>

                <div class="panel panel-default">
                    <ul>
                        <li><h4>Occupancy (edit):</h4><p>from {{$occ_from}} to {{$occ_to}}<br>
                                office:{{$occ_office}}<br>
                                workplace:{{$occ_workplace}}<br>
                                Telephone:{{$occ_telefon}}
                            </p>
                        </li>
                        <li><h4>Appartment(edit):</h4><p>
                                {{$flat_street}} ,Floor: {{$flat_floor}} , {{$flat_place}}
                            </p></li>
                        <li><h4>Hotels(edit):</h4>
                            {{$hotelName}} , {{$hotelZimmer}} ,
                            Duration({{$hotelFrom }}to {{$hotelTo}})
                            <p>

                            </p></li>
                    </ul>
                </div>
            </div>

            <!--vacent office start-->
            <div id="VF" class="tab-pane fade">
                <h3>Vacant flats</h3>

                <div class="btn-group btn-group-justified">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#fin">Fees/reambursement</a></li>
                        <li><a data-toggle="tab" href="#currentLocation">Current location</a></li>
                        <li><a data-toggle="tab" href="#VF">vacant flat</a></li>
                        <li><a data-toggle="tab" href="#VC">Vanant office</a></li>

                    </ul>
                </div>

                <div class="panel panel-default">

                    <div class="container">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Street</th>
                                <th>Appartment</th>
                                <th>Floor</th>

                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                @if($vacentFlats!=null)
                                    @foreach($vacentFlats as $vacantFlat)
                                        @foreach($vacantFlat as $vacF)
                                            <td>{{$vacF->strasse}}</td>
                                            <td>{{$vacF->wohnungs_nr}}</td>
                                            <td>{{$vacF->etage}}</td>

                                            <td>
                                                <a href="{{ route('PersonDetailInfo',$vacF->id) }}"
                                                   button type="button" class="btn btn-success">Book this</abutton></td>
                            </tr>
                            @endforeach
                            @endforeach
                            @endif

                            </tbody>

                        </table>
                    </div>


                </div>


            </div>
            <!--vacent office start-->


            <!--current location-->


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


            <!--body function start-->
            @if($bodyFunction!='none')
                <div id="bodyf" class="tab-pane fade">
                    <h3>Body function</h3>
                    <!-- Standard button -->
                    <div class="panel panel-default">
                        @foreach($bodyFunction as $bodyf)
                            <div class="panel-body"><h5>Function:</h5> {{$body2[$bodyf->function]}}</div>
                            <div class="panel-body"><h5>Stay from</h5> {{$bodyf->von}}</div>
                            <div class="panel-body"><h5>stay till</h5> {{$bodyf->bis}}</div>
                        @endforeach
                    </div>
                </div>
        @endif
        <!--body function end-->

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


            <div id="finance" class="tab-pane fade">

                <h3>Finance Infromation</h3>
                <!-- Standard button -->

                <div class="btn-group btn-group-justified">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#fin">Fees/reambursement</a></li>
                        <li><a data-toggle="tab" href="#currentLocation">current location</a></li>
                        <li><a data-toggle="tab" href="#VF">vacant flat</a></li>
                        <li><a data-toggle="tab" href="#VC">Vanant office</a></li>

                    </ul>

                </div>
                <!--default code is here-->
                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel-body"><h5>Fees</h5> {{$honorar}}</div>
                            <div class="panel-body"><h5>Type</h5>{{$type}}</div>
                            <div class="panel-body"><h5>Fax</h5> {{$fax}}</div>
                            <div class="panel-body"><h5>Number</h5>{{$number}}</div>
                            <div class="panel-body"><h5>Bemerkungen</h5>{{$personRemarks}}</div>

                        </div>
                        <div class="col-md-4">
                            <div class="panel-body"><h5>Accomodation Cost</h5>
                                {{$accoCost}}</div>
                            <div class="panel-body"><h5>Hosuing Benefit</h5>
                                {{$housingBeniffit}}</div>
                            <div class="panel-body"><h5>Per Diem</h5>{{$perDiem}}</div>
                            <div class="panel-body"><h5>Bank Information</h5>{{$bank}}</div>
                            <div class="panel-body"><h5>Travel Expense</h5>{{$travelExpenses}}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel-body"><h5>maximal</h5> {{$maximal}}</div>
                            <div class="panel-body"><h5>sonstige</h5>{{$sonstige}}</div>
                            <div class="panel-body"><h5>Bemerkung</h5>{{$comment}}</div>
                            <div class="panel-body"><h5>Vertrag an Verwaltung</h5>{{$CA}}</div>
                            <div class="panel-body"><h5>Vertrag an Gast</h5>{{$CG}}</div>

                        </div>

                    </div>

                </div>
                <!--default code for here-->
            </div>

            <!--ending button-->
            <div id="fin" class="tab-pane fade">

                <h3>Fee / reimbursement </h3>
                <div class="btn-group btn-group-justified">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#fin">Fees/reambursement</a></li>
                        <li><a data-toggle="tab" href="#currentLocation">current location</a></li>
                        <li><a data-toggle="tab" href="#VF">vacant flat</a></li>
                        <li><a data-toggle="tab" href="#VC">Vanant office</a></li>

                    </ul>
                </div>

                <div class="panel panel-default">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel-body"><h5>Fees</h5> {{$honorar}}</div>
                            <div class="panel-body"><h5>Type</h5>{{$type}}</div>
                            <div class="panel-body"><h5>Fax</h5> {{$fax}}</div>
                            <div class="panel-body"><h5>Number</h5>{{$number}}</div>
                            <div class="panel-body"><h5>Bemerkungen</h5>{{$personRemarks}}</div>

                        </div>
                        <div class="col-md-4">
                            <div class="panel-body"><h5>Accomodation Cost</h5>
                                {{$accoCost}}</div>
                            <div class="panel-body"><h5>Hosuing Benefit</h5>
                                {{$housingBeniffit}}</div>
                            <div class="panel-body"><h5>Per Diem</h5>{{$perDiem}}</div>
                            <div class="panel-body"><h5>Bank Information</h5>{{$bank}}</div>
                            <div class="panel-body"><h5>Travel Expense</h5>{{$travelExpenses}}</div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel-body"><h5>maximal</h5> {{$maximal}}</div>
                            <div class="panel-body"><h5>sonstige</h5>{{$sonstige}}</div>
                            <div class="panel-body"><h5>Bemerkung</h5>{{$comment}}</div>
                            <div class="panel-body"><h5>Vertrag an Verwaltung</h5>{{$CA}}</div>
                            <div class="panel-body"><h5>Vertrag an Gast</h5>{{$CG}}</div>

                        </div>

                    </div>

                </div>
            </div>




            <div id="care" class="tab-pane fade">
                <h3>child care</h3>
                <!-- Standard button -->

                <div class="panel panel-default">

                    @if($kinder!='none')
                        @foreach($kinder as $kid)
                            @foreach($kid as $kids)

                                <div class="panel-body"><h5>name: {{$kids->name}}</h5></div>
                                <div class="panel-body"><h5>age:{{$kids->alter}} years</h5></div>
                                <div class="panel-body"><h5>Particular point:{{$kids->besonderheiten}}</h5></div>
                                <div class="panel-body"><h5></h5>
                                    @if($kids->gender==1)
                                        boy
                                    @endif
                                    @if($kids->gender==2)
                                        gril
                                    @endif
                                    @endforeach
                                    @endforeach
                                    @endif

                                </div>
                                <h3>add child</h3>
                                <a href="#">insert information</a>
                </div>
            </div>

@endsection