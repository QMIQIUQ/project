<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Phone; 
use App\Models\rating; 
class ratingController extends Controller
{
   
    public function create(){
        return view('insertRate') ->with('phones',Phone::id());

    }
    public function store(){    //step 2 
        $r=request(); //step 3 get data from HTML
       
        $username= DB::table('users')->where('id','=', Auth::id())->value('name');
        $addRate=rating::create([    //step 3 bind data
            'id'=>$r->ID, //add on 
            'phoneID'=>$phoneID,
            'comment'=>$r->comment, //fullname from HTML
            'ratingPoints'=>$r->ratingPoints,
            'username'=>$username,
            'userID'=>Auth::id(),
            
        ]);
        
        Session::flash('success',"Rate  succesful!");

        return redirect()->route('phonedetail');
    }

    public function show(){
        $products=Phone::paginate(5);
        return view('showRate')->with('products',$products);
    }

    public function showRate(){
        $products=Phone::where('phones.userID','=',Auth::id())
        ->paginate(5)
        ;

        return view('showRate')->with('products',$products);
    }
    public function delete($id){
        $products=Phone::find($id);
        $products->delete();
        Session::flash('deleteSuccess',"Rating and Comment deleted succesful!");
        return redirect()->route('showRate');
    }
}
