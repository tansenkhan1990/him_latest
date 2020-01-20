<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response;

class Calander extends Controller
{
    public function __construct()
    {
        $a = DB::connection('mysql2');
        $this->middleware('auth');
    }

    public function index()
    {
//        if(request()->ajax())
//        {
//            $a = DB::connection('mysql2');
//            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
//            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
//
//            $data =$a->select("SELECT personen.vorname as p_name,
// wohnbelegung.von as start,wohnbelegung.bis as end,
// wohnungen.wohnungs_nr as appartment FROM personen,
// wohnbelegung,wohnungen WHERE wohnbelegung.wohnung=wohnungen.id and
// personen.id=wohnbelegung.mieter");
//            return Response::json($data);
//        }
        $a=DB::connection('mysql2');
        $tasks=$a->select
        ("SELECT * FROM wohnbelegung,wohnungen WHERE wohnbelegung.wohnung=wohnungen.id");
        return view('appartment2',compact(['tasks']));

    }
}
