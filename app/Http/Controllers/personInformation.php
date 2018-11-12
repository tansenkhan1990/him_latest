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





        $personStay=$a->select("SELECT * FROM `anwesenheit` WHERE `person` = 812");
        foreach ($personStay as $perDur)
        {
            $personInviteStart=$perDur->evon;
            $personInviteEnd=$perDur->ebis;
            $personStayStart=$perDur->von;
            $personStayEnd=$perDur->bis;
        }

        foreach ($personInfo as $person) {
            $street=$person->p_street;
            $VIP=$person->vip;
            $group = $person->gruppe;
            $name = $person->name;
            $vorname = $person->vorname;
            $gender = $person->gender;
            $mail1=$person->email1;
            $mail2=$person->email2;
            $street=$person->street;
            //$p_street=$person->p_street;
            $place=$person->ort;
            //$p_place=$person->p_ort;
            //$p_prefix=$person->p_prefix;
            $prefix=$person->prefix;
            $country=$person->land;
            $institute1=$person->institution1;
            $institute1=$person->institution1;
            //$p_country=$person->p_country;
            $nationality=$person->nationality;
            $statusPerson=$person->status;
            $account=$person->account;
            $www=$person->www;
        }
        if ($VIP==1)
        {
            $VIP='VIP';
        }
        else{
            $VIP='NO VIP';
        }
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
        return view('personalDetail',compact(['mail1','mail2','gender','name',
            'statusPerson','VIP','tit','personNation','persondesh',
            'vorname','street','place','prefix','group',
            'account','www','institute1','institute2']));
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
