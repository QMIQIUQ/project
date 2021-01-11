<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Phone; 
use App\Models\rating; 
Use Auth;
Use Session;
class ratingController extends Controller
{
   
    public function create(){
        return view('insertRate')->with('phones',Phone::id());

    }
    public function store(){   
        $r=request(); 
      
        $username= DB::table('users')->where('id','=', Auth::id())->value('name');
      
        $addRate=rating::create([    
            
            'phoneID'=>$r->phoneID,
            'comment'=>$r->comment, 
            'ratingPoints'=>$r->ratingPoints,
            'username'=>$username,
            'userID'=>Auth::id(),
            
        ]);
        
        Session::flash('success',"Rate  succesful!");

        return redirect()->route('product.detail', ['id' => $r->phoneID]);
    }

   
}
