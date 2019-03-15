<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Occupancy;
use App\Arbeitplatze;
use App\Residance;
use App\Flat;
class personInformation extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function PersonDetailInfo($id){

        $a = DB::connection('mysql2');
        $personId=$id;
        $honorar='none';
        $type='none';
        $number='none';
        $accoCost='none';
        $housingBeniffit='none';
        $perDiem='none';
        $travelExpenses='none';
        $maximal='none';
        $sonstige='none';
        $comment='none';
        $CA='none';
        $CG='none';
        $guestStayFrom='none';
        $guestStayTo='none';
        $personRemarks='none';
        $guestInviteFrom ='none';
        $guestInviteTo  ='none';
        $anwesId=-999;
        $guestStatus='none';
        $eventOfPerson='none';
        $eventIdForPerson=-1;
        $personInfo=$a->select("select * from personen WHERE id=$id");



        $eventNameForPerson=$a->select("SELECT * FROM `teilnehmer` WHERE person=$id");

        if ($eventNameForPerson!=null){

            foreach ($eventNameForPerson as $eventForPerson)
            {
                $eventIdForPerson=$eventForPerson->event;

            }



                $eventTitleForPerson=$a->select("select * from events where id=$eventIdForPerson");
                foreach ($eventTitleForPerson as $eventDemo)
                {
                    $eventOfPerson=$eventDemo->title;
                }
                if ($eventOfPerson=='null')
                {
                    $eventOfPerson='none';
                }


        }
        $guestStays=$a->select("SELECT * FROM anwesenheit WHERE person =$id");
        foreach ($guestStays as $guestStay)
        {
            $guestStayFrom=$guestStay->von;
            $guestStayTo=$guestStay->bis;
            $guestInviteFrom=$guestStay->evon;
            $guestInviteTo=$guestStay->ebis;
            $anwesId=$guestStay->id;
        }



