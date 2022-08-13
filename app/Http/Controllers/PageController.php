<?php

namespace App\Http\Controllers;

use App\Models\maxtable;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showlogin(){
        $maxtable = maxtable::all();
        return view('home',compact('maxtable'));
    }
}
