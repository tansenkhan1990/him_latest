<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class event extends Controller
{
    public $type=array("10001" => "workshop",
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
        $this->middleware('auth');
    }
    public function getEventPage()
    {
        $a=DB::connection('mysql2');
        $c=$a->select("SELECT d.datum, d.`datum-bis` 
AS poko, e.title, 
e.short_title, e.type,e.id as evnId,
 e.verantwortlicher from dates d, events e where e.id = d.event");
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
        // $users=$a->select("select * from events WHERE title LIKE '%$event%'");
        $users=$a->select("select * from personen,events WHERE events.verantwortlicher=personen.id
AND events.title LIKE '%$event%'");
        $che=$a->select("SELECT d.datum, d.`datum-bis` AS poko, 
`event` from dates d, events e
 where e.id = d.event");
        //foreach ($users as $user)
        //{
        //   echo $user->title."<br>";
        // }
        $typo=$this->type;
        return view('eventInfo',compact(['users','b','typo','che']));
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
        //echo $aa[0];
        $userName=$a->select("select name,vorname from personen 
where personen.id=$aa[0]");
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
            $len = count($organizer);
        }
        if($researchAreaId==null){
            $research='none';
        }
        else{
            $research=$a->select("select * from research_areas 
where research_areas.id=$researchAreaId[0]");
        }
        $i = 0;
        while ($i < $len) {
            $pok[$i] = $a->select("select name,vorname from personen WHERE id=$organizer[$i]");
            $i++;
        }
        $evtId=$id;
        return view('eventDetail', compact(['pok','research','userName',
            'evtId','users','start', 'type', 'end', 'title', 'short_title','budget'
        ]));
    }
}
