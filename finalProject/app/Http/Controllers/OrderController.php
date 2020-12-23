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
        $addOrder=Order::create([
            'AddressID'=>$r->Adrress,
            'amount'=>$r->amount,
            'paymentStatus'=>'pending',
            'userID'=>Auth::id(),
        ]); 

        $orderID=DB::table('order_lists')->where('userID','=',Auth::id())->orderBy('created_at', 'desc')->first(); //get the lastest order ID

        $items=$r->input('item');
        foreach($items as $item => $value){
            $carts =Cart::find($value);
            $carts->orderID = $orderID->id;
            $carts->save();
        }

        Session::flash('success',"Order succesful!");
        Return redirect()->route('my.order'); //redirect to payment

    }

    public function show(){

        $myorders=DB::table('order_lists')
        ->leftjoin('carts', 'order_lists.id', '=', 'carts.orderID')
        ->leftjoin('phones', 'phones.id', '=', 'carts.ProductID')
        ->leftjoin('users', 'users.address', '=', 'order_lists.address')
        ->select('carts.*','order_lists.*','phones.*','carts.quantity as qty')
        ->where('order_lists.userID','=',Auth::id())
        ->get();
        //->paginate(3);
        return view('Order')->with('myorders',$myorders);
    }
}
