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
            ->paginate(9);


            $categoryNames=DB::table('categories')
            ->select('categories.*')
            ->where('categories.id','=',request()->category)
            ->get();
            
        }else {
            $products=Phone::paginate(9);
            $categoryNames=null;
        }
        
        return view('userShowPhone')->with([
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryNames,
        ]);
        
    }

    public function index()
    {
        return view('userShowPhone');
    }
  
   
  
    
    public function search()
    {
        $categories=Category::all();
        $categoryNames=null;
        $r = request(); //retrive submited form data
        $keyword = $r->searchProduct;
        $products=Phone::where('phones.name', 'like', '%' . $keyword . '%')
            ->orWhere('phones.description', 'like', '%' . $keyword . '%')
            ->paginate(9);
        return view('userShowPhone')->with([
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryNames,
            ]);
    }
    
}