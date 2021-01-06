<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Phone; 
use App\Models\Category;
use App\Models\Cart;
Use Session;
Use Auth;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function add(){ 
        $r=request(); 
        $addCategory=Cart::create([    
            
            'quantity'=>$r->quantity,             
            'orderID'=>'',
            'ProductID'=>$r->id,                 
            'userID'=>Auth::id(), 
                        
        ]);
        Session::flash('success',"Product add to cart succesful!");        
        Return redirect()->route('userShowPhone');
    }

    public function showMyCart(){
        $carts=DB::table('carts')
        ->leftjoin('phones', 'phones.id', '=', 'carts.ProductID')
        ->select('carts.quantity as cartQty','carts.id as cid','phones.*')
        ->where('carts.orderID','=','') //'' haven't make payment
        ->where('carts.userID','=',Auth::id())
        ->paginate(12);

        return view('Cart')->with('carts',$carts);
    }
    public function delete($id){
        $products=Cart::find($id);
        $products->delete();
        return redirect()->route('show.Cart');
    }
}
