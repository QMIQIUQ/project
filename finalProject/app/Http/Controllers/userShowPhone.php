<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Phone; 
use App\Models\Category;
Use Session;
class userShowPhone extends Controller
{   
    
    public function show(){
        $categories=Category::all();
        if (request()->category) {
            $products=DB::table('phones')
            ->select('phones.*')
            ->where('phones.CategoryID','=',request()->category)
            ->get();
        }else {
            $products=Phone::all();
            
        }
        
        return view('userShowPhone')->with([
            'products'=>$products,
            'categories'=>$categories,
            
        ]);
    }
    
}
