<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Phone; 
use App\Models\Cart;
use App\Models\Order;
Use Session;
Use Auth;
class OrderController extends Controller
{
    public function add(){ 

        $r=request(); 
        $address= DB::table('users')->where('id','=', Auth::id())->value('address');
        $count=$r->amount;
        if($count==null||$count==0){
            Session::flash('fail',"Please Seclet item to Checkout");
            Return redirect()->route('show.Cart');
        }else{
            $addOrder=Order::create([
            'Address'=>$address,
            'amount'=>$r->amount,
            'paymentStatus'=>'pending',
            'userID'=>Auth::id(),
            ]); 
            
        
        
        //get the lastest order ID
        $orderID=DB::table('orders')->where('userID','=',Auth::id())->orderBy('created_at', 'desc')->first();
        $items=$r->input('item');
        foreach($items as $item => $value){
            $carts =Cart::find($value);
            $carts->orderID = $orderID->id;
            $carts->save();
        }
        
        Session::flash('success',"Order created!");

        Return redirect()->route('my.order'); //redirect to payment
    }
    }

    public function show(){

        $myorders=DB::table('orders')
        ->leftjoin('carts', 'orders.id', '=', 'carts.orderID')
        ->leftjoin('phones', 'phones.id', '=', 'carts.ProductID')
        ->select('carts.*','orders.*','phones.*','carts.quantity as qty')
        ->where('orders.userID','=',Auth::id())
        ->get();
        //->paginate(3);
        return view('Order')->with('orders',$myorders);
    }
}
