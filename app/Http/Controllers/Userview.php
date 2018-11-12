<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Userview extends Controller
{
    public function welcomepage()
    {
        return view('welcomepage');
    }
    public function sendMail()
    {
        return view('email');
    }

    public function rest()
    {
        return view('reset');
    }
}
