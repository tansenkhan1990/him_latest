<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class personInformation extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function PersonDetailInfo($id){

        $a = DB::connection('mysql2');
        $personInfo=$a->select("select * from personen WHERE id=$id");



        $eventNameForPerson=$a->select("SELECT * FROM `teilnehmer` WHERE person=$id");
        if ($eventNameForPerson!=null)
        {
            foreach ($eventNameForPerson as $eventForPerson)
            {
                $eventIdForPerson=$eventForPerson->event;

            }

            $eventTitleForPerson=$a->select("select title from events where id=$eventIdForPerson");
            foreach ($eventTitleForPerson as $eventDemo)
            {
                $eventOfPerson=$eventDemo->title;
            }

        }
        else{
            $eventOfPerson='none';

        }

       /*  foreach ($eventNameForPerson as $eventForPerson)
        {
            $eventIdForPerson=$eventForPerson->event;

        }

        $eventTitleForPerson=$a->select("select title from events where id=$eventIdForPerson");
        foreach ($eventTitleForPerson as $eventDemo)
        {
            $eventOfPerson=$eventDemo->title;
        }
       */





        $personStay=$a->select("SELECT * FROM `anwesenheit` WHERE `person` = $id");
        foreach ($personStay as $perDur)
        {
            $personInviteStart=$perDur->evon;
            $personInviteEnd=$perDur->ebis;
            $personStayStart=$perDur->von;
            $personStayEnd=$perDur->bis;
        }

        foreach ($personInfo as $person) {
            $p_street=$person->p_street;
            $p_suffix=$person->p_suffix;
            $p_land=$person->p_land;
            $p_place=$person->p_ort;
            $VIP=$person->vip;
            $group = $person->gruppe;
            $name = $person->name;
            $vorname = $person->vorname;
            $gender = $person->gender;
            $mail1=$person->email1;
            $mail2=$person->email2;
            $street=$person->street;
            $place=$person->ort;
            //$p_prefix=$person->p_prefix;
            $prefix=$person->prefix;
            $country=$person->land;
            $institute1=$person->institution1;
            $institute2=$person->institution2;
            //$p_country=$person->p_country;
            $nationality=$person->nationality;
            $statusPerson=$person->status;
            $account=$person->account;
            $www=$person->www;
            $title=$person->titel;
            $salutation=$person->anrede;
            $birthDay=$person->birthday;
            $remarks=$person->bemerkungen;
            $nameSuffix=$person->zusatz;
        }
        $salut=$a->select("select anrede from anreden where id=$salutation");
        foreach ($salut as $salu)
        {
            $sal=$salu->anrede;
        }
        if ($sal==null)
        {
            $sal='none';
        }
        switch ($title)
        {
            case 1:
                $tit='Prof.Dr';
                break;
            case 2:
                $tit="Dr";
                break;
            case 3:
                $tit='PD Dr';
                break;
            default:
                $tit='none';
        }
        if ($VIP==1)
        {
            $VIP='VIP';
        }
        else{
            $VIP='NO VIP';
        }
       /*
         $statusid=$a->select("select anrede from personen WHERE id=$id");
        foreach ($statusid as $status)
        {
            $title=$status->anrede;
        }
        $salutaion=$a->select("select anrede from anreden WHERE id=$title");
        foreach ($salutaion as $salu)
        {
            $tit=$salu->anrede;
        }
        */
        if ($group==20001){
            $group='HIM Guest';
        }
        else if($group==20002)
        {
            $group='HCM Guest';
        }
       else
        {
            $group='Management';
        }

            if ($gender==1)
            {
                $gender='male';
            }
            if ($gender==2)
            {
                $gender='female';
            }
            if ($gender==null)
            {
                $gender='unknown';
            }


        $ppp_country=$a->select("SELECT * FROM lands WHERE id=$p_land");
            foreach ($ppp_country as $ppcountry)
            {
                $p_country=$ppcountry->land;
            }

            $nation=$a->select("SELECT * FROM lands WHERE id=$nationality");
            foreach ($nation as $nat)
            {
                $personNation=$nat->land;
            }

            $desh=$a->select("SELECT * FROM lands WHERE id=$country");
            foreach ($desh as $des)
            {
                $persondesh=$des->land;
            }
            if ($statusPerson==null)
            {
                $statusPerson='unknown';

            }
        if ($personNation==null)
        {
            $personNation='unknownn';
        }
        if ($statusPerson==0)
        {
            $statusPerson='unknown';
        }
        if ($birthDay=='0000-00-00')
        {
            $birthDay='not given';
        }
        if ($remarks==null)
        {
            $remarks='not given anything';
        }
        if ($nameSuffix==null)
        {
            $nameSuffix='none';
        }
        if($institute1==null)
        {
            $institute1='none';
        }
        if ($institute2==null)
        {
            $institute2='none';
        }

/*
            echo "Event Name: $eventOfPerson<br>";
            echo "person invite start:$personInviteStart"."<br>";
            echo "person invite end:$personInviteEnd"."<br>";
            echo "person stay:$personStayStart"."<br>";
            echo "person stay end:$personInviteEnd"."<br>";
            echo "firstName:$vorname<br>";
            echo "lastName: $name<br>";
            //echo "event name:$eventName"."<br>";
            echo $mail1."<br>";
            echo $mail2."<br>";
            echo $gender."<br>";
            echo $name."<br>";
            echo $statusPerson."<br>";
            echo $VIP."<br>";
            echo $mail1."<br>";
            echo $mail2."<br>";
            echo $tit."<br>";
            echo $personNation."<br>";
            echo $persondesh."<br>";
            echo $vorname."<br>";
            echo $street."<br>";
            echo $place."<br>";
            echo $prefix."<br>";
            echo $group."<br>";
            echo $account."<br>";
                    */

            return view('personalDetail',compact(['mail1','sal','mail2','gender','name',
            'statusPerson','VIP','tit','personNation','persondesh',
            'vorname','street','place','prefix','group',
            'account', 'www','institute1','institute2',
                'birthDay','remarks',
                'nameSuffix','p_street','p_suffix','p_place','p_country']));
        }


    public function searchPerson(Request $request){
        $firstname=$request['firstname'];
        $lastname=$request['lastname'];
        $university=$request['university'];


        if($firstname==null){
            $firstname='fsknjvkjfshvkjshf';
        }
        if($lastname==null){
            $lastname='fsknjvkjfshvkjshf';
        }
        if($university==null){
            $university='fsknjvkjfshvkjshf';
        }
        $a=DB::connection('mysql2');
        $b=$a->select("SELECT * FROM personen WHERE vorname LIKE '%$firstname%' 
or name LIKE '%$lastname%' or university LIKE '%$university%'");

        //echo "firstName $firstname"."<br>";
        //echo "LastName $lastname"."<br>";
        //echo "university $university"."<br>";
       return view('showDetail', ['posts' => $b]);



    }

}
