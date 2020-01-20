<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Events;
class event extends Controller
{
    public $type = array("10001" => "workshop",
        "10002" => "trimester program",
        "10003" => "lecture series",
        "10004" => "junior trimester program",
        "10020" => "lecture",
        "10021" => "conference",
        "10022" => "seminar",
        "10024" => "sonstiges",
        "10099" => "group");

    public function __construct()
    {
        $a = DB::connection('mysql2');
        $this->middleware('auth');
    }

    public function autocompleteFirstName(Request $request)
    {
        $a = DB::connection('mysql2');
        $search = $request->get('term');

        $result = $a->select("select vorname from personen 
where vorname like '$search%'");
        return response()->json($result);
    }

    public function autocompleteLastName(Request $request)
    {
        $a = DB::connection('mysql2');
        $search = $request->get('term');

        $result = $a->select("select name from personen 
where name like '$search%'");
        return response()->json($result);
    }

    public function autocompleteuniversity(Request $request)
    {
        $a = DB::connection('mysql2');
        $search = $request->get('term');

        $result = $a->select("select university from personen 
where university like '$search%'");
        return response()->json($result);
    }
    public function autosearchEvent(Request $request)
    {
        $a = DB::connection('mysql2');
        $search = $request->get('term');

        $result = $a->select("select title from events 
where title like '$search%'");
        return response()->json($result);
    }

    public function appartment()
    {

        $a=DB::connection('mysql2');
        $tasks=$a->select
        ("SELECT * FROM wohnbelegung,wohnungen WHERE wohnbelegung.wohnung=wohnungen.id");
        return view('appartment',compact(['tasks']));

//        return view('appartment');
    }
    public function swb()
    {
        $a=DB::connection('mysql2');
        $hotelOverview=$a->select
        ("SELECT * FROM swb,wohnungen WHERE 
swb.id=wohnungen.swb");
        return view('swb',compact(['hotelOverview']));
    }
    public function phone()
    {
        $a=DB::connection('mysql2');
        $hotelOverview=$a->select
        ("SELECT * FROM telekom,wohnungen 
WHERE telekom.id=wohnungen.telekom");
        return view('phone',compact(['hotelOverview']));

    }
    public function cost()
    {
        $a=DB::connection('mysql2');
        $hotelOverview=$a->select
        ("SELECT *,personen.name as personen_name,personen.vorname AS 
personen_vorname,personen.id as personen_id,ausenstande.id as
 ausenstande_id,SUM(ausenstande.kosten) as kosten 
 from ausenstande,personen WHERE ausenstande.person=personen.id 
GROUP BY personen.id ORDER BY ausenstande.id DESC");
        return view('cost',compact(['hotelOverview']));
    }


    public function hotelOverview()
    {
        $a=DB::connection('mysql2');
        $hotelOverview=$a->select("select *,hotelkontingente.abrufkontingent as hotelkontingente_abrufkontingent,hotelkontingente.bestatigung as hotelkontingente_bestatigung,hotelkontingente.preise as hotelkontingente_preise,hotelkontingente.von as hotelkontingente_von,
  hotelkontingente.bis as hotelkontingente_bis,hotelkontingente.anzahl_3 as hotelkontingente_anzahl_3,hotelkontingente.anzahl_1 as hotelkontingente_anzahl_1,hotelkontingente.anzahl_0 as hotelkontingente_anzahl_0 from events,hotels, hotelkontingente WHERE 
hotelkontingente.hotel=hotels.id and hotelkontingente.event=events.id order BY(hotelkontingente_von) DESC");
        return view('hotelOverview',compact(['hotelOverview']));
    }
    public function hotelActive()
    {
        $a=DB::connection('mysql2');
        $hotelOverview=$a->select("select *,hotelkontingente.abrufkontingent as hotelkontingente_abrufkontingent,hotelkontingente.bestatigung as hotelkontingente_bestatigung,hotelkontingente.preise as hotelkontingente_preise,hotelkontingente.von as hotelkontingente_von,
  hotelkontingente.bis as hotelkontingente_bis,hotelkontingente.anzahl_3 as hotelkontingente_anzahl_3,hotelkontingente.anzahl_1 as hotelkontingente_anzahl_1,hotelkontingente.anzahl_0 as hotelkontingente_anzahl_0 from events,hotels, hotelkontingente WHERE 
hotelkontingente.hotel=hotels.id and hotelkontingente.event=events.id
 and YEAR(hotelkontingente.von) >=YEAR(CURDATE()) order BY(hotelkontingente_von) DESC");
        return view('hotelActive',compact(['hotelOverview']));
    }
    public function participants($id)
    {
        $invitation=null;
        $organiser=null;
        $a=DB::connection('mysql2');
        $invitation=$a->select("SELECT p.vorname as p_vorname, p.name as p_name, p.id as p_id FROM `einladungen` as e join personen as p WHERE p.id=e.person and e.event=$id");
        $organiser=$a->select("SELECT p.id as p_id,p.vorname as p_vorname,p.name as p_name from events as e join personen as p WHERE e.organiser=p.id and e.id=$id");
        $registrations=$a->select("SELECT * FROM `registrations` WHERE event=$id");
        $telemar=$a->
        select("select * from `teilnehmer` JOIN `personen`
 WHERE teilnehmer.person=personen.id and teilnehmer.event=$id");

        return view('participants',compact(['invitation','id','registrations','telemar','organiser']));
    }
    public function autosuggest(Request $request)
    {
        $search = $request->get('term');
        $result = User::where('name', 'LIKE', '%'. $search. '%')->get();
        return response()->json($result);
    }
    public function getEventPage()
    {
        $a=DB::connection('mysql2');
        $c=$a->select("SELECT d.datum, d.`datum-bis` 
AS poko, e.title, 
e.short_title, e.type,e.id as evnId,
 e.verantwortlicher from dates d, events e where e.id = d.event order by e.id desc");
        $b=$a->select("SELECT vorname,name, personen.id 
as pear from personen");
        $users=null;
        // $b=null;
        $d=$this->type;
        return view('eventInfo',compact(['b','c','d','users']));
    }
    public function searchEvent(Request $request)
    {
        $event=$request['event'];
        $a=DB::connection('mysql2');
        $b=null;
        $users=$a->select
        ("select e.id,e.title,e.type,d.`datum-bis` as poko,d.datum
 from dates d,events e where d.event=e.id and 
e.title like '%$event%'");
        //foreach ($users as $user)
        //{
        //   echo $user->title."<br>";
        // }
        $typo=$this->type;
        //print_r($users);
        return view('eventInfo',compact(['users','typo']));
    }
    public function showDetatilEvent($id)
    {
        $a = DB::connection('mysql2');
        $users=$a->select("select verantwortlicher from events where events.id=$id");
        foreach ($users as $user)
        {
            $userId =$user->verantwortlicher;
        }
        $aa = explode(',', $userId);
        $len1=count($aa);
        $i1 = 0;
        //print_r($organizer);
        while ($i1 < $len1) {
            $userName[$i1] = $a->select("select name,vorname from personen 
where personen.id=$aa[$i1]");
            $i1++;
        }
        $pr = $a->select("select * from events where id='$id'");
        $dat = $a->select("SELECT d.datum, d.`datum-bis` AS poko from dates d where d.event=$id");
        foreach ($dat as $dats) {
            $start = $dats->datum;
            $end = $dats->poko;
        }
        foreach ($pr as $p) {
            $researchAreaId=$p->research_area;
            $type = $this->type[$p->type];
            $title = $p->title;
            $budget=$p->budget;
            $short_title = $p->short_title;
            $organizer = explode(",", $p->organiser);
            $remarks=$p->bemerkungen;
            $len = count($organizer);
        }
        if($researchAreaId==null){
            $research='none';
        }
        else{
            $research=$a->select("select * from research_areas 
where research_areas.id=$researchAreaId");
        }
        $i = 0;
        //print_r($organizer);
        while ($i < $len) {
            $pok[$i] = $a->select("select name,vorname from personen WHERE id=$organizer[$i]");
            $i++;
        }
        $evtId=$id;
        return view('eventDetail', compact(['pok','research','userName','remarks',
            'evtId','users','start', 'type', 'end', 'title', 'short_title','budget'
        ]));
    }
}