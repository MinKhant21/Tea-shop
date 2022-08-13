<?php

namespace App\Http\Controllers;

use App\Models\maxtable;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Postlogin(Request $request){
        
        $cre = $request->only('name','password');
        if(!auth()->attempt($cre)){
            return redirect()->back()->with('error','Try Again');
        }
        $user = auth()->user();
        auth()->login($user);
        $maxtable = maxtable::all();
        
        
        return view('home',compact('maxtable'));
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
