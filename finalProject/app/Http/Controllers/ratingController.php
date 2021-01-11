<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Phone; 
use App\Models\rating; 
Use Auth;
class ratingController extends Controller
{
   
    public function create(){
        return view('insertRate')->with('phones',Phone::id());

    }
    public function store(){   
        $r=request(); 
      
        $username= DB::table('users')->where('id','=', Auth::id())->value('name');
      
        $addRate=rating::create([    
            
            'PhoneID'=>$r->PhoneID,
            'comment'=>$r->comment, 
            'ratingPoints'=>$r->ratingPoints,
            'username'=>$username,
            'userID'=>Auth::id(),
            
        ]);
        
        Session::flash('success',"Rate  succesful!");

        return redirect()->route('insertRate');
    }

    public function showRate(){
        $ratings=DB::table('ratings')
        ->leftjoin('phones', 'phones.id', '=', 'ratings.ProductID')
        ->where('ratings.userID','=',Auth::id())
        ->get();

        return view('showRate')->with('ratings',$ratings);
    }

}
