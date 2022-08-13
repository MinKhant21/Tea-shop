<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Catch_;

use function PHPUnit\Framework\returnSelf;

class OrderController extends Controller
{
    public function orderadd($slug){

        Order::create([
            'product_id' => $slug,
           
            'total_quantity' => 1,
            'order_date' => date('Y-m-d'),
        ]);

        
        Cart::create([
            'product_id' => $slug,
            'total_quantity' => 1,
            'cart_date' => date('Y-m-d'),
        ]);

        

        return redirect()->back();
    
    }

    public function addqty($slug){
        
       $order = Order::where('id',$slug)->first();
       $cart = Cart::where('id',$slug)->first();
       $order->update([
            'total_quantity' => DB::raw('total_quantity+1'),
       ]);
       $cart->update([
        'total_quantity' => DB::raw('total_quantity+1'),
    ]);
       return redirect()->back();
       
    }

    public function removeqty($slug){
        $order = Order::where('id',$slug)->first();
        $cart = Cart::where('id',$slug)->first();
        $order->update([
            'total_quantity' => DB::raw('total_quantity-1'),
        ]);
        $cart->update([
            'total_quantity' => DB::raw('total_quantity-1'),
        ]);
        return redirect()->back();
    }

    public function checkout($slug,$tslug){
        $total_price = $slug;
        $cart = Cart::all();
        Table::create([
            'tableNumber' => $tslug,
            'total_price' => $total_price,
        ]);
        
        


        Order::truncate();  
        return redirect('/')->with('success','This Table CheckOuted');
    }

    public function orderdetail(){
        $cart = Cart::all();
        $table = Table::all();
        return view('order-detail',compact('cart','table'));
    }
  
}
