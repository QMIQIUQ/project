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
  
        if (request()->category) {
            $products=DB::table('phones')
            ->select('phones.*')
            ->where('phones.CategoryID','=',request()->category)
            ->get();
            


            $categoryNames=DB::table('categories')
            ->select('categories.*')
            ->where('categories.id','=',request()->category)
            ->get();
            
        }else {
            $products=Phone::all();
            $categoryNames=null;
        }
        
        return view('userShowPhone')->with([
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryNames,
        ]);
        
    }
    
}