        $eventDates=$a->select("SELECT d.datum, d.`datum-bis` 
AS poko FROM dates d 
WHERE d.event=$eventIdForPerson");
        $eventFrom='none';
        $eventTo='none';
        if ($eventDates!=null)
        {
            foreach ($eventDates as $entdates)
            {
                $eventFrom=$entdates->datum;
                $eventTo=$entdates->poko;
            }
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
            $personRemarks=$perDur->bemerkung;
        }


        foreach ($personInfo as $person) {
            $bank=$person->bankverbindung;
            $p_prefix=$person->p_prefix;
            $p_phone=$person->p_telefon;
            $suffix=$person->suffix;
            $fax=$person->fax;
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
            //$p_prefix=$perso
            //n->p_prefix;
            $prefix=$person->prefix;
            $country=$person->land;
            $birthPlace=$person->birthplace;
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
            $phd_year=$person->year_phd;
            $telephone=$person->telefon;
            $university=$person->university;
            $address1=$person->street;
            $address2=$person->street2;

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

            $statusOfPerson=$a->select("SELECT * FROM statusen WHERE person=$id");
            foreach ($statusOfPerson as $statusOfGuest)
            {
                $guestStatus=$statusOfGuest->status;
                $from=$statusOfGuest->von;
                $to=$statusOfGuest->bis;

            }
            switch ($guestStatus)
            {
                case 10000:
                    $guestStatus='unknown';
                    break;
                case 10001:
                    $guestStatus='PHD-Student';
                    break;
                case 10002:
                    $guestStatus='Post Doc';
                    break;
                case 10003:
                    $guestStatus='Assistant Professor';
                    break;
                case 10004:
                    $guestStatus='Assistant Professor';
                    break;
                case 10005:
                    $guestStatus='Full Professor';
                    break;
                case 10006:
                    $guestStatus='Graduate';
                    break;
                default:
                    $guestStatus='not given';
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


if ($address1==null)
{
    $address1='not given';
}
if ($address2==null)
{
    $address2='not given';
}
if ($university==null)
{
    $university='not given';

}
if ($telephone==null)
{
    $telephone='none';
}
if($phd_year==null)
{
    $phd_year='none';
}
if ($birthPlace==null)
{
    $birthPlace='not given';
}
if ($www==null)
{
    $www='none';
}
if ($fax==null){
    $fax='none';
}
        if ($suffix==null){
            $suffix='none';
        }
        if ($prefix==null){
            $prefix='none';
        }
        if ($persondesh==null)
        {
            $persondesh='not given';
        }
        if ($bank==null)
        {
            $bank='not given';
        }
        //***finance part***

        $bankInfoPerson=$bank;
        $guestFinances=$a->select("select * from honorar where id=$anwesId");
        foreach ($guestFinances as $guestFin)
        {
            $honorar=$guestFin->h_honorar;
            $type=$guestFin->h_honorar_type;
            $number=$guestFin->h_honorar_anzahl;
            $accoCost=-$guestFin->h_unterkunft;
            $housingBeniffit=$guestFin->h_wohngeld;
            $perDiem=$guestFin->h_per_diem;
            $travelExpenses=$guestFin->h_reisekosten;
            $maximal=$guestFin->h_maximal;
            $sonstige=$guestFin->h_sonstige;
            $comment=$guestFin->h_s_bemerkungen;
            $CA=$guestFin->h_vertrag_v;
            $CG=$guestFin->h_vertrag_g;

        }


        switch ($type)
        {
            case 1: $type='per month';
                break;
            case 2: $type='unique';
                break;
            case 3: $type='proportionally';
                break;
            default: $type='none';

        }
        if ($number==null)
        {$number='none';}
        if ($fax==null)
        {$fax='none';}
        switch ($accoCost)
        {
            case 1: $accoCost='full refund';
                break;
            case 2: $accoCost='300 itself rest we provide';
                break;
            case 3: $accoCost='Grant';
                break;
            case 4: $accoCost='we:EZ, rest guest';
                break;
            default:
                $accoCost='none';
        }
        if ($housingBeniffit==null)
        {$housingBeniffit='none';}
        switch ($perDiem)
        {
            case 1: $perDiem='Ja';
            break;
            case 2: $perDiem='Anteiling';
            break;
            default: $perDiem='Nein';
        }
        switch ($travelExpenses)
        {
            case 1: $travelExpenses='ja';
            break;
            case 2:$travelExpenses='angefragt';
            break;
            case 3: $travelExpenses='anteilig';
            break;
            case 4: $travelExpenses='statement erforderlich';
            break;
            default: $travelExpenses='nein';
        }
        if ($maximal==null)
        {
            $maximal='none';
        }
        if ($sonstige==null)
        {
            $sonstige='none';
        }
        if ($comment==null)
        {
            $comment='none';
        }
        if ($CA=='0000-00-00')
        {
            $CA='not given';

        }
        if ($CG=='0000-00-00')
        {
            $CG='not given';
        }
        //occupancy part
        $occ_from='not given';
        $occ_to='not given';
        $occ_person='not given';
        $occ_arbeitsplatz='not given';
        $occupancies=Occupancy::where('person',"$id")->get();
        if ($occupancies!=null)
        {
            foreach ($occupancies as $occ)
            {
                $occ_from=$occ->von;
                $occ_to=$occ->bis;
                $occ_person=$occ->person;
                $occ_arbeitsplatz=$occ->arbeitsplatz;
            }
        }
        $occ_office='not given';
        $occ_workplace='not given';
        $occ_telefon='not given';
        $occ_arbeitsplatzs=Arbeitplatze::
        where('id',"$occ_arbeitsplatz")->get();
        if ($occ_arbeitsplatzs!=null)
        {
            foreach ($occ_arbeitsplatzs as $occ_arbeit)
            {
                $occ_office=$occ_arbeit->buro;
                $occ_workplace=$occ_arbeit->nummer;
                $occ_telefon=$occ_arbeit->telefon;
            }
        }


        //occupancy end
        //Residance Part
        $flat_place="not given";
        $flat_floor="not given";
        $flat_street="not given";
        $flats_id=-9999;
        $residence=Residance::where('mieter',"$id")->get();

       if ($residence!=null){
           foreach ($residence as $resi)
           {
               $flats_id=$resi->wohnung;

           }
           $flats_details=Flat::where('id',$flats_id)->get();
           foreach ($flats_details as $flat_information)
           {
               $flat_place=$flat_information->ort;
               $flat_floor=$flat_information->etage;
               $flat_street=$flat_information->strasse;
           }
       }



        //Residance End

            return view('personalDetail',compact([
                'flat_place','flat_floor','flat_street',
                'occ_from','occ_to','occ_office','occ_workplace','occ_telefon',
                'mail1','sal','mail2','gender','name','suffix','persondesh',
            'statusPerson','VIP','telephone','tit','personNation','persondesh',
            'vorname','street','place','prefix','group','eventIdForPerson',
            'account', 'www','institute1','institute2','address2',
                'birthDay','remarks','birthPlace','fax','university','address1',
                'nameSuffix','p_street','p_suffix','p_place','p_country','phd_year',
               'p_phone','p_prefix','bank','guestStatus','from','to','eventOfPerson',
                'eventFrom','eventTo','guestStayFrom','guestStayTo',
                'guestInviteFrom','guestInviteTo','$bankInfoPerson','personRemarks',
'honorar', 'type', 'number', 'accoCost','housingBeniffit', 'perDiem'
            ,'travelExpenses','maximal','sonstige','comment','CA','CG']));
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
