<?php

namespace App\Http\Controllers;

use App\Models\maxtable;
use App\Models\Order;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

    public function join(Request $request){
        $t =  $request->t;
        $tt = $request->tt;
            if($tt < 6 && $t < 6){
                
                maxtable::create([
                    'table' => $t,
                    'jointable' => $tt,
                ]); 
                return redirect('/')->with('success','Table Joined');
            }
    
            return  redirect('/')->with('error','Out of Table');     
    }

    public function delete($slug){
        maxtable::where('id',$slug)->delete();
        return redirect('/')->with('success','Join Table Splitted');
    }

    public function menu($slug){
        $products =  Product::all();
        
        $orders = Order::all();
        return view('table',compact('products','slug','orders'));
    }

    public function tabledetail($id,$slug,$jslug){
       
        $tables = Table::all();
        $tt = $tables->where('tableNumber',$jslug)->first()->total_price;
        $t = $tables->where('tableNumber',$slug)->first()->total_price;
        
        $total_price = $tt+$t;
        return view('table-detail',compact('total_price','slug','jslug','id'));
    }
}
